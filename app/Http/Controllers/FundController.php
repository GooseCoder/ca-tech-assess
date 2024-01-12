<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundRequest;
use App\Http\Requests\UpdateFundRequest;
use App\Models\Fund;
use App\Events\DuplicateFundWarning;


class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Fund::with('companies')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFundRequest $request)
    {
        $data = $request->validated();
        $fund = new Fund();
        $fund->name = $data['name'];
        $fund->start_year = $data['start_year'];
        $fund->fund_manager_id = $data['fund_manager_id'];
        $fund->aliases = json_encode($data['aliases']);
        $fund->save();
        
        foreach ($data['companies'] as $company) {
            $fund->companies()->attach($company);
        }
        // duplicate check
        $duplicate = Fund::where('fund_manager_id', $fund->fund_manager_id)
                     ->where('name', $fund->name)
                     ->orWhere(function ($query) use ($data) {
                         foreach ($data['aliases'] as $alias) {
                             $query->orWhereJsonContains('aliases', $alias);
                         }
                     })
                     ->exists();

        if ($duplicate) {
            event(new DuplicateFundWarning($fund));
        }

        return $fund->load('companies');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fund $fund)
    {
        return Fund::with('companies')->find($fund->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFundRequest $request, Fund $fund)
    {
        $data = $request->validated();
        $fund->name = $data['name'] ?? $fund->name;
        $fund->start_year = $data['start_year'] ?? $fund->start_year;
        $fund->fund_manager_id = $data['fund_manager_id'] ?? $fund->fund_manager_id;
        $fund->aliases = isset($data['aliases']) ? json_encode($data['aliases']) : $fund->aliases;
        
        if (isset($data['companies'])) {
            $fund->companies()->detach();
            foreach ($data['companies'] as $company) {    
                $fund->companies()->attach($company);
            }
        }
        $fund->save();
        return $fund->load('companies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fund $fund)
    {
        return $fund->delete();
    }
}

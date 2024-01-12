<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        $company = new Company();
        $company->name = $data['name'];
        $company->save();
        
        foreach ($data['funds'] as $fund) {
            $company->funds()->attach($fund);
        }
        return $company->load('funds');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return Company::with('funds')->find($company->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        $company->name = $data['name'] ?? $fund->name;
        
        if (isset($data['funds'])) {
            $company->funds()->detach();
            foreach ($data['funds'] as $fund) {    
                $company->funds()->attach($fund);
            }
        }
        $company->save();
        return $company->load('companies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        return $company->delete();
    }
}

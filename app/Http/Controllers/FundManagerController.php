<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundManagerRequest;
use App\Http\Requests\UpdateFundManagerRequest;
use App\Models\FundManager;

class FundManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FundManager::with('funds')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFundManagerRequest $request)
    {
        $data = $request->validated();
        $manager = new FundManager();
        $manager->name = $data['name'];
        $manager->save();
        return $manager->load('funds');
    }

    /**
     * Display the specified resource.
     */
    public function show(FundManager $fundManager)
    {
        return FundManager::with('funds')->find($fundManager->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFundManagerRequest $request, FundManager $fundManager)
    {
        $data = $request->validated();
        $fundManager->name = $data['name'] ?? $fundManager->name;
        $fundManager->save();
        return $fundManager->load('funds');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundManager $fundManager)
    {
        return $fundManager->delete();
    }
}

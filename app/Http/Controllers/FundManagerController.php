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
        return FundManager::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFundManagerRequest $request)
    {
        return FundManager::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(FundManager $fundManager)
    {
        return FundManager::find($fundManager);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFundManagerRequest $request, FundManager $fundManager)
    {
        return $fundManager->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundManager $fundManager)
    {
        return $fundManager->delete();
    }
}

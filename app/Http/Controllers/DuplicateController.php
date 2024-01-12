<?php

namespace App\Http\Controllers;

use App\Models\Duplicate;
use Illuminate\Http\Request;

class DuplicateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Duplicate::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Duplicate $duplicate)
    {
        //
    }

    public function update(Request $request, Duplicate $duplicate)
    {
        //
    }

    public function destroy(Duplicate $duplicate)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDuplicateRequest;
use App\Http\Requests\UpdateDuplicateRequest;
use App\Models\Duplicate;

class DuplicateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Duplicate::paginate(10);
    }
}

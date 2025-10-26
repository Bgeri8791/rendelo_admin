<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorevisitsRequest;
use App\Http\Requests\UpdatevisitsRequest;
use App\Models\Visits;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visits::all();

        return view('visits.index', compact('visits'));
    }
}

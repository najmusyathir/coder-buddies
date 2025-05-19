<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::all();
        return view("rank.index", compact("results"));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function index()
    {
        $learn = json_decode(file_get_contents(resource_path('data/learn.json')), true);
        return view("learn.content", compact("learn"));
    }
}

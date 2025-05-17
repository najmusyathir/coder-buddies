<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function learnHtml()
    {
        $learn = json_decode(file_get_contents(resource_path('data/learnHtml.json')), true);
        return view("learn.html", compact("learn"));
    }

    public function learnCss()
    {
        $learn = json_decode(file_get_contents(resource_path('data/learnCss.json')), true);
        return view("learn.css", compact("learn"));
    }

}

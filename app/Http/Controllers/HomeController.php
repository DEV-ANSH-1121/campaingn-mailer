<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //index
    public function index()
    {
        return view('home');
    }

    //user
    public function user()
    {
        return view('user');
    }

    //template
    public function template()
    {
        return view('template');
    }

    // campaign
    public function campaign()
    {
        return view('campaign');
    }

    // mailLog
    public function mailLog()
    {
        return view('mailLog');
    }

}

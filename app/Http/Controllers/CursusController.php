<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursus;
use App\Models\Opdrachten;
use App\Models\OpdrachtVoortgang;

class CursusController extends Controller
{
    function index()
    {
        $date = date("Y/m/d");
        //get course
        $cursussen = Cursus::get();

        return view('home')
            ->with(compact('cursussen'))
            ->with('date', $date);
    }
}

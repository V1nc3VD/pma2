<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursus;
use App\Models\Opdrachten;

class CursusController extends Controller
{
    function index()
    {
        $ee = "ASPAdvanced";
        $opdrachten = Cursus::find($ee)->getOpdracht;
        $cursussen = Cursus::all();
        $opdracht = Cursus::find("ASPAdvanced")->Opdracht;
        return view('home',compact('cursussen'));


    }

}

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
        $ee = "ASPAdvanced";
        $cursussen = Cursus::all();
        $opdrachtvoortgang = OpdrachtVoortgang::find(1)->IsKlaar;
        return view('home',compact('cursussen', 'opdrachtvoortgang'));


    }

}

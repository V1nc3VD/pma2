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
        $ee = "ASPAdvanced";
        $cursussen = Cursus::all();
        $dd = 1;

        return view('home')
            ->with(compact('cursussen'))
            ->with('date', $date);
    }

    public function voortgang($opdracht)
    {
        return "d";
    }
}

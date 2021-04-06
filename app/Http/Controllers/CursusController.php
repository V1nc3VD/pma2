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
        $cursussen = Cursus::select('cursus.*')->with('getOpdracht')->groupBy('cursus.CursusNaam')->get();

        $cursussen = Cursus::with(['getOpdracht'])->select('cursus.*')
            ->join('opdrachten', 'opdrachten.CursusNaam', '=', 'cursus.CursusNaam')
            ->groupBy('CursusNaam')
            ->get()
            ->sortBy(function ($cursussen) {
                return $cursussen->getAankomendeOpdracht();
            });





        return view('home')
            ->with('cursussen', $cursussen);
    }
}

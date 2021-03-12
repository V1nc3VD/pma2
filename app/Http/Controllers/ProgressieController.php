<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressieController extends Controller
{
    function index()
    {

        $klascursussen = DB::table('klasregel')
            ->where('Klas', 'AM2A')
            ->get();

        $opdrachten =  DB::table('cursus')
            //->crossJoin('opdrachten')
            ->join('opdrachten', 'opdrachten.CursusNaam', '=', 'opdrachten.CursusNaam')
            ->select('cursus.*', 'opdrachten.Opdracht')
            ->get();         

        return view(
            'home',
            ['opdrachten' => $opdrachten],
            ['klascursussen' => $klascursussen]
        );
    }
}

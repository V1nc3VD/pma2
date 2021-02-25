<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressieController extends Controller
{
    function index()
    {
        $klas="AM2A";
        $klascursussen = DB::table('klasregel')
        ->where('Klas', 'AM2A')
        ->get();



     
    //subquery?
        $opdrachten = DB::table('opdrachten')
           ->whereExists(function ($query) {
               $query->select('CursusNaam')
                     ->from('klasregel')
                     ->where('klasregel.Klas', 'AM2A');
           })
           ->get();
           return view('home', 
           ['opdrachten' => $opdrachten],
           ['klascursussen' => $klascursussen]
       );
           

    }
}

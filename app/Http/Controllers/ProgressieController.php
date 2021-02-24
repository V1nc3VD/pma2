<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressieController extends Controller
{
    function index()
    {
        $cursussen = DB::table('opdrachten')->get();


        $opdrachten = DB::table('opdrachten')->get();
        return view('home', ['opdrachten' => $opdrachten]);

    }
}

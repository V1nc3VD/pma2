<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursus;

class CursusController extends Controller
{
    function index()
    {
        $ee = "ASPAdvanced";
        return Cursus::find($ee)->getOpdracht;
    }
}

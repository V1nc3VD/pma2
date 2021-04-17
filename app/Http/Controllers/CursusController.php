<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursus;
use App\Models\Opdrachten;
use App\Models\OpdrachtVoortgang;

class CursusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $date = date("Y/m/d");

        //get course


        // $cursussen = Cursus::with(['getOpdracht'])
        //     ->groupBy('CursusNaam')
        //     ->get()
        //     ->sortBy(function ($cursussen) {
        //         return $cursussen->getAankomendeOpdracht();
        //     });
        $order = 'desc';
        $cursussen = Cursus::select('cursus.*')
            ->join('opdrachten', function ($join) {
                $join->on('opdrachten.CursusNaam', '=', 'cursus.CursusNaam')
                ->whereNotNull('Deadline')
                ->where('Deadline', '>',date('Y-m-d H:i:s'))

                ;
            })
            
            ->groupBy('cursus.CursusNaam')
            ->orderByRaw('min(opdrachten.Deadline)'. $order)
            ->get();

        return view('home')
            ->with('cursussen', $cursussen);
    }

    function showCursus($cursus)
    {
        $cursus = Cursus::find($cursus);
        return view('cursusview')        
        ->with('cursus', $cursus);
        

    }
}

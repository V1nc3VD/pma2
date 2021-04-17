<?php

namespace App\Http\Controllers;
use App\Models\Cursus;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date("Y/m/d");

        //get course
 

        $cursussen = Cursus::with(['getOpdracht'])
            ->groupBy('CursusNaam')
            ->get()
            ->sortBy(function ($cursussen) {
                return $cursussen->getAankomendeOpdracht();
            });





        return view('home')
            ->with('cursussen', $cursussen);
        // return view('home');
    }
}

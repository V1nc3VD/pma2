<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus extends Model //Course model
{
    protected $keyType = 'string';
    protected $table = 'cursus';
    protected $primaryKey = 'CursusNaam';
    use HasFactory;
    //get the exercises belonging to the course
    function getOpdracht()
    {
        return $this->hasMany('App\Models\Opdrachten', 'CursusNaam');
    }


    function getVoortgang()
    {
        return $this->hasManyThrough('App\Models\OpdrachtVoortgang', 'App\Models\Opdrachten', 'CursusNaam', 'OpdrachtVoortGangID', 'CursusNaam', 'OpdrachtID')

            ->where('IsKlaar', 1) //only exercises that are finished
            ->whereNotNull('IsKlaar' )
            ->orderByDesc('OpdrachtID')
            ->get();
            //get instead of first to show that that the progress row got displayed next to the wrong course.
    }



    //get exercise of course with the nearest deadline
    function getAankomendeOpdracht()
    {
        $date = date('Y-m-d H:i:s');
        return $this->hasMany('App\Models\Opdrachten', 'CursusNaam')
            ->whereNotNull('Deadline')
            ->firstwhere('Deadline', '>', $date);
    }
}


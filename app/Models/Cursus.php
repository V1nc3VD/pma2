<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus extends Model
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
        return $this->hasManyThrough('App\Models\OpdrachtVoortgang', 'App\Models\Opdrachten', 'CursusNaam', 'OpdrachtVoortGangID')
            ->select('OpdrachtVoortGangID')
            ->where('LeerlingID', '1')
            ->where('isKlaar', '1')
            ->orderByDesc('OpdrachtVoortGangID')

            ->first();
    }



    //get exercise of course with the nearest deadline
    function getAankomendeOpdracht()
    {
        $date = date('Y-m-d H:i:s');
        return $this->hasMany('App\Models\Opdrachten', 'CursusNaam')
            ->whereNotNull('Deadline')
            ->firstwhere('Deadline', '>', $date);
    }
    function getLaatstAfgemaakt()
    {
        return $this->getOpdracht()
            ->where('OpdrachtID', '=', function ($query) {
                $query
                    ->select('OpdrachtID')
                    ->from('opdrachtvoortgang')
                    ->where('opdrachtvoortgang.OpdrachtVoortGangID', '1')
                    ->where('opdrachtvoortgang.isKlaar', '1')
                    ->orderByDesc('opdrachtvoortgang.OpdrachtVoortgangID')
                    ->limit(1);
            })->first();
        }

}


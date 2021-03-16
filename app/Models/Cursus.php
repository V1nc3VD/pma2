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
    function getOpdracht()
    {
        return $this->hasMany('App\Models\Opdrachten', 'CursusNaam');
    }
    function getVoortgang()
    {
        return $this->hasManyThrough('App\Models\OpdrachtVoortgang', 'App\Models\Opdrachten', 'CursusNaam', 'OpdrachtID', 'CursusNaam', 'OpdrachtID' )
        ->where('LeerlingID', 1);
    }

}

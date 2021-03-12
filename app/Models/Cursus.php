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
}

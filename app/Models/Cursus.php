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
        return $this->hasMany('App\Models\Opdrachten', 'CursusNaam')->orderBy('OpdrachtID', 'desc');
    }

    function getAankomendeOpdracht()
    {
        $date = date('Y-m-d H:i:s');
        return $this->hasMany('App\Models\Opdrachten', 'CursusNaam')
        ->whereNotNull('Deadline')
        ->firstwhere('Deadline', '>', $date);
    }


  


}

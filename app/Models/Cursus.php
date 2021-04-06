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
    
    //get the last finished exercise of the student per course
    function getOpdrachtLaatstAfgemaakt()
    {
        return $this->getOpdracht()
        ->join('opdrachtvoortgang', 'opdrachten.OpdrachtID', '=', 'opdrachtvoortgang.OpdrachtID')
        ->where('opdrachtvoortgang.IsKlaar', '1')
        ->where('opdrachtvoortgang.LeerlingID', '1')
        ->orderByDesc('opdrachtvoortgangID')
        ->first();
    }

    //get exercise of course with the nearest deadline
    function getAankomendeOpdracht()
    {
        $date = date('Y-m-d H:i:s');
        return $this->getOpdracht()
            ->whereNotNull('Deadline')
            ->firstwhere('Deadline', '>', $date);
    }
    
    //check if the student has finished the exercise with the nearest deadline
    function checkOpSchema(){
        if (isset($this->getOpdrachtLaatstAfgemaakt()->Opdracht) && isset($this->getAankomendeOpdracht()->Opdracht))
        {
            if ($this->getOpdrachtLaatstAfgemaakt()->Opdracht >= $this->getAankomendeOpdracht()->Opdracht)
            {
                return "af";
            }
            
        }

    }
}


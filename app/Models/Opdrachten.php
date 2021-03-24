<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opdrachten extends Model
{

    protected $keyType = 'string';
    protected $table = 'opdrachten';
    protected $primaryKey = 'OpdrachtID';
    use HasFactory;
    public function cursus()
    {
        return $this->belongsTo('App\Models\Cursus');
    }
    //get the progress of the exercises of a student (right now it's only student with id 1)
    public function opdrachtVoortgang()
    {
        return $this->hasOne('App\Models\OpdrachtVoortgang', 'OpdrachtID', 'OpdrachtID')
            ->where('LeerlingID', 1);
    }

    public function opdrachtLaatstAfgemaakt()
    {
        return $this->hasOne('App\Models\OpdrachtVoortgang', 'OpdrachtID', 'OpdrachtID')
        ->where('LeerlingID', '1')
        ->where('isKlaar', '1')
        ->orderByDesc('OpdrachtVoortGangID')
        ->first();
    }
}

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
    public function opdrachtVoortgang() {
        return $this->hasOne('App\Models\OpdrachtVoortgang', 'OpdrachtID', 'OpdrachtID')
        ->where('LeerlingID', 1);
    }
}

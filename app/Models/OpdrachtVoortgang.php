<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpdrachtVoortgang extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $table = 'opdrachtvoortgang';
    protected $primaryKey = 'OpdrachtVoortGangID';

}

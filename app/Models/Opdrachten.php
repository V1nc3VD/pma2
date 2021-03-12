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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\SoftDeletes;

class Mesa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'numero',

    ];
    

}


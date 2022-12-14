<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'numero',
        'ocupada',
        'juntar'
    ];

    //relationships

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

}


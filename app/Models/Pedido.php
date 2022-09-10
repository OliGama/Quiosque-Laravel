<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'finalizado',
        'mesa_id'
    ];

    //relationships

    public function produtos(){
        return $this->belongsToMany(Produto::class);
    }

    public function mesa(){
        return $this->belongsTo(Mesa::class);
    }
}

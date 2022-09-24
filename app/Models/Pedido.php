<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'finalizado',
        'mesa_id',
        'usuario_id'
    ];

    //relationships

    public function produtos(){
        return $this->belongsToMany(Produto::class)->withPivot('quantidade');
    }

    public function mesa(){
        return $this->belongsTo(Mesa::class);
    }
}

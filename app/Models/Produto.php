<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_produto',
        'tipo_produto',
        'preco',
        'esgotado'
    ];

    //relationships

    public function pedidos(){
        return $this->belongsToMany(Pedido::class)->withPivot(['quantidade', 'observacao'])->withTimestamps();
    }
}

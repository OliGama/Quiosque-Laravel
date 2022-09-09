<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa;

class PedidoController extends Controller
{
    public function index(){
        return  view('pedidos.index');
    }

    public function create($id){
        $mesa_id = Mesa::find('id');

        

    }
}

@extends('layouts.panel')

@section('title')
    Produtos
@endsection

@section('title2')
    <div class="d-flex justify-content-center" style="color: #000000">
        Lista de Produtos
    </div>
@endsection

@section('content')
    <form class="col-9">
        <div class="flex mb-4" >
            <div class="d-flex align-items-center">
                <span style="font-weight: bold">Buscar produto</span>
                <input type="text" name="search" class="form-control w-50 mr-2" style="margin-left: 5px" value="" placeholder="Pesquisar...">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    @if (auth()->user()->role === 'caixa')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="container d-flex justify-content-end" style="margin-bottom: 5px">
                        <button type="button" class="btn btn-outline-primary active shadow" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Inserir Produto
                        </button>
                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Produto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('produto.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="nome_produto" name="nome_produto"
                                                        class="form-control {{ $errors->has('nome_produto') ? 'is-invalid' : '' }}"
                                                        placeholder="Nome do produto" value="{{ old('nome_produto') }}">
                                                    <div class="invalid-feedback">{{ $errors->first('nome_produto') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-text">R$</span>
                                                    <input type="text" name="preco"
                                                        class="form-control preco {{ $errors->has('preco') ? 'is-invalid' : '' }}"
                                                        placeholder="Preço" value="{{ old('preco') }}">
                                                    <div class="invalid-feedback">{{ $errors->first('preco') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <select
                                                        class="form-select {{ $errors->has('tipo_produto') ? 'is-invalid' : '' }}"
                                                        aria-label="Default select example" name="tipo_produto">
                                                        <option value="" selected>Selecione um tipo</option>
                                                        <option value="Bebida">Bebida</option>
                                                        <option value="Pastel">Pastel</option>
                                                        <option value="Porcao">Porcao</option>
                                                    </select>
                                                    <div class="invalid-feedback">{{ $errors->first('tipo_produto') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-outline-primary active"
                                        data-bs-dismiss="modal">Finalizar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
    @endif
    <table class="table table-hover">
        <thead>
            <tr style="color: #000000">
                <th scope="col">ID</th>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Preço (R$)</th>
                @if (auth()->user()->role === 'caixa')
                    <th scope="col">Ações</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr style="color: #000000">
                    <th scope="row">{{ $produto->id }}</th>
                    <td>{{ $produto->nome_produto }}</td>
                    <td>{{ $produto->tipo_produto }}</td>
                    <td>R$ {{ $produto->preco }}</td>
                    @if (auth()->user()->role === 'caixa')
                        <td>
                            <div class="d-flex align-items-center">


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i style="color: #000000" class="fa fa-edit"></i>
                                </button>

                                <!-- Modal -->
                                <form action="{{ route('produto.update', $produto->id) }}" method="POST"
                                    autocomplete="off">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="nome_produto">Nome do produto</label>
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('nome_produto') ? 'is-invalid' : '' }}"
                                                                    id="nome_produto" name="nome_produto"
                                                                    value="{{ old('nome_produto', isset($produto) ? $produto->nome_produto : '') }}">
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('nome_produto') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label for="preco">Preço</label>
                                                            <div class="input-group">

                                                                <span class="input-group-text">R$</span>
                                                                <input type="text"
                                                                    class="form-control preco {{ $errors->has('preco') ? 'is-invalid' : '' }}"
                                                                    id="preco" name="preco"
                                                                    value="{{ old('preco', isset($produto) ? $produto->preco : '') }}">
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('preco') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tipo_produto">Tipo do produto</label>
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('tipo_produto') ? 'is-invalid' : '' }}"
                                                                    id="tipo_produto" name="tipo_produto"
                                                                    value="{{ old('tipo_produto', isset($produto) ? $produto->tipo_produto : '') }}">
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('tipo_produto') }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit"
                                                        class="btn btn-outline-primary active">Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger confirm-submit">
                                        <i style="color: #000000" class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Não há dados no momento</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$produtos->links()}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/Produto/mask.js') }}"></script>
@endsection

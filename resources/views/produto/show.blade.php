@extends('layouts.panel')
@section('title')
View Index
@endsection
@section('content')
        Inserir tabela com os produtos do estoque

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">Informações gerais</div>
                    <div class="card-body">
                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <span class="font-weight-bold mb-1">Palestrante: </span>
                                <span>{{ $event->speaker_name }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold mb-1">Início: </span>
                                {{ $event->start_date_formatted }}
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold mb-1">Fim: </span>
                                {{ $event->end_date_formatted }}
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold mb-1">Público-alvo: </span>
                                <span>{{ $event->target_audience }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">Participantes</div>
            <div class="card-body">
                <form method="POST" action="{{ route('organization.events.subscription.store', $event->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <select class="form-control" name="user_id">
                                <option value="">Selecione</option>
                                
                            </select>
                        </div>
                        <div class="col-12 col-lg-2">
                            <button type="submit" class="btn btn-success">Incluir</button>
                        </div>
                    </div>
                </form>
                <table class="table bg-white mt-3">
                    <thead>
                        <th>Nome</th>
                        <th class="text-right">Ações</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
@endsection



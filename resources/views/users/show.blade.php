@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <h1 class="m-0 text-dark">Detalhes do Usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Usuário #000{{ $id }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Criado em:</strong> {{ $user->created_at->format('d/m/Y H:i:s') }}</p>
                    <p><strong>Atualizado em:</strong> {{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
                    <a href="{{ route('users.index') }}" title="Voltar" rel="noopener noreferrer">
                        <i class="fa fa-backward"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Atualizar Usuário')

@section('content_header')
    <h1 class="m-0 text-dark">Atualizar Usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Fomulário</h3>
                </div>
                <form action="{{ route('users.update', ['user' => $users->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName1">Nome</label>
                            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                                id="exampleInputName1" placeholder="Digite um nome" value="{{ old('name', $users->name) }}">
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço de Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" placeholder="Digite um e-mail"
                                value="{{ old('email', $users->email) }}">
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" name="password"
                                class="form-control  @error('password') is-invalid @enderror" id="exampleInputPassword1"
                                placeholder="Digite uma senha" value="{{ old('password', $users->password) }}">
                            @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@stop

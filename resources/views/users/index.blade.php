@extends('adminlte::page')

@section('title', 'Lista de Usuários')

@section('content_header')
    <h1 class="m-0 text-dark">Lista de Usuários</h1>
    @if (session('success'))
        <div id="flash-message" class="mt-3 alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>EMAIL</th>
                                <th>FUNÇÕES</th>
                                <th>CRIADO</th>
                                <th>ATUALIZADO</th>
                                <th><a href="{{ route('users.create') }}" class="btn btn-block btn-primary">Novo
                                        Usuário</button></a>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <ol>
                                            @forelse($user->roles as $role)
                                                <li>{{ $role->name }}</li>
                                            @empty
                                                <li>Usuário sem função</li>
                                            @endforelse
                                        </ol>
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td style="display: flex;">
                                        <a href="{{ route('users.show', [$user->id]) }}"
                                            class="btn btn-primary mr-1">Detalhes</a>
                                        <a href="{{ route('users.edit', [$user->id]) }}"
                                            class="btn btn-success mr-1">Editar</a>
                                        <form action="{{ route('users.destroy', [$user->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Ainda não há Usuários Cadastrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-md m-0">
                            <li class="page-item @if (!$users->previousPageUrl()) disabled @endif">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}">«</a>
                            </li>
                            @foreach ($users as $page => $user)
                                @if ($page >= 1 && $page <= $users->lastPage())
                                    <!-- Verifica se a página está dentro do intervalo de páginas disponíveis -->
                                    <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $users->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                            <li class="page-item @if (!$users->nextPageUrl()) disabled @endif">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}">»</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

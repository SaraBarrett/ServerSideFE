@extends('layouts.main_layout')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <p>O email de contacto, caso detecte erros é {{ $cesaeInfo['email'] }}, na {{ $cesaeInfo['address'] }} </p>
    <h5>Lista de todos os users de forma estática (definido num array sem Base de dados)</h5>
    <ul>
        @foreach ($students as $student)
            <li>{{ $student['name'] }} e o email é {{ $student['email'] }} </li>
        @endforeach
    </ul>

    <h5>Users que são carregados da base de dados (tabela de users)</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">NIF</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nif }}</td>
                    @auth
                        <td><a href="{{ route('users.view', $user->id) }}" class="btn btn-info">Ver</a></td>
                        @if (Auth::user()->email == 'admin@gmail.com')
                            <td><a class="btn btn-danger" href="{{ route('users.delete', $user->id) }}">Apagar</a></td>
                        @endif
                    @endauth
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

@extends('layouts.main_layout')

@section('content')
    <h5>Aqui vamos carregar todas as tasks vindas da Base de Dados </h5>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Status</th>
                <th scope="col">Data de Conclusão</th>
                <th scope="col">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_at }}</td>
                    <td>{{ $task->usname }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

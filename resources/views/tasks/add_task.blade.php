@extends('layouts.main_layout')
@section('content')
    {{-- @php
    //aqui coloca qualquer código de php: funções, variáveis, etc
    $surname = 'Monteiro'; //declara variável, como é string pode usar pelicas
    @endphp --}}


    <div class="container">

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputNome1" class="form-label">Tarefa</label>
                <input required name="name" type="text" class="form-control" id="exampleInputNome"
                    aria-describedby="nomeHelp" placeholder="Insira o nome da tarefa">

                @error('name')
                    <div class="alert alert-danger">Insira o nome da tarefa</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                <textarea required name="description" class="form-control" id="exampleFormControlTextarea1"
                    placeholder="Insira a descrição" rows="3"></textarea>

                @error('description')
                    <div class="alert alert-danger">Insira a descrição</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label">ID do Utilizador</label>
                <div class="mb-3">
                    <label for="exampleInputUser1" class="form-label">User</label>
                    <select name="utilizador">
                        <option value="">--Please choose an option--</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>

                        @endforeach

                    </select>


                </div>

                @error('utilizador')
                    <div class="alert alert-danger">Insira o codigo do utilizador</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input required name="terms" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Li e aceito a Política de Privacidade</label>
            </div>
            @error('terms')
                <div class="alert alert-danger">Aceite a Política de Privacidade</div>
            @enderror
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <br>
@endsection

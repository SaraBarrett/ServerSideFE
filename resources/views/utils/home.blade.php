@extends('layouts.main_layout')
@section('content')
    @php
        //qq código de php que eu quiser; funções, variáveis, etc
        $surname = 'Monteiro';
    @endphp



    <h3>Home Page da {{ $surname }}</h3>
    <img src="{{ asset('images/Screenshot 2025-10-09 143141.png') }}" alt="">
    <ul>
        <li><a href="{{ route('utils.hello') }}">Olá mundo!</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar Users</a></li>
    </ul>
@endsection

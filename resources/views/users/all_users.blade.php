@extends('layouts.main_layout')
@section('content')
<p>O email de contacto, caso detecte erros é {{$cesaeInfo['email']}}, na {{$cesaeInfo['address']}} </p>
    <h5>Lista de todos os users</h5>
    <ul>
        @foreach ($students as $student)
        <li>{{$student['name']}}  e o email é {{$student['email']}} </li>
        @endforeach
    </ul>
@endsection

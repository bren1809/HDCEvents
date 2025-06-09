@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

        <h1>Algum título</h1>
        <img src="/img/banner.jpg" alt="Banner">
        @if(10 > 5)
            <p>A condição é true</p>
        @endif

        <p>{{ $nome }}</p>

        @if($buscando != '')
            <p>O usuário está buscando: {{ $buscando }}</p>
        @endif

        @if($nome == "Kaique")
            <p>O nome é Kaique</p>
        @elseif($nome == "Brener")
            <p>O nome é {{ $nome }}, ele tem {{ $idade }} anos e trabalha como {{ $profissao }}</p>
        @else
            <p>O nome não é Kaique</p>
        @endif

        @for($i = 0; $i < count($arr); $i++)
            <p>{{ $arr[$i] }} - {{ $i }}</p>
        @endfor

        @for($i = 0; $i < count($frutas); $i++)
            <p>{{ $frutas[$i] }} - {{ $i }}</p>
        @endfor

        @php
            $nome = "Gaby";
            echo $nome;
        @endphp

@endsection
@extends('layouts.main')

@section('title', 'Produto')

@section('content')

    @if($id != null)
        <p>Exibindo porduto id: {{ $id }}</p>
    @endif

@endsection
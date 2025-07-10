<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

        <title>@yield('title')</title>

        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>

        <link rel="stylesheet" href="styles.css">

    </head>
    
       @extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<main class="container mx-auto px-6 py-16">
<div class="max-w-5xl mx-auto">
<div class="liquid-glass liquid-glass-blue p-8 md:p-12">
<div class="grid md:grid-cols-2 gap-12 items-center">
<div>
<img alt="{{ $event->title }}" class="rounded-2xl shadow-2xl w-full h-auto object-cover" src="/img/events/{{ $event->image }}"/>
</div>
<div>
<h1 class="text-4xl font-bold text-gray-100 mb-4">{{ $event->title }}</h1>
<div class="flex items-center text-gray-400 mb-6">
<span class="material-symbols-outlined mr-2">calendar_today</span>
<span>{{ date('d/m/Y', strtotime($event->date)) }}</span>
</div>
<p class="text-lg text-gray-300 mb-6">
{{ $event->description }}
</p>
<div class="mb-6">
<h3 class="text-xl font-semibold text-gray-200 mb-3">Infraestrutura do Evento:</h3>
<ul class="flex flex-wrap gap-4 text-gray-300">
@foreach($event->items as $item)
<li class="flex items-center bg-gray-800/60 px-3 py-1 rounded-full text-sm">
<span class="material-symbols-outlined text-orange-400 mr-2">chair</span>
<span>{{ $item }}</span>
</li>
@endforeach
</ul>
</div>

@if(!$hasUserJoined)
<div class="text-center md:text-left">
    <form action="{{ route('events.join', $event->id) }}" method="POST">
        @csrf
        <a href="{{ route('events.join', $event->id) }}" class="bg-gradient-to-r from-orange-500 to-blue-500 text-white font-bold py-3 px-8 rounded-full hover:from-orange-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-110" 
            id="event-submit"
            onclick="event.preventDefault(); 
            this.closest('form').submit();">
            Confirmar Presença
        </a>
    </form>
</div>
@else
<p class="alert alert-warning text-center text-green-400 mt-4">
    Você já confirmou sua presença neste evento.
</p>
@endif
</div>
</div>
</div>
</div>
</main>

@endsection
        
    </body>
</html>
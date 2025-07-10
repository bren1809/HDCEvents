@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

 <main>
            <section class="relative h-[70vh] flex items-center justify-center text-white">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('../img/banner.jpg');">
                    <div class="absolute inset-0 bg-black opacity-70"></div>
                </div>
                <div class="relative z-10 text-center px-4">
                    <h1 class="text-6xl font-bold mb-8 animate-fade-in-down floating">Busque um evento</h1>

                    <form action="{{route('home')}}" class="max-w-xl mx-auto liquid-glass p-4 liquid-glass-orange" method="GET">
                        <div class="relative">
                            <input class="w-full py-4 px-6 rounded-full border-none focus:ring-4 focus:ring-orange-500/50 focus:outline-none text-gray-200 bg-gray-800/80 placeholder-gray-400" placeholder="Procurar..." type="text" id="search" name="search"/>
                            <button class="absolute right-2 top-1/2 -translate-y-1/2 bg-gradient-to-r from-orange-500 to-blue-500 text-white p-3 rounded-full hover:from-orange-600 hover:to-blue-600 transition-all duration-300 transform hover:rotate-12 hover:scale-110" type="submit">
                                <span class="material-symbols-outlined">search</span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
            <section class="py-24 bg-gray-900/50">
                <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                @if($search)
                <h2 class="text-5xl font-bold text-gray-100">Buscando por: {{ $search }}</h2>
                @else
                <h2 class="text-5xl font-bold text-gray-100">Próximos Eventos</h2>
                <p class="text-gray-400 mt-3 text-lg">Veja os eventos dos próximos dias</p>
                @endif
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($events as $event)
                <div class="liquid-glass liquid-glass-orange overflow-hidden">
                <img src="./img/events/{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-56 object-contain p-4 bg-gray-800/50"/>
                <div class="p-6">
                <p class="text-sm text-gray-400 mb-2">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                <h3 class="text-xl font-semibold mb-2 text-gray-100">{{ $event->title }}</h3>
                <p class="text-gray-400 mb-4">{{ $event->users->count() }} Participantes</p>
                <a class="inline-block bg-gradient-to-r from-orange-500 to-blue-500 text-white px-6 py-2 rounded-full hover:from-orange-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-105" href="{{asset('/events/'.$event->id)}}">Saber mais</a>
                </div>
                </div>
                @endforeach
                @if($events->count() === 0 && $search)
                <h3 class="text-xl font-semibold mb-2 text-gray-100">Não foi possível encontrar nenhum evento com {{ $search}}!
                    <a class="text-orange-400 hover:text-orange-500 transition-colors duration-300" href="{{ route('home') }}">Ver todos os eventos</a>
                </h3>
                @elseif(count($events) == 0)
                <p class="text-gray-400 mb-4">Não há eventos disponíveis no momento.</p>
                @endif
                <div class="liquid-glass liquid-glass-orange overflow-hidden">
                <div class="p-6 h-full flex flex-col justify-center items-center text-center">
                <a class="flex flex-col items-center text-orange-400 hover:text-orange-500 transition-colors duration-300" href="#">
                <span class="material-symbols-outlined text-7xl">add_circle</span>
                <span class="mt-2 text-lg font-semibold">Ver mais eventos</span>
                </a>
                </div>
                </div>
                </div>
                </div>
            </section>
        </main>
@endsection
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
        <div class="max-w-4xl mx-auto">
            <div class="liquid-glass p-8 md:p-12">
            <h1 class="text-4xl font-bold text-center mb-10 text-gray-100">Crie o seu evento</h1>
            <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-8">
            <div>
            <label class="block text-lg font-medium text-gray-300 mb-2" for="image">Imagem do Evento:</label>
            <div class="mt-2 flex items-center justify-center w-full">
            <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed rounded-lg cursor-pointer bg-gray-800/50 border-gray-600 hover:border-orange-500 hover:bg-gray-800/80 transition-colors duration-300">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <span class="material-symbols-outlined text-5xl text-gray-400">cloud_upload</span>
            <p class="mb-2 text-sm text-gray-400"><span class="font-semibold">Escolher arquivo</span> ou arraste e solte</p>
            <p class="text-xs text-gray-500">Nenhum arquivo escolhido</p>
            </div>
            <input class="sr-only" id="name" name="image" type="file"/>
            </label>
            </div>
            </div>
        <div>
        <label class="block text-lg font-medium text-gray-300" for="title">Evento:</label>
        <input class="mt-2 block w-full bg-gray-800/80 border-gray-600 rounded-md py-3 px-4 text-gray-200 focus:ring-orange-500 focus:border-orange-500 placeholder-gray-400" id="title" name="title" placeholder="Nome do evento" type="text"/>
        </div>
        <div>
        <label class="block text-lg font-medium text-gray-300" for="title">Data do evento:</label>
        <input class="mt-2 block w-full bg-gray-800/80 border-gray-600 rounded-md py-3 px-4 text-gray-200 focus:ring-orange-500 focus:border-orange-500 placeholder-gray-400" id="date" name="date" placeholder="mm/dd/yyyy" type="date"/>
        </div>
        <div>
        <label class="block text-lg font-medium text-gray-300" for="title">Cidade:</label>
        <input class="mt-2 block w-full bg-gray-800/80 border-gray-600 rounded-md py-3 px-4 text-gray-200 focus:ring-orange-500 focus:border-orange-500 placeholder-gray-400" id="city" name="city" placeholder="Local do evento" type="text"/>
        </div>
        <div>
        <label class="block text-lg font-medium text-gray-300" for="title">O evento é privado?</label>
        <select class="mt-2 block w-full bg-gray-800/80 border-gray-600 rounded-md py-3 px-4 text-gray-200 focus:ring-orange-500 focus:border-orange-500" id="private" name="private">
        <option value="0">Não</option>
        <option value="1">Sim</option>
        </select>
        </div>
        <div>
        <label class="block text-lg font-medium text-gray-300" for="title">Descrição:</label>
        <textarea class="mt-2 block w-full bg-gray-800/80 border-gray-600 rounded-md py-3 px-4 text-gray-200 focus:ring-orange-500 focus:border-orange-500 placeholder-gray-400" id="description" name="description" placeholder="O que vai acontecer no evento?" rows="4"></textarea>
        </div>
        <div>
        <label class="block text-lg font-medium text-gray-300" for="title">Adicione itens de infraestrutura:</label>
        <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4">
        <div class="flex items-center">
        <input class="h-5 w-5 rounded border-gray-600 bg-gray-800/80 text-orange-600 focus:ring-orange-500" id="chairs" name="items[]" type="checkbox" value="Cadeiras"/>
        <label class="ml-3 text-md text-gray-300" for="chairs">Cadeiras</label>
        </div>
        <div class="flex items-center">
        <input class="h-5 w-5 rounded border-gray-600 bg-gray-800/80 text-orange-600 focus:ring-orange-500" id="stage" name="items[]" type="checkbox" value="Palco"/>
        <label class="ml-3 text-md text-gray-300" for="stage">Palco</label>
        </div>
        <div class="flex items-center">
        <input class="h-5 w-5 rounded border-gray-600 bg-gray-800/80 text-orange-600 focus:ring-orange-500" id="free-beer" name="items[]" type="checkbox" value="Cerveja grátis"/>
        <label class="ml-3 text-md text-gray-300" for="free-beer">Cerveja grátis</label>
        </div>
        <div class="flex items-center">
        <input class="h-5 w-5 rounded border-gray-600 bg-gray-800/80 text-orange-600 focus:ring-orange-500" id="open-food" name="items[]" type="checkbox" value="Open Food"/>
        <label class="ml-3 text-md text-gray-300" for="open-food">Open Food</label>
        </div>
        <div class="flex items-center">
        <input class="h-5 w-5 rounded border-gray-600 bg-gray-800/80 text-orange-600 focus:ring-orange-500" id="gifts" name="items[]" type="checkbox" value="Brindes"/>
        <label class="ml-3 text-md text-gray-300" for="gifts">Brindes</label>
        </div>
        </div>
        </div>
        </div>
        <div class="mt-12 text-center">
        <button class="bg-gradient-to-r from-orange-500 to-blue-500 text-white font-bold py-3 px-8 rounded-full hover:from-orange-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-110" type="submit">
        Criar Evento
        </button>
        </div>
        </form>
        </div>
        </div>
    </main>

@endsection
        
    </body>
</html>
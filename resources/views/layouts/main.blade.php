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

        <style type="text/tailwindcss">
           @tailwind base;
            @tailwind components;
            @tailwind utilities;

            body {
                font-family: 'Poppins', sans-serif;
            }
            .material-symbols-outlined {
                font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
            }
            .liquid-glass {
                background: rgba(17, 24, 39, 0.2);backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border-radius: 20px;
                border: 1px solid rgba(255, 255, 255, 0.1);
                transition: all 0.3s ease;
            }
            .liquid-glass-orange {
                box-shadow: 0 8px 32px 0 rgba(251, 146, 60, 0.37);
            }
            .liquid-glass-orange:hover {
                background: rgba(251, 146, 60, 0.2);
                box-shadow: 0 12px 40px 0 rgba(251, 146, 60, 0.5);
                transform: scale(1.05);
            }
            .liquid-glass-blue {
                box-shadow: 0 8px 32px 0 rgba(96, 165, 250, 0.37);
            }
            .liquid-glass-blue:hover {
                background: rgba(96, 165, 250, 0.2);
                box-shadow: 0 12px 40px 0 rgba(96, 165, 250, 0.5);
                transform: scale(1.05);
            }
            @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0px);
            }
            }
            .floating {
            animation: float 6s ease-in-out infinite;
            }

            .msg {
                background-color: #D4EDDA;
                color: #155724;
                border: 1px solid #c3e6cb;
                width: 100%;
                margin-bottom: 0;
                text-align: center;
                padding: 10px;
            }


            /* Estilização lá de baixo */

            @keyframes animate-blob {
            0% {
                transform: scale(1) translateY(0) rotate(0deg);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.4) translateY(-80px) rotate(180deg);
                opacity: 0.3;
            }
            100% {
                transform: scale(1) translateY(0) rotate(360deg);
                opacity: 0.5;
            }
            }
            .animate-blob {
            animation: animate-blob 20s infinite ease-in-out;
            }
            .animation-delay-2000 {
            animation-delay: -5s;
            }
            .animation-delay-4000 {
            animation-delay: -10s;
            }
            .animation-delay-5000 {
                animation-delay: -15s;
            }
        </style>

    </head>
    <body class="bg-gray-900 text-gray-200">
        <div class="fixed top-0 left-0 w-full h-full -z-10">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-orange-900 rounded-full mix-blend-screen filter blur-xl opacity-50 animate-blob"></div>
            <div class="absolute top-0 -right-4 w-72 h-72 bg-blue-900 rounded-full mix-blend-screen filter blur-xl opacity-50 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-20 left-20 w-72 h-72 bg-orange-800 rounded-full mix-blend-screen filter blur-xl opacity-50 animate-blob animation-delay-4000"></div>
            <div class="absolute bottom-20 right-20 w-72 h-72 bg-blue-800 rounded-full mix-blend-screen filter blur-xl opacity-50 animate-blob animation-delay-5000"></div>
        </div>

        <header class="bg-gray-900/30 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-gray-700/50">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a class="flex items-center space-x-2" href="{{route('home')}}">
                    <span class="material-symbols-outlined text-orange-400 text-4xl floating">wb_sunny</span>
                    <span class="text-xl font-bold text-gray-100">HDC Events</span>
                </a>

                <div class="flex items-center space-x-6">
                    <a class="text-gray-300 hover:text-orange-400 transition-colors duration-300" href="{{route('home')}}">Eventos</a>

                    <a class="text-gray-300 hover:text-orange-400 transition-colors duration-300" href="{{route('events.create')}}">Criar Eventos</a>

                    @auth
                    <a class="text-gray-300 hover:text-orange-400 transition-colors duration-300" href="{{route('dashboard')}}">Meus eventos</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <a href="{{route('logout')}}"
                            onclick="event.preventDefault(); 
                            this.closest('form').submit();"
                            >Sair
                        </a>
                    </form>
                    @endauth
                    @guest
                    <a class="text-gray-300 hover:text-orange-400 transition-colors duration-300" href="{{route('login')}}">Entrar</a>
                    <a class="bg-gradient-to-r from-orange-500 to-blue-500 text-white px-4 py-2 rounded-full hover:from-orange-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-110" href="{{route('register')}}">Cadastrar</a>
                    @endguest
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                    @endif
                  @yield('content')  
                </div>
            </div>
        </main>

        <footer class="bg-orange-900/50 backdrop-blur-md border-t border-orange-700/50">
            <div class="container mx-auto px-6 py-8 text-center">
                <p class="font-semibold text-orange-200">HDC Events &copy; 2025</p>
            </div>
        </footer>


    </body>
</html>

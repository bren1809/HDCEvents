<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    
    public function index() {

        $search = request('search'); // Valor da URL através do parâmetro SEARCH

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get(); // Lógica de busca do evento

        } else {
            $events = Event::all(); // Nenhum valor digitado traz todos os eventos do banco
        }
        
        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) { // Verificação se existe um arquivo enviado no input com nome 'image' e se foi enviado corretamente
            $requestImage = $request->image; // Pega o arquivo que veio do form e armazena na variavel
            $extension = $requestImage->extension(); // Retorna a extensão do arquivo (ex: jpg, png, etc.)
            $imageName = md5($requestImage->getClientOriginalName() /* Retorna o nome original do arquivo enviado */  
            . strtotime("now")) /* Pega o timestamp atual */
            . "." . $extension;
            // Resumo, md5 cria um hash MD5 desse nome + timestamp, tornando nome do arquivo único
            $requestImage->move(public_path('img/events'), $imageName); // Move o arquivo para a pasta pública em events
            $event->image = $imageName; // Salva o nome da imagem no banco

        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    public function show($id) {
    
        $event = Event::findOrFail($id); // procura no banco um registro na tabela com aquele id, se encontrar atribui esse evento, se não retorna um erro

        return view('events.show', ['event' => $event]); // permite mostrar os detalhes desse evento

    }
}




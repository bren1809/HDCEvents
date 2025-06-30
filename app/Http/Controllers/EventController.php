<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

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

        $user = auth()->user(); // Acesso ao auth que nos da acesso ao user
        $event->user_id = $user->id; // Cria o vínculo ao banco que esse evento agora pertence a esse usuário

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    public function show($id) {
    
        $event = Event::findOrFail($id); // procura no banco um registro na tabela com aquele id, se encontrar atribui esse evento, se não retorna um erro

        $eventOwner = User::where('id', $event->user_id)->first()->toArray(); // Aqui conseguimos ter acesso ao usuário e selecionar o primeiro que encontrar

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]); // permite mostrar os detalhes desse evento

    }

    public function dashboard() {
        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id) {

        Event::findOrFail($id)->delete();  // Lógica para achar o id e deletar um evento

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!'); // Retorna para o dashboard e envia uma mensagem
    }

    public function edit($id) {

        $event = Event::findOrFail($id); // Busca o evento pelo id

        return view('events.edit', ['event' => $event]); // Retorna a para a view de edição do evento

    }
}




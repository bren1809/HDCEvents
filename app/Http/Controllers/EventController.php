<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index() {
        $nome = "Brener";
        $idade = 19;

        $arr = [1, 2, 3, 4, 5,];
        $frutas = ['Maçã', 'Melão', 'Banana', 'Melancia', 'Mamão', 'Kiwi'];
        $nomes = ['Brener', 'Gaby', 'Junin', 'Tiago', 'Camilla'];
        $buscando = request('search');
        
        return view('welcome', 
            [
                'nome' => $nome, 
                'idade' => $idade, 
                'profissao' => "Programador",
                'arr' => $arr,
                'frutas' => $frutas,
                'buscando' => $buscando            
            ]);
    }

    public function create() {
        return view('events.create');
    }

}

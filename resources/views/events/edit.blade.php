@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->title }}</h1>
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group space">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="name" name="image" class="form-control-file">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
        </div>
        <div class="form-group space">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
        </div>
        <div class="form-group space">
            <label for="title">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d', strtotime($event->date)) }}">
        </div>
        <div class="form-group space">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ $event->city }}">
        </div>
        <div class="form-group space">
            <label for="title">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='select'" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group space">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
        </div>
        <div class="form-group space">
            <label for="title">Adicione itens de infraestrutura:</label>
        </div>
        <div class="form-group space">
            <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
        </div>
        <div class="form-group space">
            <input type="checkbox" name="items[]" value="Palco"> Palco
        </div>
        <div class="form-group space">
            <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
        </div>
        <div class="form-group space">
            <input type="checkbox" name="items[]" value="Open Food"> Open Food
        </div>
        <div class="form-group space">
            <input type="checkbox" name="items[]" value="Brindes"> Brindes
        </div>

        <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>

@endsection
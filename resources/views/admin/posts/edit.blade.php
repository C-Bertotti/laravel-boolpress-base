@extends('layouts.base')

@section('pageTitle')
    Modifica: {{ $post->title }}
@endsection

@section('content')
    <!-- stampo, se ci sono, lista di errori -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- /stampo, se ci sono, lista di errori -->

    <form action="{{route('admin.post.update', ['post' => $post->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') ? old('title') : $post->title  }}">
        </div>
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="{{ old('date') ? old('date') : $post->date }}">
        </div>
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" name="content" id="content" rows="10" placeholder="Content">{{ old('content') ? old('content') : $post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image') ? old('image') : $post->image }}" placeholder="Inserisci l'URL dell'immagine">
        </div>
        
        <!-- checkbox -->
        <div class="form-check ">
            <input class="form-check-input" type="checkbox" id="published" name="published" placeholder="published" {{ old('published') || $post->published ? 'checked' : '' }}>
            <label class="form-check-label" for="published">Pubblicato</label>
        </div>
        <!-- /checkbox -->

        <!-- tags -->
        <h3 class="mt-3">Tags</h3>
        @foreach ($tags as $tag)
            <div class="form-check ">
                <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="{{ $tag->name }}" name="tags[]" {{ $post->tags->contains($tag) || old('name') ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
            </div>
        @endforeach
        <!-- /tags -->

        <button type="submit" class="btn btn-primary mb-5 mt-5">Modifica</button>
    </form>
@endsection
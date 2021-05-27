@extends('layouts.base')

@section('pageTitle')
    Crea un nuovo post
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

    <form action="{{route('admin.post.store')}}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="{{ old('date') }}">
        </div>
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" name="content" id="content" rows="10" placeholder="Content">{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}" placeholder="Inserisci l'URL dell'immagine">
        </div>
        
        <!-- checkbox -->
        <div class="form-check ">
            <input class="form-check-input" type="checkbox" id="published" name="published" placeholder="published" {{ old('published') ? 'checked' : '' }}>
            <label class="form-check-label" for="published">Pubblicato</label>
        </div>
        <!-- /checkbox -->

        <button type="submit" class="btn btn-primary mb-5 mt-5">Crea</button>
    </form>
@endsection
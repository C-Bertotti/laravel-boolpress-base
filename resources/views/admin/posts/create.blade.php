@extends('layouts.base')

@section('pageTitle')
    Crea un nuovo post
@endsection

@section('content')
<form action="{{route('admin.post.store')}}" method="POST">
    @method('POST')
    @csrf
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="date">Data</label>
        <input type="date" class="form-control" id="date" name="date" placeholder="Date">
    </div>
    <div class="form-group">
        <label for="content">Contenuto</label>
        <textarea class="form-control" name="content" id="content" rows="10" placeholder="Content"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Immagine</label>
        <input type="text" class="form-control" id="image" name="image">
    </div>
    
    <!-- checkbox -->
    <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="published" name="published" placeholder="published">
        <label class="form-check-label" for="published">Pubblicato</label>
    </div>
    <!-- /checkbox -->

    <button type="submit" class="btn btn-primary mb-5 mt-5">Crea</button>
  </form>
@endsection
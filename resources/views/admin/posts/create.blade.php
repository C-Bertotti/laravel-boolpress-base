@extends('layouts.base')

@section('pageTitle')
    Crea un nuovo post
@endsection

@section('content')
<form action="{{route('admin.post.store')}}" method="POST">
    @method('POST')
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="date">date</label>
        <input type="date" class="form-control" id="date" name="date" placeholder="Date">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" rows="10" placeholder="Content"></textarea>
    </div>
    <div class="form-group">
        <label for="image">image</label>
        <input type="text" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="published">published</label>
        <input type="checkbox" class="form-control" id="published" name="published" placeholder="published">
    </div>
    <button type="submit" class="btn btn-primary">Crea</button>
  </form>
@endsection
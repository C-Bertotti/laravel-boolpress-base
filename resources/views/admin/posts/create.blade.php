@extends('layouts.base')

@section('pageTitle')
    Crea un nuovo post
@endsection

@section('content')
<form action="{{route('admin.post.store')}}" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
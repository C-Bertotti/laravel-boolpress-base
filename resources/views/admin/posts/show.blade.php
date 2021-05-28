@extends('layouts.base')

@section('pageTitle')
    {{ $post->title }}
@endsection

@section('content')
    <div class=" mb-5">
        <img class="cover__image--show" src="{{ $post->image }}" alt="{{ $post->title }}">
    </div>
    <div>
        <p>{{ $post->content }}</p>
    </div>
    <div class="text-right">
        <a href="{{ route('admin.post.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
    </div>
@endsection


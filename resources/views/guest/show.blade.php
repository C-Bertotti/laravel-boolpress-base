@extends('layouts.guest.guestBase')

@section('pageTitle')
    BoolPress - {{ $post->title }}
@endsection

@section('mainContent')
    <div class="col-md-8 blog-main">
        <div class="blog-post">
            <h1 class="blog-post-title">{{ $post->title }}</h1>
            <p class="blog-post-meta">{{ $post->date }}</p>
            <p>{{ $post->content }}</p>
            <p><a href="{{ route('guest.posts.index') }}">Torna alla Home</a></p>
        </div>
    </div>
@endsection

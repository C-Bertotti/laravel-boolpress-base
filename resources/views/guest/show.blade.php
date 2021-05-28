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

            <!-- commenti -->
            <h3>Commenti</h3>
            <ul>
                @forelse ($post->comments as $comment)
                    <li>
                        <h3>{{ $comment->name}}</h3>
                        <p>{{ $comment->content}}</p>
                        <p><small>{{ $comment->created_at }}</small></p>
                    </li>
                @empty
                    <p>Non ci sono ancora commenti.</p>
                @endforelse
            </ul>
            <a href="{{ route('guest.posts.index') }}">Torna alla Home</a>
        </div>
    </div>
@endsection

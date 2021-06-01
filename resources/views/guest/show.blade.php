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
            <hr>

            <!-- tags -->
            <div>
                <h3>Tags</h3>
                @foreach ($post->tags as $tag)
                    <span class="badge badge-primary">{{ $tag->name }}</span>
                @endforeach
            </div>
            <!-- tags -->
            
            <!-- commenti -->
            <h3 class="mt-3">Commenti</h3>
            <ul>
                @forelse ($post->comments as $comment)
                    <li>
                        <h5>{{ $comment->name ? $comment->name : 'Anonimo'}}</h5>
                        <p class="mb-2"><small>{{ $comment->created_at }}</small></p>
                        <p>{{ $comment->content}}</p>
                    </li>
                @empty
                    <p>Non ci sono ancora commenti.</p>
                @endforelse
            </ul>
            <!-- /commenti -->

            <!-- aggiungi commento -->
            <div>
                <h4 class="mb-3">Aggiungi commento</h4>
                <form action="{{route('guest.posts.add-comment', ['post' => $post->id])}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name') ? old('name') : ''  }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Commento</label>
                        <textarea type="text" class="form-control" id="content" name="content" placeholder="Inserisci un commento">{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5 mt-5">Aggiungi commento</button>
                </form>
            </div>
            <!-- /aggiungi commento -->

            <a href="{{ route('guest.posts.index') }}">Torna alla Home</a>
        </div>
    </div>
@endsection

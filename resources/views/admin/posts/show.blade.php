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

    <h3 class="mb-3">Commenti</h3>
            <ul>
                @forelse ($post->comments as $comment)
                    <li>
                        <h4>{{ $comment->name}}</h4>
                        <p>{{ $comment->content}}</p>
                    </li>
                @empty
                    <p>Non ci sono ancora commenti.</p>
                @endforelse
            </ul>
    <div class="text-right">
        <a href="{{ route('admin.post.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
    </div>
@endsection


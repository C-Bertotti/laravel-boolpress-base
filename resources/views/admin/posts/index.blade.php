@extends('layouts.base')

@section('pageTitle')
    Lista dei post
@endsection

@section('content')
    <div class="text-right">
        <a href="{{ route('admin.post.create') }}"><button type="button" class="btn btn-success actions"><i class="fas fa-plus"></i></button></a>
    </div>

    <table class="table mt-4 table-striped">
        <thead>
        <tr>
            <th scope="col">Immagine</th>
            <th scope="col">Titolo</th>
            <th scope="col">Data creazione</th>
            <th scope="col">Pubblicato</th>
            <th scope="col">Azioni</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><img class="cover__image--index" src="{{ $post->image ? $post->image : 'https://via.placeholder.com/100'}}" alt="{{ $post->title }}"></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->published }}</td>
                    <td class="column--action">
                        <a href="{{ route('admin.post.show', ['post' => $post->id ] ) }}"><button type="button" class="btn btn-secondary actions"><i class="fas fa-eye"></i></button></a>
                        <a href="{{ route('admin.post.edit', ['post' => $post->id ] ) }}"><button type="button" class="btn btn-primary actions"><i class="fas fa-pen"></i></button></a>
                        <form action="{{route('admin.post.destroy', ['post' => $post->id ])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger actions"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (session('message'))
        <div class="alert alert-success alert__messages">
            {{ session('message') }}
        </div>
    @endif
@endsection
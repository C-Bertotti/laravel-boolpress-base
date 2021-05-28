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
            <th scope="col">Locandina</th>
            <th scope="col">Titolo</th>
            <th scope="col">Regista</th>
            <th scope="col">Generi</th>
            <th scope="col">Azioni</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td><img class="cover__image--index" src="{{ $movie->cover_image }}" alt="{{ $movie->title }}"></td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->author }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td class="column--action">
                        <a href="{{ route('movies.show', ['movie' => $movie->id ] ) }}"><button type="button" class="btn btn-secondary actions"><i class="fas fa-eye"></i></button></a>
                        <a href="{{ route('movies.edit', ['movie' => $movie->id ] ) }}"><button type="button" class="btn btn-primary actions"><i class="fas fa-pen"></i></button></a>
                        <form action="{{route('movies.destroy', ['movie' => $movie->id ])}}" method="POST">
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
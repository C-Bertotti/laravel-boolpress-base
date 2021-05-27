@extends('layouts.guest.guestBase')

@section('pageTitle')
    BoolPress
@endsection

@section('mainContent')
    <div class="row">
        <div class="col-md-8 blog-main">
            @foreach ($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta">{{ $post->date }}</p>
                <p>{{ $post->content }}</p>
                <p><a href="{{ route('guest.posts.show', ['slug' => $post->slug]) }}">Leggi di più</a></p>
            </div><!-- /.blog-post -->
            @endforeach
        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <h4 class="font-italic">About</h4>
                <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>

            <div class="p-3">
                <h4 class="font-italic">Archives</h4>
                <ol class="list-unstyled mb-0">
                    <li><a href="#">June 2021</a></li>
                    <li><a href="#">May 2021</a></li>
                    <li><a href="#">April 2021</a></li>
                    <li><a href="#">March 2021</a></li>
                    <li><a href="#">February 2021</a></li>
                    <li><a href="#">January 2021</a></li>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

@endsection
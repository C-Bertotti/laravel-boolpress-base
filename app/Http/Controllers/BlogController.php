<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() 
    {
        //1. prendo i dati salvati all'interno del Model Post(mi ricordo di importarla con  lo use) e li inserisco in una variabile;
        $posts = Post::where('published', 1)->orderBy('date', 'desc')->limit(5)->get();

        //2. ritorno la view dell'homepage del sito;
        return view('guest.index', compact('posts'));
    }

    public function show($slug) 
    {
        //1. Prendo il post che ha quello slug
        $post = Post::where('slug', $slug)->first();

        if ( $post == null ) {
            abort(404);
        }

        //2. Ritorno la view della pagina show
        return view('guest.show', compact('post'));
    }

    public function addComment(Request $request, Post $post)
    {
        //validazione
        $request->validate([
            'name' => 'nullable|string|max:100',
            'content' => 'required|string',
        ]);

        //inserisco un nuovo commento
        $newComment = new Comment();
        $newComment->post_id = $post->id;
        $newComment->name = $request->name;
        $newComment->content = $request->content;
        $newComment->save();

        return back();
    }
}

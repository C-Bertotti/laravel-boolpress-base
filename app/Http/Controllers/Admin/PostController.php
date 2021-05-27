<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione
        $data = $request->all();

        if (!isset($data['published'])) {
            $data['published'] = false;
        } else {
            $data['published'] = true;
        }

        $request->validate([
            'title' => 'required|max:255|string',
            'date' => 'required|date',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        //insert
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->date = $data['date'];
        $newPost->content = $data['content'];
        $newPost->image = $data['image'];
        $newPost->slug = Str::slug($data['title'], '-');
        $newPost->published = $data['published'];
        $newPost->save();

        //reindirizzamento
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //visualizzo i commenti 
        dd($post->comments);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

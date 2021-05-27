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

        return view('admin.posts.index', compact('posts'));
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
    
        //1. Validazione dei dati inseriti
        $request->validate([
            'title' => 'required|max:255|string',
            'date' => 'required|date',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);
        
        //2.salvo i dati in una variabile d'appoggio
        $data = $request->all();

        //3. Faccio un controllo sulla checkbox. La chiave  "published" è settata? allora inserisco come valore della chiave 1, altrimenti 0
        $data['published'] = isset($data['published']) ? 1 : 0;

        //4. Se passa la validazione vado a fare l'operazione di

        //INSERT

        //1. Istanzio un nuovo elemento sulla base del modello Post (mi ricordo di inserire il Model nella parte alta del documento con Use 'App\Post')
        $newPost = new Post();

        //2. Attribuisco i le chiavi-valore all'istanza
        $newPost->title = $data['title'];
        $newPost->date = $data['date'];
        $newPost->content = $data['content'];
        $newPost->image = $data['image'];
        $newPost->slug = Str::slug($data['title'], '-');
        $newPost->published = $data['published'];

        $newPost->save(); 

        //NB: Se non avessimo dovuto manipolare lo slug avremmo potuto semplicemente scrivere Post::create($data), altriment avremo potuto usarlo ma solamente se avessimo assegnato il valore slug al di fuori sotto la variabile d'appoggio $data['slug'] = Str::slug($data['title'], '-');

        //reindirizzamento
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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

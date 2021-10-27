<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::find(1);
        // dd($user->info->adress);

        $categories = Category::all();
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags', 'post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ! Validazione
        $request->validate([
            'title' => 'required|string|unique:posts|min:5',
            'content' => 'required|string|min:5',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ], [
            'required' => 'The :attribute field is required',
            'string' => 'The content entered in the :attribute field is not a string',
            'min' => 'The minimum number of characters for the :attribute field is :min',
            'title.unique' => 'The title already exists'
        ]);
        // !

        $data = $request->all();                                //Contiene tutti i dati inviati dal form

        $post = new Post();
        $data['user_id'] = Auth::id();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');

        $post->save();

        //Se ho dei tags creo la relazione
        if (array_key_exists('tags', $data)) $post->tags()->attach($data['tags']);

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();

        //Recupero l'id del post che voglio editare e salvo i tag in un array
        $tagIds = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('tags', 'post', 'tagIds', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // ! Validazione
        $request->validate([
            'title' => ['required', 'string', Rule::unique('posts')->ignore($post->id), 'min:5'],
            'content' => 'required|string|min:5',
            'category_id' => 'nullable|exists:categories,id'
        ], [
            'required' => 'The :attribute field is required',
            'string' => 'The content entered in the :attribute field is not a string',
            'min' => 'The minimum number of characters for the :attribute field is :min',
            'title.unique' => 'The title already exists'
        ]);
        // !

        $data = $request->all();                                //Contiene tutti i dati inviati dal form

        $data['slug'] = Str::slug($data['title'], '-');

        $post->update($data);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert-message', 'Post successfully deleted')->with('alert-type', 'success');
    }
}

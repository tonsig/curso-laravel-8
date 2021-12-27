<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\VerificarPosts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        // dd($posts);  // debug da variável

        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(VerificarPosts $request){
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id){
        // $post = Post::where('id', $id )->first();
        if (!$post = Post::find($id)){ // por default usa chave primária
            return redirect()->route('posts.index');
        }
        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id){
        if (!$post = Post::find($id)){ // por default usa chave primária
            return redirect()->route('posts.index');
        }
        $post->delete(); 
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post excluído com sucesso!');       
    }
}

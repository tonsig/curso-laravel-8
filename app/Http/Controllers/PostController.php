<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\VerificarPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
    //    $posts = Post::all();
        // por default paginate é 15
        $posts = Post::orderBy('id', 'ASC')->paginate(5);

        // dd($posts);  // debug da variável

        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(VerificarPosts $request){
        $data = $request->all();

        if($request->image->isValid()){
            $nameFile = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();
            $file = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $file;  // guarda o caminho do arquivo de imagem
        }

        Post::create($data);
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
        if (Storage::exists($post->image)){
            Storage::delete($post->image);
        }        
        $post->delete(); 
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post excluído com sucesso!');       
    }

    public function edit($id){
        // $post = Post::where('id', $id )->first();
        if (!$post = Post::find($id)){ // por default usa chave primária
            return redirect()->back();
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function put(VerificarPosts $request, $id){
        // $post = Post::where('id', $id )->first();
        if (!$post = Post::find($id)){ // por default usa chave primária
            return redirect()->back();
        }

        $data = $request->all();

        if($request->image && $request->image->isValid()){
            if (Storage::exists($post->image)){
                Storage::delete($post->image);
            }
            $nameFile = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();
            $file = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $file;  // guarda o caminho do arquivo de imagem
        }


        $post->update($data);

        return redirect()
        ->route('posts.index')
        ->with('message', 'Post alterado com sucesso!'); 
    }

    public function search(Request $request)
    {
        // $filters = $request->all();
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                   ->orWhere('content', 'LIKE', "%{$request->search}%")
                   ->paginate(5);    // ->toSql() retorna a sql
        return view('admin.posts.index', compact('posts', 'filters'));
    }

}

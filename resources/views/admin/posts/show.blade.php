@extends('admin.layouts.app')

@section('title', 'Posts Existentes');

@section('content')

<h1> Detalhes do post {{ $post->title }} </h1>
<ul>
<li><strong>Título: </strong>{{ $post->title}}</li>
<li><strong>Conteúdo: </strong>{{ $post->content}}</li>
</ul>
<form method="post" action=" {{ route('posts.destroy', $post->id) }} ">
  @csrf
  <input type="hidden" name="_method" value="DELETE">
  <button type="submit">Excluir o post: {{ $post->title}} </button>
</form>
<br><a href=" {{ route('posts.index') }} ">voltar</a>

@endsection
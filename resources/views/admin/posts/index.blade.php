@extends('admin.layouts.app')

@section('title', 'Posts Existentes');

@section('content')

      <a href=" {{ route('posts.create') }} ">Criar novo post</a>
      <hr>
      @if ( session('message'))
          <div> {{ session('message')}} </div>
      @endif

      <form action="{{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Filtrar:">
        <button type="submit">Filtrar</button>
      </form>

      <h1>Posts Existentes</h1>

      @foreach($posts as $post)
      <p> 
          @if (isset($post->image))
              <img src="{{ url("storage/$post->image") }}" alt="{{ $post->title }}" style="width:100px;">
          @endif      
          {{ $post->title }} 

          [ 
            <a href="{{ route('posts.show', $post->id) }}">Consultar</a> | 
            <a href="{{ route('posts.edit', $post->id) }}">Alterar</a>
          ]
        
        </p>

      @endforeach
      <hr>
      @if (isset($filters))
        {{ $posts->appends($filters)->links() }}
      @else
        {{ $posts->links() }}  
      @endif



@endsection
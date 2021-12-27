<a href=" {{ route('posts.create') }} ">Criar novo post</a>
<hr>
@if ( session('message'))
    <div> {{ session('message')}} </div>
@endif
<h1>Posts Existentes</h1>

@foreach($posts as $post)
 <p> {{ $post->title }} [ <a href="{{ route('posts.show', $post->id) }}">Detalhes</a>]</p>

@endforeach

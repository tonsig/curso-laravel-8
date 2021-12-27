<h1>Cadastrar Novo Post</h1>
@if ($errors->any())
  <div>
    <ul>
     @foreach ($errors->all() as $error)
         <li> {{ $error }} </li>
     @endforeach
    </ul>
  </div>
    
@endif

<form method="post" action=" {{ route('posts.store') }} ">
@csrf
    <input type="text" name="title" value="{{ old('title') }}" placeholder="informe o título" id="title">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteúdo do post">{{ old('content') }}</textarea>
    <button type="submit">Enviar</button>
</form>
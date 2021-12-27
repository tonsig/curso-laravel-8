@if ($errors->any())
  <div>
    <ul>
     @foreach ($errors->all() as $error)
         <li> {{ $error }} </li>
     @endforeach
    </ul>
  </div>
    
@endif

@csrf
<input type="text" name="title" value="{{ $post->title ?? old('title') }}" placeholder="informe o título" id="title">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteúdo do post">{{ $post->content ?? old('content')}}</textarea>
    <input type="file" name="image" id="image">
    <button type="submit">Enviar</button>
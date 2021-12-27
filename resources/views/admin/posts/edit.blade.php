@extends('admin.layouts.app')

@section('title', 'Alteração Post');

@section('content')

<h1>Editar Post <strong>{{ $post->title }}</strong></h1>
<form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
@method('put')
@include('admin.posts._partials.form');
</form>

@endsection
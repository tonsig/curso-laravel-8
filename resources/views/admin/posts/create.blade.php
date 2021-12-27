@extends('admin.layouts.app')

@section('title', 'Novo Post');

@section('content')

<h1>Cadastrar Novo Post</h1>

<form method="post" action=" {{ route('posts.store') }} " enctype="multipart/form-data">
@include('admin.posts._partials.form');
</form>

@endsection
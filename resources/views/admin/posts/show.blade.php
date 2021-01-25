@extends('admin.layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')

<h1 class="text-center text-3x1 uppercase font-black my-4">Detalhes do Usuário ID: {{ $post->id }} </h1>
<a class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg" href="{{ route('posts.index') }}">Home</a>
<ul class="text-center text-3x1">
    <li><strong>Id: </strong>{{ $post->id }}</li>
    <li><strong>Nome: </strong>{{ $post->nome }}</li>
    <li><strong>Email: </strong>{{ $post->email }}</li>
    <li><strong>Telefone: </strong>{{ $post->telefone }}</li>
    <li><strong>Inicio Tarefa: </strong>{{ $post->inicio_tarefa }}</li>
    <li><strong>Término Tarefa: </strong>{{ $post->termino_tarefa }}</li>
    <li><strong>Observação Tarefa: </strong>{{ $post->observacao_tarefa }}</li>
</ul>

<!-- Todo formulário tem que usar o csrf -->
<form action="{{ route('posts.destroy', $post->id)}}" method="post">
    @csrf
    @method('delete')
    <!--<input type="hidden" name="_method" value="DELETE">-->
    <button class="mr-5 bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-lg" type="submit">Deletar o ID : {{ $post->id }}</button>
</form>

@endsection
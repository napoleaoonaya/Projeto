@extends('admin.layouts.app')

@section('title', 'Listagem de Usuários')

@section('content')

<p class="text-right">
    <a class="text-3x1 my-4" href="{{ url('/logout') }}"> Sair do sistema </a>    
</p>

<div class="container">
    
<a class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none" href="{{ route('posts.create') }}">Cadastrar Usuários</a>

<h1 class="text-center text-3x1 uppercase font-black my-4">Usuários cadastrados</h1>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif


<form action="{{ route('posts.search') }}" method="post">
    @csrf
    <input type="text" name="search" id="search" class="focus:ring-indigo-300 focus:border-indigo-300 flex-1 block rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Pesquisar Usuários">
    <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none" type="submit">Pesquisar</button>
</form>


<hr>

<h1 class="text-center text-3x1 uppercase font-black my-4">Listagem</h1>
@foreach ($posts as $post)
    <p class="text-left text-3x1 uppercase my-4">
        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Id</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Nome</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Email</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Telefone</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Inicio Tarefa</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Termino Tarefa</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Observacao Tarefa</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Listar</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $post->id }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $post->nome }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $post->email }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $post->telefone }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $post->inicio_tarefa }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $post->termino_tarefa }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $post->observacao_tarefa }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <a class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-pink-500 uppercase transition bg-transparent border-2 border-pink-500 rounded ripple hover:bg-pink-100 focus:outline-none" href="{{ route('posts.show', $post->id)}}">Ver</a>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <a class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded ripple hover:bg-yellow-100 focus:outline-none" href="{{ route('posts.edit', $post->id)}}">Editar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </p>
@endforeach
<hr>

@if (isset($filters))
    {{ $posts->appends($filters)->links() }}    
@else
    {{ $posts->links() }}
@endif

</div>
@endsection
<!-- $errors é um array de erros, any é a função que pega todos erros se existir -->
@if ($errors->any())
    <ul>
        <!-- Intera na variavel $errors para pegar cada campo de erro, usa se a função all() para 
        pegar todos os campos -->
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

@csrf
<!-- value= $post->title ?? old('title') a duas interrogações faz um if e else -->
<!-- helper session flash para manter o valor de dados old() -->

<label for="nome">
    Nome<input type="text" name="nome" id="nome" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Nome" value={{ $post->nome ?? old('nome') }}>
</label><br>
<label for="email">
    Email<input type="email" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="E-mail" value={{ $post->email ?? old('email') }}>
</label><br>
<label for="telefone">
    Telefone<input type="tel" name="telefone" id="telefone" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Telefone" value={{ $post->telefone ?? old('telefone') }}>
</label><br>
<label for="inicio_tarefa">
    Início Tarefa<input type="date" name="inicio_tarefa" id="inicio_tarefa" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Início Tarefa" value={{ $post->inicio_tarefa ?? old('inicio_tarefa') }}>
</label><br>
<label for="termino_tarefa">
    Termino Tarefa<input type="date" name="termino_tarefa" id="termino_tarefa" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Termino Tarefa" value={{ $post->termino_tarefa ?? old('termino_tarefa') }}>
</label><br>
<label for="observacao_tarefa">
    Observação Tarefa<input type="text" name="observacao_tarefa" id="title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Observação Tarefa" value={{ $post->observacao_tarefa ?? old('observacao_tarefa') }}>
</label><br>
<button type="submit" class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">Enviar</button>
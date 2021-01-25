<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        //return 'PostController index';
        //return view('welcome');

        //$posts = Post::all();

        //para paginar
        $posts = Post::latest()->paginate(3);
        
        //$posts = Post::orderBy('id', 'DESC')->paginate();

        //or $post = Post::get();

        //Eloquent ORM Laravel
        //dd($posts);

        return view('admin.posts.index', compact('posts'));

        //or 
        // return view('admin.posts.index', [
        //    'posts' => $posts
        // ]);
        //
    }

    public function create(){

        return view('admin.posts.create');
         
    }

    public function store(StoreUpdatePost $request)
    {

        $data = $request->all();
        
        Post::create($data);
       
        return redirect()
        ->route('posts.index')
        ->with('message','Post cadastrado com sucesso');
    }

    //Usando o Request de validação StoreUpdatePost
    //public function store(StoreUpdatePost $request){   
    //    Post::create($request->all());
    //    return redirect()->route('posts.index');
    //}

    public function show($id){
        //dd($id);
        
        //Busca todos registros pelo id mais só mostra o primeiro por causa da função first
        //$post = Post::where('id',$id)->first();

        //Busca usando o find pesquisando pelo $id
        //$post = Post::find($id)

        $post = Post::find($id);

        //Se não tiver o $id no post ele volta para o index
        if(!$post){
            return redirect()->route('posts.index');
        }
            
        return view('admin.posts.show',compact('post'));
    
        //dd($post);
        
    }

    public function destroy($id){
        //dd("Deletando o post $id");

        if(!$post = Post::find($id))
            return redirect()->route('posts.index');
      
        $post->delete();
        
        return redirect()
            ->route('posts.index')
            ->with('message','Post deletado com sucesso');
            
    }

    public function edit($id){
        
        $post = Post::find($id);
       
        if(!$post){
            return redirect()->back();
        }
            
        return view('admin.posts.edit',compact('post'));
    
        
    }

    public function update(StoreUpdatePost $request, $id)
    {
        
        $post = Post::find($id);
       
        if(!$post){
            return redirect()->back();
        }

        $data = $request->all();

        $post->update($data);

        return redirect()
        ->route('posts.index')
        ->with('message','Post atualizado com sucesso');
        
    }

    public function search(Request $request)
    {

        //Cria o filtro da paginação memória com todos os campos
        //$filters = $request->all();

        //Cria o filtro da paginação exceto com o _token
        $filters = $request->except('_token');

        //Post::where('title', '=', $request->search)

        $posts = Post::where('nome', 'LIKE', "%{$request->search}%")
            ->orWhere('email', 'LIKE', "%{$request->search}%")
            ->orWhere('telefone', 'LIKE', "%{$request->search}%")
            ->orWhere('inicio_tarefa', 'LIKE', "%{$request->search}%")
            ->orWhere('termino_tarefa', 'LIKE', "%{$request->search}%")
            ->orWhere('observacao_tarefa', 'LIKE', "%{$request->search}%")
            ->paginate(3);

        // ->toSql()
        // dd($posts)    

        return view('admin.posts.index', compact('posts','filters'));
    }

    public function logout(){
        //Saindo do sistema
        auth()->logout();
        //Redirecionando para o home
        return redirect('/');
    }
}

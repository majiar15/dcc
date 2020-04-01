<?php

namespace App\Http\Controllers;
use App\posts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct() {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('post.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
 
     
        
        $validate = $request->validate([
            
             'name' => 'string|required',
             'description'  => 'string|required',
             'date' => 'date|required',
             'image'=> 'image',
                
        ]);
        $category = $request->input('category');
        switch ($category){
        case 'Accion Social': 
            $category = 1;
            break;
        case 'Gestion Ambiental': 
            $category = 2;
            break;
        case 'Gestion de Riesgo': 
            $category = 3;
            break;
        case 'Capacitaciones': 
            $category = 4;
            break;
        }
        $name = $request->input('name');
        $description = $request->input('description');
        $file = $request->file('image');
        $date = $request->input('date');
        $fileName = time().$file->getClientOriginalName();
      
        Storage::disk('posts')->put($fileName , File::get($file));
       
        $user = \Auth()->user();
        
        $post = new posts;
        $post->user_id = $user->id;
        $post->category_id = $category;
        $post->name = $name;
        $post->description = $description;
        $post->date = $date;
        $post->image = $fileName;
        $post->save();

     return redirect()->route('storePost')->with(['message' => 'la Publicacion se creo correctamente!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function GetPost($postName){
        $post = Storage::disk('posts')->get($postName);
        
        return new Response($post, 200);
    }
    public function show($id) {
        $post = posts::find($id);
        
        $category = $post->category_id;
        switch ($category){
        case 1: 
            $category = 'Accion Social';
            break;
        case 2: 
            $category = 'Gestion Ambiental';
            break;
        case 3: 
            $category = 'Gestion de Riesgo';
            break;
        case 4: 
            $category = 'Capacitaciones';
            break;
        }
        
        return view('post.detail',[
            'post' => $post,
            'category' => $category
        ]);
    }
    public function search(Request $request){
        $request->validate([
            'name' =>'string|required'
        ]);
        
        $search = $request->input('name');
        if(!empty($search)){
            $posts = posts::where('name' ,'LIKE', '%'.$search.'%')
                    ->orderBy('id','desc')
                    ->paginate(5);
            if($posts->isEmpty()){
            $message = 'no se encontro publicacion que contenga las palabras '.$search;    
            }else{
                 $message = 'Busqueda '.$search;
            }
            
        }else{
            $posts = Posts::all();
            $message = 'no se encontro publicacion que contenga las palabras '.$search;
        }

    
       return view('post.crud',[
           'posts' => $posts
       ]);
    }
    public function store($id){
        $post = posts::find($id);
        
        return view('post.edit',[
             'post'=>$post
        ]);
    }
    public function showCrudPost(){
        $posts = Posts::all();
        return view('post.crud',[
            'posts' => $posts
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id) {
        $request->validate([
           'name'  => 'string|required',
           'description' => 'string|required',
           'category' => 'string|required',
           'date' => 'string|required'
        ]);
        
        $name = $request->input('name');
        $description =$request->input('description');
        $category = $request->input('category');
        switch ($category){
        case 'Accion Social': 
            $category = 1;
            break;
        case 'Gestion Ambiental': 
            $category = 2;
            break;
        case 'Gestion de Riesgo': 
            $category = 3;
            break;
        case 'Capacitaciones': 
            $category = 4;
            break;
        }
        $date = new \DateTime($request->input('date'));
        $date = $date->format('Y-m-d');     
        
        $post = Posts::find($id);
        $post->name = $name;
        $post->description = $description;
        $post->date = $date;
        $post->category_id = $category;
        
        $post->save();
        
        
        return redirect()->route('post.crud')->with(['message' =>"se actulizo correctamente la publicacion correctamente!"]);

        
        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Posts::find($id);
        Storage::disk('posts')->delete($post->image);
        $post->delete();
        return redirect()->route('post.crud')->with([
            'message' => 'se ha eliminado la publicacion '.$post->name
        ]);
    }
}

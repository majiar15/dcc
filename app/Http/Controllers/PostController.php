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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function edit(hora $hora) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hora $hora) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function destroy(hora $hora) {
        //
    }
}

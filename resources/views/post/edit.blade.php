@extends('layouts.dashboard.index')
@section('content')


<h1 class="d-flex justify-content-center">editar publicacion</h1>

<div class="row">
    <div class="col-4 px-lg-4 px-md-4 px-xl-4">
        <form action="{{url('/posts/edit',$post->id)}}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="form-group">
                    <label for="name" >Nombre:</label>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$post->name}}">
                    <div class="invalid-feedback">
                        ingresa el nombre de la publicacion
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" >Descripcion:</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" >{{$post->description}}</textarea>
                    <div class="invalid-feedback"> 
                        Agrega una descripcion
                    </div>
               </div>
                <div class="form-group">
                    <label for="Category">Categoria</label>
                    <select id="category" name="category" class="form-control @error('category') is-invalid @enderror">
                        <option @if($post->category_id == 1) selected @endif>Accion Social</option>
                        <option @if($post->category_id == 2) selected @endif>Gestion Ambiental</option>
                        <option @if($post->category_id == 3) selected @endif>Gestion de Riesgo</option>
                        <option @if($post->category_id == 4) selected @endif>Capacitaciones</option>
                    </select>
                    <div class="invalid-feedback">
                        selecciona una categoria
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" >fecha:</label>
                    <input id="date" type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{$post->date}}">
                    <div class="invalid-feedback">
                        selecciona una fecha valida
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="editar">
                </div>


        </form>

    </div>
  </div>    

@endsection
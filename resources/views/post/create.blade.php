@extends('layouts.dashboard.index')
@section('content')
@include('includes.message')

<h3>Crear publicacion</h3>

<div class="row">
<form action="{{route('createPost')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
        <div class="form-group">
            <label for="name" >Nombre:</label>
            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            <div class="invalid-feedback">
                ingresa el nombre de la publicacion
            </div>
        </div>
        <div class="form-group">
            <label for="description" >Descripcion:</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}"></textarea>
            <div class="invalid-feedback"> 
                Agrega una descripcion
            </div>
       </div>
        <div class="form-group">
            <label for="Category">Categoria</label>
            <select id="category" name="category" class="form-control @error('category') is-invalid @enderror">
                <option>Accion Social</option>
                <option>Gestion Ambiental</option>
                <option>Gestion de Riesgo</option>
                <option>Capacitaciones</option>
            </select>
            <div class="invalid-feedback">
                selecciona una categoria
            </div>
        </div>
        <div class="form-group">
            <label for="name" >fecha:</label>
            <input id="date" type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}">
            <div class="invalid-feedback">
                selecciona una fecha valida
            </div>
        </div>
        <div class="form-group">
            <label name="image">Imagen</label>
            <input id="image" name="image" type="file" class="form-control-file @error('image') is-invalid @enderror "/>
            <div class="invalid-feedback">
                selecciona una imagen 
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="crear">
        </div>
    <div>

</form>
</div>
      

@endsection
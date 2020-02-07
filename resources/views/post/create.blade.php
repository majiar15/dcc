@extends('layouts.modulo')
@section('content')
@include('includes.message')

<h3>Crear publicacion</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('createPost')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name" >Nombre:</label><br>
    <input type="text" name="name"><br>
    <label for="description" >Descripcion:</label><br>
    <textarea name="description"></textarea><br>
    <label for="Category">Categoria</label><br>
    <select name="category">
        <option>Accion Social</option>
        <option>Gestion Ambiental</option>
        <option>Gestion de Riesgo</option>
        <option>Capacitaciones</option>
    </select><br>
    <label for="name" >fecha:</label><br>
    <input type="date" name="date"><br>
    <label name="image">Imagen</label><br>
    <input name="image" type="file" /><br>
    <br>
    <input type="submit">


</form>



@endsection
@extends('layouts.dashboard.index')
@section('search')

<form method="POST" action="{{route('post.search')}}"class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    @csrf
    <div class="input-group">
        <input name="name" type="text" class="form-control bg-light border-0 small" placeholder="buscar post" aria-label="Search" aria-describedby="basic-addon2" >
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

@endsection

@section('content')

@include('includes.message')

<h1>Lista de Publicaciones</h1>
<table class="table">
    <thead>
    <th>#</th>
    <th>nombre</th>
    <th>Descripcion</th>
    <th>fecha</th>
    <th>modificar</th>
    <th>eliminar</th>
    </thead>
    <tbody>
        
    @foreach($posts as $post)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$post->name}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->date}}</td>
            
            <td>
                <a href="{{url('posts/store',$post->id)}}">
                    <button class="btn btn-warning" >
                        editar
                    </button>
                </a>
                </td>
                
            <td>
           
                    <button class="btn btn-danger" data-toggle="modal" data-target="#logoutModal">
                        Eliminar
                    </button>
            
                
                
                
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿estas seguro?</h5>
                        
                    </div>
                    <div class="modal-body">si eliminas la publicacion no podras recuperarla, ¿estas seguro de eliminarla?</div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="button" data-dismiss="modal">cancelar</button>
                        <a class="btn btn-danger" href="{{ url('posts/delete',$post->id)}}">
                                      Eliminar
                        </a>
                    </div>
                </div>
            </div>
        </div>
                
                
                
                
          
                
            </td>
        </tr>
    @endforeach
    
    </tbody>
</table>


@endsection

@extends('layouts.footer')
@extends('layouts.body')


@section('content')
<div class="col-sm-8">
                    <div class="list-posts">
                        @foreach($posts as $post)
                        <article class="post type-post media">
                            <div class="entry-thumbnail media-left pull-left"><img src="{{route('post.image' , ['postName' => $post->image])}}" alt="{{'imagen '.$post->name}}"></div><!-- /.entry-thumbnail -->
                            <div class="entry-content media-body">
                                <span class="category"><a href="categories.html">{{$post->category}}</a></span><!-- /.category -->
                                <h2 class="entry-title"><a href="standard.html">{{$post->name}}</a></h2><!-- /.entry-title -->
                                <span class="time"><time datetime="2017-12-05">{{$post->date}}</time></span><!-- /.time -->
                                <p>
                                    {{$post->description}}
                                </p>

                                <a href="{{Route('post.show',['id'=> $post->id])}}" class="btn">leer mas</a><!-- /.btn -->
                            </div><!-- /.entry-content -->
                        </article><!-- /.post -->
                        @endforeach
                        
                      
                        
                    </div><!-- /.list-posts -->

                     {{ $posts->links()}}
                </div>

                <div class="col-sm-4">
                    <aside class="sidebar text-center">
                        <div class="widget widget_about_author">
                            <h3 class="widget-title">Presidente JDC Chiquinquira</h3><!-- /.widget-title -->
                            <div class="widget-details">
                                <div class="author-avatar"><img src="{{asset('img/presidente.jpeg')}}" alt="Avatar" class="img-circle"></div><!-- /.author-avatar -->
                                <p>
                                    siempre estamos con las puertas abiertas a los nuevos :3
                                </p>
                                <div class="author-social">
                                    
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div><!-- /.author-social -->
                            </div><!-- /.widget-details -->
                        </div><!-- /.widget -->
@endsection

@extends('layouts.head')

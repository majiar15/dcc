
@extends('layouts.footer')
@extends('layouts.body')


@section('content')

<div class="col-sm-8">
    <div class="single-post">
        <div class="type-standard">
            <article class="post type-post">
                <div class="top-content text-center">
                    <span class="category"><a href="categories.html">{{$category}}</a></span><!-- /.category -->
                    <h2 class="entry-title"><a href="standard.html">{{$post->name}}</a></h2><!-- /.entry-title -->
                    <span class="time"><time datetime="2017-12-05">{{$post->date}}</time></span><!-- /.time -->
                </div><!-- /.top-content --> 

                <div class="entry-thumbnail"><img src="{{Route('post.image',['PostName' => $post->image])}}" alt="{{$post->image}}"></div><!-- /.entry-thumbnail -->

                <div class="entry-content">
                    <p>{{$post->description}}</p>

                    <div class="post-meta">
                        <span class="comments pull-left"><i class="icon_comment_alt"></i> <a href="#">2comentarios</a></span><!-- /.comments -->
                        <span class="post-social pull-right">
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </span><!-- /.post-social -->
                    </div><!-- /.post-meta -->
                    </div>
            </article>
        </div>
    </div>
</div>

<div class="col-sm-4">



@endsection



@extends('layouts.head')

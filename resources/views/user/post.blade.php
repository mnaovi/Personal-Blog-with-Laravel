@extends('user/app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('user/css/prism.css')}}">
@endsection

@section('bg-img',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('sub-heading',$post->subtitle)



@section('main-content')

<!--fb comments -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
 <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <small>created at {{$post->created_at->diffforHumans()}}</small>
       
            @foreach ($post->categories as $category)

            <a href="{{route('category',$category->slug)}}">
              <small class="float-right" style="margin-right: 20px;">

                {{$category->name}}

               </small>
               </a>
            @endforeach

          
          {!! htmlspecialchars_decode($post->body) !!}

          <!--tag -->
          
          <h3>Tag Clouds</h3>

           @foreach ($post->tags as $tag)
              <a href="{{route('tag',$tag->slug)}}">
              <small class="float-left" style="margin-right: 20px; border-radius: 5px; border: 1px solid grey; padding: 5px;">

                {{$tag->name}}

               </small>
             </a>
            @endforeach

          
        </div>
        <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div>
      </div>
    </div>
  </article>

  <hr>
@endsection

@section('footer')
<script src="{{ asset('user/js/prism.js')}}"></script>
@endsection
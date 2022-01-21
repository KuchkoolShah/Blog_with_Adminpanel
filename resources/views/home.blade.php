@extends('user/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','Welcome to Home')
@section('sub-heading','')

@section('main-content')
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
             <div class="col-lg-2 col-md-2">
                            <div class="card">
                              <div class="card-header">
                               <h3>Tags</h3>
                              </div>
                              <ul class="list-group list-group-flush">
                                @foreach ($tags as $tags)

                                       <li class="list-group-item">{{$tags->name}}</li>
                                        @endforeach
                              </ul>
                            </div>
            </div>
            
             <div class="col-lg-8 col-md-8">
            
                @foreach ($post as $post)
                         <div class="card mb-3">
                              <img src= "{{asset('images/'.$post->image) }}" height="200px;" width="100%">
                              <div class="card-body">
                                <h3 class="card-title"> {{ $post->title }}</h3>
                                <p class="card-text"> {!! htmlspecialchars_decode($post->body) !!}</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                              </div>
                            </div> 

                @endforeach
                
                     <h3>Tag Clouds</h3>
                           <p>  Welcome to Bitfumes - Ed Sheeran and Spiderman (homecoming) </p>
            </div>
             <div class="col-lg-2 col-md-2">
                 <div class="card">
                              <div class="card-header">
                                <h3>Category</h3>
                              </div>
                              <ul class="list-group list-group-flush">
                                  
                                        @foreach ($categories as $category)

                                       <li class="list-group-item">{{$category->name}}</li>
                                        @endforeach
                               
                                
                              </ul>
                            </div>
            </div>
            
             
                <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
            
         
        </div>
    </div>
</article>

<hr>
@endsection
@section('footer')
@endsection


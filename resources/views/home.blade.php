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
            
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <small>Created at {{ $post->created_at }}</small>
                    @foreach ($post->categories as $category)
                    <small class="pull-right" style="margin-right: 20px">  
                        <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                    </small>
                    @endforeach
                    {!! htmlspecialchars_decode($post->body) !!}
    
                    {{-- Tag clouds --}}
                    <h3>Tag Clouds</h3>
                    @foreach ($post->tags as $tag)
                    <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">  
                                        {{ $tag->name }}
                                    </small></a>
                    @endforeach
                </div>
                <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
            
           Welcome to Bitfumes - Ed Sheeran and Spiderman (homecoming)
        </div>
    </div>
</article>

<hr>
@endsection
@section('footer')
@endsection


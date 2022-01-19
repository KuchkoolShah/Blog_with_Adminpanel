@extends('user.app')

@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','Bitfumes Blog')
@section('sub-heading','Learn Together and Grow Together')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		.fa-thumbs-up:hover{
			color:#f41115;
		}
	</style>
@endsection
@section('main-content')
	<!-- Main Content -->
	<div class="container">
	    <div class="row" id="app">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				@foreach ($posts as $post)
				<h2>{{$post->title}}</h2>
				<h4>{{$post->subtitle}}</h4>
				{!! htmlspecialchars_decode($post->body) !!}
				<h4>{{$post->created_at->diffForHumans()}}</h4>
				@endforeach
	            <hr>
	            <!-- Pager -->
	            <ul class="pager">
	                <li class="next">
	                	{{ $posts->links() }}
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>

	<hr>
@endsection
@section('footer')
	<script src="{{ asset('js/app.js') }}"></script>
@endsection
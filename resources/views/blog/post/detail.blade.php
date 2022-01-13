@extends('blog.layouts.master')

@section('content')
<div class="container">
	<div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
		<div class="h-100 tofront">
			<div class="row justify-content-between">
				<div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
					<p class="text-uppercase font-weight-bold">
						<a class="text-danger" href="./category.html">Stories</a>
					</p>
					<h1 class="display-4 secondfont mb-3 font-weight-bold">{{$post->title}}</h1>
					<div class="d-flex align-items-center">
						<img class="rounded-circle" src="assets/img/demo/avatar2.jpg" width="70">
						<small >{{$post->created_at}}</small>
					</div>
				</div>
				<div class="col-md-6 pr-0">
					<img src="{{asset($post->avatar)}}">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container pt-4 pb-4">
	<div class="row justify-content-center">
		<div class="col-lg-2 pr-4 mb-4 col-md-12">
			<div class="sticky-top text-center">
				<div class="text-muted">
					Share this
				</div>
				<div class="share d-inline-block">
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
					</div>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-8">
			<article class="article-post">
			<p>
				{!!$post->content!!}
			</p>
			</article>
		</div>
	</div>
</div>
    
<div class="container pt-4 pb-4">
	<h5 class="font-weight-bold spanborder"><span>Read next</span></h5>
	<div class="row">
		{{-- <div class="col-lg-6">
			<div class="card border-0 mb-4 box-shadow h-xl-300">
				<div style="background-image: url(./assets/img/demo/3.jpg); height: 150px; background-size: cover; background-repeat: no-repeat;">
				</div>
				<div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
					<h2 class="h4 font-weight-bold">
					<a class="text-dark" href="#">Brain Stimulation Relieves Depression Symptoms</a>
					</h2>
					<p class="card-text">
						 Researchers have found an effective target in the brain for electrical stimulation to improve mood in people suffering from depression.
					</p>
					<div>
						<small class="d-block"><a class="text-muted" href="./author.html">Favid Rick</a></small>
						<small class="text-muted">Dec 12 · 5 min read</small>
					</div>
				</div>
			</div>
		</div> --}}
		@foreach ($related_posts as $related_post)
		<div class="col-lg-6">
			<div class="flex-md-row mb-4 box-shadow">
				
				<div class="mb-3 d-flex align-items-center">
					<img height="80" src="{{asset($related_post->avatar)}}">
					<div class="pl-3">
						<h2 class="mb-2 h6 font-weight-bold">
						<a class="text-dark" href="{{$related_post->getShowURL()}}">{{$related_post->title}}</a>
						</h2>
						<small class="text-muted">
							{{$related_post->created_at}} - 
							{{$related_post->category->name}}
						</small>
					</div>
				</div>
				
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
@extends('blog.layouts.master')

@section('content')
<div class="container">
			<img src="{{asset('blog/assets/img/bb.jpg')}}" alt="">
</div>
	<div class="container pt-4 pb-4">
		
	</div>
		
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-8">
				<h5 class="font-weight-bold spanborder"><span>MỚI</span></h5>
				@foreach ($posts as $post)
					@if ($post->category->name != 'Tin tức')
						<div class="mb-3 d-flex justify-content-between">
							<div class="pr-3">
								<h2 class="mb-1 h4 font-weight-bold">
								<a class="text-dark" href="{{$post->getShowURL()}}">{{$post->title}}</a>
								</h2>
								<p>
									{!!$post->description()!!}...
								</p>
								<small class="text-muted">
									{{$post->created_at}} - 
									{{$post->category->name}}
								</small>
							</div>
							<img height="120" src="{{asset($post->avatar)}}">
						</div>
					@endif
				@endforeach
			</div>
			<div class="col-md-4 ">
				<h5 class="font-weight-bold spanborder"><span>TIN TỨC</span></h5>
				@foreach ($posts as $post)
				@if ($post->category->name=='Tin tức')
				<div class="mb-3 d-flex align-items-center">
					<div class="pl-3">
						<h2 class="mb-2 h6 font-weight-bold">
							<a class="text-dark" href="./article.html">{{$post->title}}</a>
							</h2>
							<small class="text-muted">{{$post->created_at}}</small>			
					</div>
				</div>
				@endif		
				@endforeach		
			</div>
		</div>
	</div>
@endsection
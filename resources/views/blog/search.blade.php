@extends('blog.layouts.master')

@section('content')
<div class="space" style="margin-top: 100px"></div>
<div class="container">
	<div class="row justify-content-between">
		<div class="col-md-8">
			@foreach ($posts as $post)
			<div class="mb-3 d-flex justify-content-between">
				<div class="pr-3">
					<h2 class="mb-1 h4 font-weight-bold">
					<a class="text-dark" href="{{$post->getShowURL()}}">{{$post->title}}</a>
					</h2>
					<p>
						{!!$post->description()!!}...
					</p>
					<small class="text-muted">{{$post->updated_at}}</small>
				</div>
				<img height="120" src="{{asset($post->avatar)}}">
			</div>
			@endforeach
		</div>
	</div>
</div>
{{ $posts->links('pagination::bootstrap-4') }}
@endsection
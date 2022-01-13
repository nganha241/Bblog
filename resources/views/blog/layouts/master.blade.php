<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.ico">
<link rel="icon" type="image/png" href="./assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Mundana Template by WowThemesNet</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="{{asset('blog/assets/css/main.css')}}" rel="stylesheet"/>
<style>
	.search-container {
		float: right;
	}
	.search-container button {
		float: right;
		padding: 6px;
		margin-top: 8px;
		margin-right: 16px;
		background: #ddd;
		font-size: 17px;
		border: none;
		cursor: pointer;
	}
	.search-container button:hover {
  		background: #ccc;
	}
	input[type=text], .search-container button {
		margin: 1px;
		padding: 1px;
  }
	.search-container input[type=text] {
		border: 1px solid #ccc;  
	}
</style>
</head>
<body>

<nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
<div class="container">
	<a class="navbar-brand" href="{{route('home')}}"><strong>Beauty</strong></a>
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarColor02" style="">
		<ul class="navbar-nav mr-auto d-flex align-items-center">
			@foreach ($categories as $category)
			<li class="nav-item">
				<a class="nav-link" href="{{$category->getShowURL()}}">{{$category->name}}</a>
			</li>
			@endforeach
		</ul>
		<ul class="navbar-nav ml-auto d-flex align-items-center">
			<div class="search-container">
				<form action="{{route('search')}}" method="GET">
				  <input type="text" name="keyword" value="{{ request()->input('keyword') }}" placeholder="Search.." name="search">
				  <button type="submit"><i class="fas fa-search"></i></button>
				</form>
			  </div>
		</ul>
	</div>
</div>
</nav>

@yield('content')

<div class="container mt-5">
	<footer class="bg-white border-top p-3 text-muted small">
	<div class="row align-items-center justify-content-between">
		<div>
            <span class="navbar-brand mr-2"><strong>Beauty Blog</strong></span> Copyright &copy;
			<script>document.write(new Date().getFullYear())</script>
			 . All rights reserved.
		</div>
		{{-- <div>
			Made with <a target="_blank" class="text-secondary font-weight-bold" href="https://www.wowthemes.net/mundana-free-html-bootstrap-template/">Mundana Theme</a> by WowThemes.net.
		</div> --}}
	</div>
	</footer>
</div>

<script src="{{asset('blog/assets/js/vendor/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('blog/assets/js/vendor/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('blog/assets/js/vendor/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('blog/assets/js/functions.js')}}" type="text/javascript"></script>
</body>
</html>
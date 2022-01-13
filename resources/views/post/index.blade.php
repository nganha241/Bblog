@extends('layouts.admin')

@section('title')
   Bblog | Bài viết
@endsection

@section('page')
    Danh sách bài viết
@endsection

@section('content')
<a href="{{route('admin.posts.create')}}"><button class="btn btn-primary">Thêm</button></a>
<br> <br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Ảnh</th>
        <th >Tiêu đề</th>
        <th>Danh mục</th>
        <th>Tag</th>
        <th>Thời gian</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>          
              <img src="{{asset ($post->avatar)}}" height="30px" width="50px">
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->category->name}}</td>
            <td>
              @if ($post->tags->count())
                @foreach ($post->tags as $tag)
                  <p>{{ $tag->name }} - {{$tag->pivot->created_at}}</p>
                @endforeach
              @endif
            </td>
            <td>{{$post->created_at}}</td>
            <td>
                <a href="{{route('admin.posts.edit', ['id'=> $post->id])}}"><button class="btn btn-success">Sửa</button></a>
                <a href="{{route('admin.posts.delete', ['id'=> $post->id])}}"><button class="btn btn-danger">Xóa</button></a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{ $posts->links('pagination::bootstrap-4') }}
@endsection
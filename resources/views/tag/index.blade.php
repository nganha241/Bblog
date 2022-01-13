@extends('layouts.admin')

@section('title')
   Bblog | Bài viết
@endsection

@section('page')
    Danh sách bài viết
@endsection

@section('content')
<a href="{{route('admin.tags.create')}}"><button class="btn btn-primary">Thêm</button></a>
<br> <br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th>Tên</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
            <td>
                <a href="{{route('admin.tags.edit', ['id'=> $tag->id])}}"><button class="btn btn-success">Sửa</button></a>
                <a href="{{route('admin.tags.delete', ['id'=> $tag->id])}}"><button class="btn btn-danger">Xóa</button></a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{ $tags->links('pagination::bootstrap-4') }}
@endsection
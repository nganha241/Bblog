@extends('layouts.admin')

@section('title')
   Bblog | Danh mục bài viết
@endsection

@section('page')
    Danh mục bài viết
@endsection

@section('content')
<a href="{{route('admin.categories.create')}}"><button class="btn btn-primary">Thêm</button></a>
<br> <br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên danh mục</th>
        <th>Thời gian</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td>
                <a href="{{route('admin.categories.edit', ['id'=> $category->id])}}"><button class="btn btn-success">Sửa</button></a>
                <a href="{{route('admin.categories.delete', ['id'=> $category->id])}}"><button class="btn btn-danger">Xóa</button></a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{ $categories->links('pagination::bootstrap-4') }}
@endsection
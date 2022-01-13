@extends('layouts.admin')

@section('page')
    Sửa bài viết
@endsection

@section('title')
    Bblog | Sửa bài viết
@endsection

@section('content')
<form action="{{route('admin.tags.update', ['id'=>$tag->id])}}" method="post">
    @csrf
    <div class="form-group">
      <label>Tên tag</label>
      <input type="text" name="name" value="{{$tag->name}}" class="form-control" placeholder="Nhập tiêu đề bài viết">
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection
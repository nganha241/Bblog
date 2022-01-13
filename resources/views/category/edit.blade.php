@extends('layouts.admin')

@section('page')
    Sửa danh mục
@endsection

@section('title')
    Bblog | Thêm danh mục
@endsection

@section('content')
<form action="{{route('admin.categories.update', ['id'=>$category->id])}}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Tên danh mục</label>
      <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Nhập tên danh mục">
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection
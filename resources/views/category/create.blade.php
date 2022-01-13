@extends('layouts.admin')

@section('page')
    Thêm danh mục
@endsection

@section('title')
    Bblog | Thêm danh mục
@endsection

@section('content')
<form action="{{route('admin.categories.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Tên danh mục</label>
      <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection
@extends('layouts.admin')

@section('page')
    Thêm tag
@endsection

@section('title')
    Bblog | Thêm tag
@endsection

@section('content')
<form action="{{route('admin.tags.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label>Tên tag</label>
      <input type="text" name="name" class="form-control" placeholder="Nhập tiêu đề bài viết">
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection
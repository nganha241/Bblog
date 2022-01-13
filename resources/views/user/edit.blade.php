@extends('layouts.admin')

@section('page')
    Sửa bài viết
@endsection

@section('title')
    Bblog | Sửa bài viết
@endsection

@section('content')
<form action="{{route('admin.users.update', ['id'=>$user->id])}}" method="post">
  @csrf
  <div class="form-group">
    <label>Họ tên</label>
    <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Nhập tiêu họ tên">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Nhập Email">
  </div>
  <div class="form-group">
    <label>Mật khẩu</label>
    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
  </div>
  <div class="form-group">
    <label>Role</label>
    <select class="form-control" name="role" id="exampleFormControlSelect1">
      <option {{$user->role == 1 ? 'selected' : ' '}} value="1">Admin</option>
      <option {{$user->role == 2 ? 'selected' : ' '}} value="2">Content</option>
    </select>
  </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection
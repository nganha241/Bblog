@extends('layouts.admin')

@section('page')
    Thêm người dùng
@endsection

@section('title')
    Bblog | Thêm người dùng
@endsection

@section('content')
<form action="{{route('admin.users.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label>Họ tên</label>
      <input type="text" name="name" class="form-control" placeholder="Nhập tiêu họ tên">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" placeholder="Nhập Email">
    </div>
    <div class="form-group">
      <label>Mật khẩu</label>
      <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
    </div>
    <div class="form-group">
      <label>Role</label>
      <select class="form-control" name="role" id="exampleFormControlSelect1">
        {{-- <option value="">Role</option> --}}
        <option value="1">Admin</option>
        <option value="2">Content</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection
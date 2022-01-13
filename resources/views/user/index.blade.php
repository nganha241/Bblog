@extends('layouts.admin')

@section('title')
   Bblog | Người dùng
@endsection

@section('page')
    Danh sách người dùng
@endsection

@section('content')
<a href="{{route('admin.users.create')}}"><button class="btn btn-primary">Thêm</button></a>
<br> <br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Role</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><?php
                if ($user->role == 1) {
                  echo 'Admin';
                }
                if ($user->role == 2) {
                  echo 'Content';
                }
              ?></td>
            <td>
                <a href="{{route('admin.users.edit', ['id'=> $user->id])}}"><button class="btn btn-success">Sửa</button></a>
                <a href="{{route('admin.users.delete', ['id'=> $user->id])}}"><button class="btn btn-danger">Xóa</button></a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{ $users->links('pagination::bootstrap-4') }}
@endsection
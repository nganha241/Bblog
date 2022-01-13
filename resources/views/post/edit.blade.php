@extends('layouts.admin')

@section('page')
    Sửa bài viết
@endsection

@section('title')
    Bblog | Sửa bài viết
@endsection

@section('content')
<form action="{{route('admin.posts.update', ['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Tên danh mục</label>
      <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="Nhập tên danh mục">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nội dung bài viết</label>
        <textarea name="content" id="content">{{$post->content}}</textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Danh mục</label>
        <div>
          <select class="form-control" name="category_id" id="exampleFormControlSelect1">
            <option value="">Chọn danh mục bài viết</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Ảnh</label>
        <input type="file" name="avatar" value="{{$post->avatar}}" class="form-control" placeholder="Nhập tên danh mục">
        <br>
        <img src="{{ asset ($post->avatar)}}" width="20%">
      </div>
      <div class="form-group">
        <label for="">Tag</label>
          @php
            $tagId = $post->tags->pluck('id')->toArray();
          @endphp
          <select name="tags[]" class="form-control" required multiple>
            @foreach ($tags as $tag)
              <option {{in_array($tag->id, $tagId) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
          </select>
        </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection

@section('js')
  <script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
@endsection
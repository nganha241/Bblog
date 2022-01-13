@extends('layouts.admin')

@section('page')
    Thêm bài viết
@endsection

@section('title')
    Bblog | Thêm bài viết
@endsection

@section('content')
<form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Tiêu đề bài viết</label>
      <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề bài viết">
    </div>
    <div class="form-group">
        <label>Nội dung bài viết</label>
        <textarea name="content" id="content"></textarea>
      </div>
      <div class="form-group">
        <label>Danh mục</label>
        <div>
          <select class="form-control" name="category_id" id="exampleFormControlSelect1">
            <option value="">Chọn danh mục bài viết</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label>Ảnh</label>
        <input type="file" name="avatar" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Tag</label>
        <div>
            <select name="tags[]" class="form-control select2" required multiple>
              @foreach ($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
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
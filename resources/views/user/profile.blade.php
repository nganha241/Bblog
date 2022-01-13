@extends('layouts.admin');

@section('page')
    Profile
@endsection

@section('title')
    Bblog | My Profile
@endsection

@section('content')
<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }
    
    .title {
      color: grey;
    }
    
    button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
    }
    
    a {
      text-decoration: none;
      color: black;
    }
    
    </style>

    <div class="card">
    <img src="{{asset('adminLTE/dist/img/profile.png')}}" alt="{{Auth::user()->name}}" style="width:100%">
    <h1>{{Auth::user()->name}}</h1>
    <p class="title">
        <?php 
            if (Auth::user()->role==1) {
                echo 'Admin';
            } else {
                echo 'Content';
            }
                
        ?>
    </p>
    <p>{{Auth::user()->email}}</p>
    </div>
@endsection
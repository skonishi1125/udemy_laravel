@extends('layouts.base')
@section('title','入力確認')
@section('main')

<div class="container">
  <h4>入力内容の確認</h4>

  
  <form action="{{url('/hello/register')}}" method="POST" class="my-3">
    @csrf

    <p>お名前：{{$name}}</p>
    <input type="hidden" name="name" value="{{$name}}">
    <p>メールアドレス：{{$email}}</p>
    <input type="hidden" name="email" value="{{$email}}">
    <p>パスワード：{{$password}}</p> 
    <input type="hidden" name="password" value="{{$password}}">

    <a href="{{url('/hello/view')}}">前の画面に戻る</a>
    <button class="btn btn-sm btn-success" type="submit">登録する</button>
  </form>
  
</div>


@endsection
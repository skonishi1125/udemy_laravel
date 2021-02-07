@extends('layouts.base')
@section('title','入力確認')
@section('main')

<div class="container">
  <h4>入力内容の確認</h4>
  <p>お名前：{{$name}}</p>
  {{-- 
  <p>メールアドレス：{{$email}}</p>
  <p>パスワード：{{$password}}</p> 
  --}}
</div>

<a href="{{url('/hello/view')}}">前のフォームに戻る</a>

@endsection
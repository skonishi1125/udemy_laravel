@extends('layouts.base')
@section('title','メインページ')
@section('main')

<section class="container my-3">
  <div class="row">
    <div class="col-md-12">
      <p>ID:{{$loginUser->id}} {{$loginUser->name}}さん、こんにちは！</p>
      <p>書き込んでみましょう</p>
    </div>
    <p>セッション情報：ログインユーザのemail: {{ session('email') }}</p>
    <p>セッション情報：ログインユーザのpw: {{ session('password') }}</p>
  </div>

  <form action="createMessage" method="POST">
    <div class="form-row">
      @csrf

      <div class="form-group col-md-12">
        <textarea class="form-control" name="message" rows="3" value="{{ old('message') }}"></textarea>
      </div>

      <input type="hidden" name="member_id" value="{{$loginUser->id}}">
      <input type="hidden" name="reply_post_id" value="0">
      
      <div class="col-md-12">
        <button type="submit" class="btn btn-sm btn-primary float-right">投稿する</button>
      </div>
  </form>

  <div class="row content-wrapper my-2">
    <div class="col-sm-3">
      <img src="{{ asset('images/'.$loginUser->picture) }}" alt="icon" class="img-thumbnail userIcon">
    </div>
    <div class="offset-sm-1 col-sm-8">
      <p>こんにちは！こんにちは！こんにちは！こんにちは！こんにちは！<span>(Kirbis)</span></p>
      <p class="day">2021/02/12 11:00</p>
    </div>
  </div>

  <div class="row content-wrapper">
    <div class="col-sm-3">
      <img src="{{ asset('images/'.$loginUser->picture) }}" alt="icon" class="img-thumbnail userIcon">
    </div>
    <div class="offset-sm-1 col-sm-8">
      <p>こんにちは！こんにちは！こんにちは！こんにちは！こんにちは！<span>(Kirbis)</span></p>
      <p class="day">2021/02/12 11:00</p>
    </div>
  </div>

</section>
    
@endsection
@extends('layouts.base')
@section('title','ログイン')
@section('main')

  <section class="container my-3 border">
    <div class="row">
      <div class="col-md-12">
        <h5>ログイン画面</h5>
        <a href="{{ url('/hello/view') }}">登録がまだの方はこちら</a>
      </div>
    </div>

    <form method="POST" action="/main/thread" class="my-3 pb-4">
      @csrf

      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="inputEmail">メールアドレス</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="メールアドレスを入力" value="{{old('email','')}}">
        </div>
  
        <div class="form-group col-md-4">
          <label for="inputPassword">パスワード</label>
          <input type="password" class="form-control" id="inputPassword" name="password" placeholder="パスワードを入力">
        </div>
      </div>

      <button type="submit" class="btn btn-sm btn-primary float-right">ログイン</button>

    </form>

    @if (Session::has('e_msg'))
      <p style="color: red">{{session('e_msg')}}</p> 
    @endif






  </section>
@endsection
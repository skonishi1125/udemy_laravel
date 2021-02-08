@extends('layouts.base')
@section('title','topページ')
@section('main')
{{-- 
  <section class="container my-3">
    <div class="row">
      <div class="col-md-6">
        <button class="btn btn-primary testbtn">
          {{ $msg }}
        </button>
      </div>

      <div class="col-md-6">
        <p>ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</p>
      </div>
    </div>

    <div class="row">
      <div col="col-md-12">
        <a href="{{url('/hello/view')}}">トップに戻る</a>
        <p>
          numberは、{{$number}}です。stringは、{{$string}}です。
        </p>
      </div>
    </div>
  </section>

   --}}

  <section class="container my-3 border">
    <div class="row">
      <div class="col-md-12 my-2">
        <h4><b>登録しよう</b></h4>
      </div>
    </div>

    <form method="POST" action="/hello/check" class="my-3 pb-4">
      @csrf

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputName">なまえ</label>
          <input type="text" class="form-control" id="inputName" name="name" placeholder="タロー">
        </div>
  
        <div class="form-group col-md-4">
          <label for="inputEmail">メールアドレス</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="taro@gmail.com">
        </div>
  
        <div class="form-group col-md-4">
          <label for="inputPassword">パスワード</label>
          <input type="password" class="form-control" id="inputPassword" name="password" placeholder="パスワードを入力">
        </div>
      </div>

      <button type="submit" class="btn btn-sm btn-success float-right">登録</button>

    </form>

  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h5>現在登録中のユーザ</h5>

        <table class="table">
          <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th>picture</th>
            <th>created</th>
            <th>modified</th>
          </tr>
          @foreach($members as $member)
            <tr>
              <td>{{ $member->id }}</td>
              <td>{{ $member->name }}</td>
              <td>{{ $member->email }}</td>
              <td>
                @php
                  echo mb_substr($member->password,0,10). '...';
                @endphp
              </td>
              <td>{{ $member->picture }}</td>
              <td>{{ $member->created }}</td>
              <td>{{ $member->modified }}</td>
            </tr>
          @endforeach

        </table>

      </div>
    </div>
  </section>

@endsection

{{-- 

  【inputの値を受け取る】
  ・name=""で、コントローラの方で扱うタグをつける
  ・コントローラでRequest $reqとすると、フォームの値が$reqに入る
    （input name="color"としたら、$req->colorで取り出せる）
  ・return view('遷移したいページ',変数);でOK

--}}


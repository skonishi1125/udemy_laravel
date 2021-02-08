@extends('layouts.base')
@section('title','登録完了')
@section('main')


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p>DBへの登録が完了しました。</p>
      <a href="{{url('/hello/view')}}">トップへ戻る</a>
    </div>
  </div>
</div>

<p>
  {{$email}}
</p>
@endsection
@extends('layouts.base')
@section('title','メインページ')
@section('main')

<section class="container my-3">
  <div class="row">
    <div class="col-md-12">
      
      
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      
      {{-- <p>ようこそ、{{$data->name}}さん！</p> --}}
      @foreach ($test as $t)
        <p>ようこそ、{{$t->id}}さん！</p>
      @endforeach
    
      <p>{{$test2->id}}</p>
    
      <p>{{$result->name}}</p>
    </div>
  </div>
</section>
    
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test;

class TestController extends Controller
{
    //
    public function index() 
    {
      $values = Test::all();
      // 処理を止めて、変数の中身を表示してくれる die() + var_dump()の役割
      // dd($values);

      return view('tests.test', compact('values'));
    }


}

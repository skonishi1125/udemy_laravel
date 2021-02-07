<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index() {
      return 'DockerでLaravel環境ができた！';
    }

    public function view() {
      $data = [
        'msg' => 'こんにちは、世界!',
        'number' => 100,
        'string' => 'うおお！',
      ];
      // hello/view.blade.phpを探しにいく
      return view('hello.view',$data);
    }

    // Requestクラスができていて、その中にform内容が入っている
    public function check(Request $req) {
      $userData = [
        'name' => $req->name,
        // 'email' => $req->inputEmail,
        // 'password' => $req->inputPassword,
      ];

      return view('hello/check',$userData);

    }


}

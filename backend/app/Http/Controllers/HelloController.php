<?php

namespace App\Http\Controllers;

use App\Member;
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
        'members' => Member::all(),
      ];
      // hello/view.blade.phpを探しにいく
      return view('hello.view',$data);
    }

    // Requestクラスができていて、その中にform内容が入っている
    public function check(Request $req) {
      $userData = [
        'name' => $req->name,
        'email' => $req->email,
        'password' => hash("sha256",$req->password),
      ];

      return view('hello/check',$userData);

    }

    public function register(Request $req) {
      $userData = [
        'name' => $req->name,
        'email' => $req->email,
        // ハッシュ関数を取る
        'password' => $req->password,
      ];

      return view('hello/register',$userData);

    }


}

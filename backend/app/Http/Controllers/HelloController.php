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
      // 任意の列でデータ検索する first(最初の1行だけ)
      // 複数の条件で指定する場合は、getを使う 速習Laravelブクマ済
      $php = Member::where('email','php@gmail.com')->first();

      $data = [
        'msg' => 'こんにちは、世界!',
        'number' => 100,
        'string' => 'うおお！',
        'members' => Member::all(),
        // 主キーで検索する find()
        'myadmin_email' => Member::find(1)->email,
        'php' => $php,
      ];
      // hello/view.blade.phpを探しにいく
      return view('hello.view',$data);
    }

    // Requestクラスができていて、その中にform内容が入っている
    public function check(Request $req) {

      if (!$req->hasfile('picture')) {
        return 'ファイルを指定してください';
      }

      $file = $req->picture;
      $picName = $file->getClientOriginalName();
      $userData = [
        'name' => $req->name,
        'email' => $req->email,
        'password' => hash("sha256",$req->password),
        'picture' => $picName,
      ];

      // storage.app.filesに保存される
      // $file->storeAs('files',$picName);
      
      // storage/appから、勝手に /public/images/画像が生成される
      // $file->storeAs('./public/images',$picName);

      // 正しくpublic.imagesに保存されている
      $file->storeAs('images',$picName,'public_uploads');
      
      return view('hello/check',$userData);
      
    }
    
    public function register(Request $req) {
      $m = new Member();
      // csrfのトークンで送られているinputは除去する
      $m -> fill( $req->except('_token') )->save();
      return view('hello/register');
    }

    public function login() {
      return view('hello/login');
    }


}

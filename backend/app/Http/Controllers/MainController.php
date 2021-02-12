<?php

namespace App\Http\Controllers;

// DB::tableを使うための記述
use App\Member;
use App\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function thread(Request $req) {
      // DBのデータを全て取得 3.3.4
      // $members_data = Member::all();

      // うまく取得できていない
      // formの値がないとき（loginから来ていないとき)、sessionの値で対応したい
      // 下のコードはダメみたい

      // emailとPWのフォームが埋まっている場合
      if ($req->has('email') && $req->has('password')) {
        $email = $req->email;
        $password = hash('sha256',$req->password);
        // ログインした情報をセッションに保存する
        $req->session()->put('email', $email);
        $req->session()->put('password',$password);
      } else {
        // それ以外のページから飛んできた場合
        $email = $req->session()->get('email');
        $password = $req->session()->get('password');
      }

      // $result = Member::where('email',$email)->where('password',$password);
      // ↑ダメ first(1つの値を返す命令)を書かないとうまく表示されない
      // 書かないと複数帰ってくる可能性があるから、そのまま変数に入れられない？
      $result = Member::where('email',$email)->first();
      $test = Member::all(); 

      // ログインしたメンバーの値取得
      $test2 = DB::table('members')->where('email',$email)->first();
      $loginUser = Member::where('email',$email)->where('password',$password)->first();

      if (!isset($loginUser)) {
        // return redirect('hello/login')->with('status', 'Profile updated!');
        // withInput():oldヘルパを使うために必要。フラッシュとして前の値を保存する
        return redirect('hello/login')->withInput()->with('e_msg','ログインに失敗しました。');
      }

      $data = [
        'result' => $result,
        'test' => $test,
        'test2' => $test2,
        'loginUser' => $loginUser,
      ];

      return view('main/thread',$data);
    }

    public function createMessage(Request $req) {
      $p = new Post();
      // $reqで送られてきた値を変数に格納、DBに登録
      $p->fill($req->except('_token'))->save();
      return view('main/createMessage');
    }

}

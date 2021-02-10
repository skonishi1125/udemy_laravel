<?php

namespace App\Http\Controllers;

use App\Member;
// DB::tableを使うための記述
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function thread(Request $req) {
      // DBのデータを全て取得 3.3.4
      // $members_data = Member::all();

      // emailがある && sha256(password)がある場合、indexに飛ばす
      $email = $req->email;
      $password = hash('sha256',$req->password);

      // $result = Member::where('email',$email)->where('password',$password);

      // first(1つの値を返す命令)を書かないとうまく表示されない
      // 書かないと複数帰ってくる可能性があるから、そのまま変数に入れられない？
      $result = Member::where('email',$email)->first();
      $test = Member::all();
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
      ];

      return view('main/thread',$data);

    }
}

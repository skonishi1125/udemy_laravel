<?php

namespace App\Http\Controllers;

use App\Member;
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


      // 取得できていないのでどうにかしよう




      $result = Member::where('email',$email);

      if (!isset($result)) {
        return view('main/thread','会員情報がありませんでした。');
      }

      $data = [
        'login_member' => $result,
      ];

      return view('main/thread',$data);

    }
}

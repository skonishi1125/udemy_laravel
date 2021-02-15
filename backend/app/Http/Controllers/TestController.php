<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index() 
    {
      $values = Test::all();

      $collection = collect([1, 2, 3, 4, 5, 6, 7]);
      // コレクションの値を4つずつに区切る
      $chunks = $collection->chunk(4);
      $chunks->toArray();

      // first
      $fi = $collection->first();

      // DBファサード
      $tests = DB::table('tests')->get();
      $tests_id = DB::table('tests')
      ->select('id')
      ->get();

      dd($tests_id,$tests,$fi,$chunks,$values);

      return view('tests.test', compact('values'));
    }


}

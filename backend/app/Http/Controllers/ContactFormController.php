<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactForm;
// クエリビルダの使用
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // エロクワント ORマッパー
        // $contacts = ContactForm::all();
        
        // クエリビルダで取得
        $contacts = DB::table('contact_forms')
        ->select('id','your_name','title','created_at')
        ->orderBy('created_at','desc')
        ->get();
        
        // dd($contacts);

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DBインスタンス化
        $contact = new ContactForm;

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();

        // dd($your_name,$title);

        return redirect('contact/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $contact = ContactForm::find($id);

      // gender,ageが数字で格納されているので加工
      if ($contact->gender === 0)
      {
        $gender = '男性';
      }
      if ($contact->gender === 1)
      {
        $gender = '女性';
      }

      if ($contact->age == 1)
      {
        $age = '~19歳';
      }
      if ($contact->age == 2)
      {
        $age = '20~29歳';
      }
      if ($contact->age == 3)
      {
        $age = '30~39歳';
      }
      if ($contact->age == 4)
      {
        $age = '40~49歳';
      }
      if ($contact->age == 5)
      {
        $age = '50~59歳';
      }
      if ($contact->age == 6)
      {
        $age = '60歳~';
      }
      
        return view('contact.show',
        compact('contact','gender','age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 主キーから、指定の値を検索
        $contact = ContactForm::find($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $idの値を持ってくる
        $contact = ContactForm::find($id);

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect('contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contact = ContactForm::find($id);
      // これで消えてしまう
      $contact->delete();

      return redirect('contact/index');

    }
}

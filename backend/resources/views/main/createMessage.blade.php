<p>投稿しました。</p>
<a href="{{ url('main/thread') }}">戻る</a>
<a href="{{ url('hello/view') }}">hello.viewへ</a>

{{-- 
  main/threadに戻るときにログイン情報がないからエラーになるのだ
  sessionに保存しよう
  cookieは自動ログイン
  --}}
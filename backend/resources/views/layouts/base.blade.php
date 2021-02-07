<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <title>かあスレ for Laravel - @yield('title')</title>
</head>
<body>

  <header class="container-fluid">
    <h3>かあスレ for Laravel</h3>
  </header>

  @section('main')
    <p>テンプレートファイル(resources/views/layouts/base.blade.php)に記載されている文です</p>
  @show
  


  <footer class="container-fluid">
    <p>2021 ©︎skonishi presents.</p>
  </footer>


  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
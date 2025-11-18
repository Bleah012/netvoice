<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Netvoice Systems')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
  @include('partials.navbar')
  <main>@yield('content')</main>
  @include('partials.footer')
</body>
</html>

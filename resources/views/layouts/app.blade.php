<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Dynamic Page Title --}}
  <title>@yield('title', 'Netvoice Systems')</title>

  {{-- SEO & Branding --}}
  <meta name="description" content="Netvoice Systems - Reliable ICT & Solar Solutions for Kenyan Enterprises. Structured cabling, surveillance, solar, and more.">
  <meta name="author" content="Netvoice Systems">
  <meta name="robots" content="index, follow">

  {{-- Open Graph (Social Sharing) --}}
  <meta property="og:title" content="@yield('title', 'Netvoice Systems')">
  <meta property="og:description" content="Reliable ICT & Solar Solutions for Kenyan Enterprises.">
  <meta property="og:image" content="{{ asset('images/clients/server3.jpeg') }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">

  {{-- Favicon --}}
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

  {{-- Vite Assets --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Lucide Icons --}}
  <script src="https://unpkg.com/lucide@latest"></script>

  {{-- AOS (Animate On Scroll) --}}
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

  {{-- Navbar --}}
  @include('partials.navbar')

  {{-- Main Content --}}
  <main class="grow">
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('partials.footer')

  {{-- Lucide Init --}}
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      lucide.createIcons();
    });
  </script>

  {{-- AOS Init --}}
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 800,
      easing: 'ease-in-out',
    });
  </script>
</body>
</html>

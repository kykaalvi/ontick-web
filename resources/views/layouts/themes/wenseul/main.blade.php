<!--
=========================================================
* BLK Design System- v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/blk-design-system
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.themes.wenseul.head')
    @stack('css')
</head>
<body @stack('bodyclass')>
    <header class="header-global">
        @include('layouts.themes.wenseul.header')
    </header>
    <div class="wrapper">
        @yield('content')
        <footer class="mt-5 footer">
 @include('layouts.themes.wenseul.footer')
</footer>
</div>
<div id="response-api"></div>
@include('layouts.themes.wenseul.js')
@stack('scripts')
</body>
</html>

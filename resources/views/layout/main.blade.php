@include('layout.header')
@if (session('email') && session('uid'))
@include('layout.top-nav')
@endif
@yield('main-section')
@include('layout.footer')
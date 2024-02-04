@include('includes.website.header-links')
@include('includes.website.navbar')
@if(!isset($heading))
@include('includes.website.heading')
@endif
@if(!isset($homeHeading))
@include('includes.website.home-heading')
@endif

@yield('content')

@include('includes.website.footer')
@include('includes.website.footer-links')

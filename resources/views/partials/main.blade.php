@include('partials.header')
@include('partials.nav')
@include('partials.left_side')

@yield('content')
@include('partials.session')
@include('partials.custom_menu')


@include('partials.footer')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=8,IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="referrer" content="strict-origin" />
    @yield('meta-generator')
    <link rel="icon" href="{{ URL::asset('images/icon.png') }}" type="image/x-icon"/>
    @yield('includes')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
</head>
<body id="app">
	<x-navigation-bar /> {{-- navbar component --}}
    @yield('sidebar')
    @yield('content')
    <x-footer /> {{-- footer component --}}
    @auth
    <input type="hidden" id="id" value="{{auth::user()->id}}">
    @endauth
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
$(document).scroll(function(){
    if($('.navbar').offset().top > 20){
        $('.navbar').attr('style','box-shadow: 0px 0px 10px -2px #4789C6');
    }
    else{
        $('.navbar').attr('style','box-shadow:none !important');
    } 
});

</script>
    @yield('script') {{-- For Pages That Need AJAX Or Additional Scripts --}}
</body>
</html>

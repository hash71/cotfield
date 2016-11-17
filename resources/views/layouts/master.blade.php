<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Cotfield')</title>

    <link href="{{asset(elixir('css/vendor.css'))}}" rel="stylesheet">
    <link href="{{asset(elixir('css/inspinia.css'))}}" rel="stylesheet">

    @stack('styles')

</head>

<body class="md-skin">
<div id="wrapper">
    @include('layouts.navigation')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.topnavbar')
        @yield('content')
        @include('layouts.footer')
    </div>
</div>


<script src="{{asset(elixir('js/vendor.js'))}}"></script>
<script src="{{asset(elixir('js/inspinia.js'))}}"></script>

@stack('scripts')


</body>

</html>

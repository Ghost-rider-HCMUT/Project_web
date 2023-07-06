<!DOCTYPE html>
<html lang="en">
<head>
   @include('head')
</head>
<body >
{{--class="animsition"--}}
{{--header--}}
@include('header')
{{--cart--}}
@include('cart')
<!-- Slider -->
@yield('content')

@include('footer')


</body>
</html>

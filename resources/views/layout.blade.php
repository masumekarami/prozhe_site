<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('../../../css/bootstrap.css') }}">
    @yield('css')
    <script src="{{ url('../../../js/JQ/jquery.min.js') }}"></script>
    @yield('js')

    <title>laravel</title>
</head>
<body>

 @yield('content')

</body>
<script src="{{url('../../../js/bootstrap.js')}}"></script>

{{--<script src=" {{ URL::to('../../../../node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>--}}

<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
</html>
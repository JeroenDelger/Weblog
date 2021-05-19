<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/weblog.css" type="text/css" rel="stylesheet">
    <script src="{{ asset('/../../js/app.js') }}" defer></script>

    <title>Weblog</title>

</head>

<body>
    <div id='app'>
        @yield('content')
        @include('footer')
    </div>
</body>

</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hire My Camper Trailer - Admin</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="/js/jquery-ui/jquery-ui.css" rel="stylesheet">
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/jquery-ui/jquery-ui.js"></script>
    <script src="/js/multidates.js"></script>
    <script src="/js/moment.js"></script>
    <script src="/js/functions.js"></script>
</head>
<body>

    <div class="container">
        @if($errors->has())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div><!-- end errors -->
        @endif

        @yield('content')
    </div><!-- end container -->

</body>
</html>

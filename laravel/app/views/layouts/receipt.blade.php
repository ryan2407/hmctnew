<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt for {{ $booking->user->first_name }} {{ $booking->user->last_name }}</title>
    <link rel="stylesheet" href="/css/receipt.css">
</head>
<body>
    @yield('content')
</body>
</html>

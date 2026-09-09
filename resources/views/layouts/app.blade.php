<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Knowledge Hub Mini</title>
</head>
<body>
    <h1>Knowledge Hub Mini</h1>
    <hr>

    @if (session('success'))
        <p style="color: green;"><b>{{ session('success') }}</b></p>
    @endif

    @yield('content')
</body>
</html>
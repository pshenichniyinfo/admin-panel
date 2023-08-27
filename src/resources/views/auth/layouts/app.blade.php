<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.87.0">
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <title>Admin Panel</title>
</head>
<body class="hold-transition login-page">
@auth
    {{--    {{auth()->user()->name}}--}}
    {{--    <div class="text-end">--}}
    {{--        <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>--}}
    {{--        <a href="{{ route('account.profile.index') }}" class="btn btn-outline-light me-2">Profile</a>--}}
    {{--        <a href="{{ route('tournament.index') }}" class="btn btn-outline-light me-2">Tournament</a>--}}
    {{--    </div>--}}
@endauth

@yield('content')
</body>
</html>

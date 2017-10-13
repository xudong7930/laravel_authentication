<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>laravel authentication</title>
    <link rel="stylesheet" href="https://ehd4.f3322.net/youtube/bootstrap337/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @if (Session::get('flash_message'))
        <div class="alert alert-info" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            {{ Session::get('flash_message') }}
        </div>
        @endif
        @yield('content')
    </div>
</body>
</html>

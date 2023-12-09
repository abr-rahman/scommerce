<!DOCTYPE html>
<html lang="en" data-arp-injected="true">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('pageTitle', config('app.name'))</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/'. $siteSettings->first()->logo) ?? $siteSettings->first()->logo  }}">

        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

        <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

        <link rel="stylesheet" href="asset/dist/css/adminlte.min.css?v=3.2.0">
    </head>

    <body class="register-page" style="min-height: 570.781px;">
        <div class="register-box">
            <div class="register-logo">
                <a href="asset/index2.html"><b>{{ config('app.name') }}</a>
            </div>
            <div class="card">
                {{ $slot }}
            </div>
        </div>

        <script src="asset/plugins/jquery/jquery.min.js"></script>

        <script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="asset/dist/js/adminlte.min.js?v=3.2.0"></script>


    </body>

</html>



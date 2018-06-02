<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>Football Pool</title>
</head>
<body>

<div class="container">

    <div class="text-center">
            <div class="p-1">
                <img src="/img/team_logos.png">
            </div>
            <h4 class="p-1 text-primary font-weight-bold">Thomas Fitzgerald Sr. Memorial Football Pool</h4>
    </div>

    <hr>

    @yield('content')

</div>

<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
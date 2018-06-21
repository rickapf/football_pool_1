<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Football Pool</title>
</head>
<body>

<div class="container">

    <div class="text-center">
        <div class="p-1">
            <img src="/img/team_logos.png">
        </div>
        <h4 class="p-1 text-primary font-weight-bold">Thomas Fitzgerald Sr. Memorial Football Pool</h4>
        @if (Auth::user())
            <div class="text-center" role="groupx">
                <button type="button" class="btn btn-sm btn-outline-primary">HOME</button>
                <button type="button" class="btn btn-sm btn-outline-primary">RULES/INFO</button>
                <button type="button" class="btn btn-sm btn-outline-primary">PICKS</button>
                <button type="button" class="btn btn-sm btn-outline-primary">STANDINGS</button>
                <button type="button" class="btn btn-sm btn-outline-primary">FEEDBACK</button>
                <button type="button" class="btn btn-sm btn-outline-primary">ADMIN</button>
                <button type="button" class="btn btn-sm btn-outline-primary">LOGOUT</button>
            </div>
        @endif
    </div>

    <hr>


    @yield('content')

</div>

<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
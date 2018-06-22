<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
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
            <div class="text-center">
                <a class="btn btn-sm btn-outline-primary mr-1" role="button" href="{{route('home')}}"><i class="fas fa-home"></i> HOME</a>
                <a class="btn btn-sm btn-outline-primary mr-1" role="button" href=""><i class="fas fa-info-circle"></i> RULES/INFO</a>
                <a class="btn btn-sm btn-outline-primary mr-1" role="button" href=""><i class="fas fa-pencil-alt"></i> PICKS</a>
                <a class="btn btn-sm btn-outline-primary mr-1" role="button" href=""><i class="fas fa-list-ol"></i> STANDINGS</a>
                <a class="btn btn-sm btn-outline-primary mr-1" role="button" href=""><i class="fas fa-comment"></i> FEEDBACK</a>
                <a class="btn btn-sm btn-outline-primary mr-1" role="button" href=""><i class="fas fa-wrench"></i> ADMIN</a>
                <a class="btn btn-sm btn-outline-primary text-danger" role="button" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
            </div>
        @endif
    </div>

    <hr class="mt-0 mb-2">

    @yield('content')

</div>

<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
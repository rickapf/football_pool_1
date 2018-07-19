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
    </div>

    @if (Auth::user())
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="{{setActiveNavTab('home')}}" href={{route('home')}}><i class="fas fa-home"></i> HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{setActiveNavTab('rules')}}" href="{{route('rules')}}"><i class="fas fa-info-circle"></i> RULES/INFO</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{setActiveNavTab('picks')}}" href="{{route('make_picks')}}"><i class="fas fa-pencil-alt"></i> PICKS</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{setActiveNavTab('standings')}}" href="{{route('standings')}}"><i class="fas fa-list-ol"></i> STANDINGS</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{setActiveNavTab('feedback')}}" href="{{route('feedback')}}"><i class="fas fa-comment"></i> FEEDBACK</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{setActiveNavTab('admin')}}" href="{{route('admin')}}"><i class="fas fa-wrench"></i> ADMIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    @else
        @yield('content')
    @endif

</div>

<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
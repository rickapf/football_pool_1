@extends('layouts.app')

@section('content')

    @if (\App\Models\Setting::first()->current_week == 0)

        @include('picks.coming_soon')

    @else

        <div class="row">
            <div class="col-md-8 ml-md-auto mr-md-auto">

                @if (session('picks_made'))

                    @include('picks.made')

                @else

                    <!-- PICK ALL OR THURSDAY -->
                    <div class="text-center pb-2">
                        <a href="{{route('make_picks')}}" class="btn btn-sm btn-outline-primary {{setActivePicksButton()}}">pick all games</a>
                        <a href="{{route('make_picks')}}?make=thursday" class="btn btn-sm btn-outline-primary {{setActivePicksButton('thursday')}}">pick thursday games</a>
                    </div>

                    @include('picks.form')

                    @include('picks.js')

                @endif

            </div>
        </div>

    @endif

@endsection
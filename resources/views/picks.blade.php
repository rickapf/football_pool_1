@extends('layouts.app')

@section('content')

    @if (\App\Models\Setting::first()->current_week == 0)

        <div class="card border-0">
            <div class="card-header text-center bg-white border-0">
                <h5>The pick sheet for week 1 will be available approximately 1 week before the season starts.</h5>
            </div>
        </div>

    @else

        <div class="row">
            <div class="col-md-8 ml-md-auto mr-md-auto">

                @if (session('fname'))

                    <!-- PICKS MADE -->
                    <div class="card">
                        <div class="card-header bg-success text-center text-white">
                            <h4>Thank you {{session('fname')}}. Your picks have been submitted.</h4>
                        </div>
                    </div>

                @else

                    <form method="post" action="{{route('save_picks')}}">
                    @csrf
                    @foreach($games as $game)
                        <input type="hidden" name="game_{{$game->number}}_available" value="true">
                    @endforeach

                    @include('partials.errors')

                    <table class="table table-sm table-bordered">

                    @foreach($games as $game)

                        @php
                        if (!isset($prevGameDay) || $prevGameDay != $game->when->format('l')) {
                            $showHeader = true;
                            $prevGameDay = $game->when->format('l');
                        } else {
                            $showHeader = false;
                        }
                        @endphp

                        <!-- HEADER ROWS -->
                        @if($showHeader)
                        <tr>
                            <th class="border bg-primary text-center text-white" colspan="4">
                                {{$game->when->format('l, F j')}}
                            </th>
                        </tr>
                        <tr class="text-center bg-light">
                            <th>time</th>
                            <th>home team</th>
                            <th>away team</th>
                            <th>best bet</th>
                        </tr>
                        @endif

                        <!-- GAME ROW -->
                        <tr>
                            <td class="align-middle text-center">
                                {{$game->when->format('g:i A \E\T')}}
                            </td>
                            <td class="align-middle">
                                <input type="radio" name="game_{{$game->number}}" value="{{$game->home_team}}" @if(old("game_{$game->number}") == $game->home_team) checked @endif>
                                <img src="/img/logos/{{$game->homeTeam->abbreviation}}.gif" width="30" height="30">
                                {{$game->homeTeam->city.' '.$game->homeTeam->name}}
                                ({{$game->homeTeam->wins.'-'.$game->homeTeam->losses.'-'.$game->homeTeam->ties}})
                                <span class="float-right font-weight-bold">{{$game->home_spread}}</span>
                            </td>
                            <td class="align-middle">
                                <input type="radio" name="game_{{$game->number}}" value="{{$game->away_team}}" @if(old("game_{$game->number}") == $game->away_team) checked @endif>
                                <img src="/img/logos/{{$game->awayTeam->abbreviation}}.gif" width="30" height="30">
                                {{$game->awayTeam->city.' '.$game->awayTeam->name}}
                                ({{$game->awayTeam->wins.'-'.$game->awayTeam->losses.'-'.$game->awayTeam->ties}})
                                <span class="float-right font-weight-bold">{{$game->away_spread}}</span>
                            </td>
                            <td class="align-middle text-center">
                                {{$game->number}}
                            </td>
                        </tr>

                    @endforeach

                    </table>

                    <!-- SUBMIT BUTTON -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                @endif

            </div>
        </div>

    @endif

@endsection
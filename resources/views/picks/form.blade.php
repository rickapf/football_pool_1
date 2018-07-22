<form method="post" action="{{route('save_picks')}}">
@csrf
@foreach($flags as $key => $value)
    <input type="hidden" name="{{$key}}" value="{{$value}}">
@endforeach
@foreach($games as $game)
    <input type="hidden" name="game_{{$game->number}}_available" value="true">
@endforeach

    @include('partials.errors')

    <table class="table table-sm mb-0">

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
                <td class="align-middle text-center border-left">
                    {{$game->when->format('g:i A \E\T')}}
                </td>
                <td id="home_{{$game->number}}" class="align-middle border-left @if(old("game_{$game->number}") == $game->home_team || $game->picked == $game->home_team) bg-success text-white @endif">
                    <input type="radio" name="game_{{$game->number}}" value="{{$game->home_team}}" onclick="HighlightPick('home', '{{$game->number}}')" @if(old("game_{$game->number}") == $game->home_team || $game->picked == $game->home_team) checked @endif>
                    <img src="/img/logos/{{$game->homeTeam->abbreviation}}.gif" width="30" height="30">
                    {{$game->homeTeam->city.' '.$game->homeTeam->name}}
                    ({{$game->homeTeam->wins.'-'.$game->homeTeam->losses.'-'.$game->homeTeam->ties}})
                    <span class="float-right font-weight-bold">{{$game->home_spread}}</span>
                </td>
                <td id="away_{{$game->number}}" class="align-middle border-left @if(old("game_{$game->number}") == $game->away_team || $game->picked == $game->away_team) bg-success text-white @endif">
                    <input type="radio" name="game_{{$game->number}}" value="{{$game->away_team}}" onclick="HighlightPick('away', '{{$game->number}}')" @if(old("game_{$game->number}") == $game->away_team || $game->picked == $game->away_team) checked @endif>
                    <img src="/img/logos/{{$game->awayTeam->abbreviation}}.gif" width="30" height="30">
                    {{$game->awayTeam->city.' '.$game->awayTeam->name}}
                    ({{$game->awayTeam->wins.'-'.$game->awayTeam->losses.'-'.$game->awayTeam->ties}})
                    <span class="float-right font-weight-bold">{{$game->away_spread}}</span>
                </td>
                <td class="align-middle text-center border-left border-right">

                </td>
            </tr>

            <!-- TIEBREAKER POINTS ROW -->
            @if ($loop->last && $flags['picks_made'] == 'all')
                <tr>
                    <td class="border-left border-bottom border-top-0">&nbsp;</td>
                    <td colspan="2" class="text-center border-left border-top-0 border-bottom">
                        tiebreaker points: <input type="text" name="tiebreaker_points" size="3" maxlength="3" value="@if(old('tiebreaker_points')) {{old('tiebreaker_points')}} @else {{$tiebreaker_points}} @endif">
                    </td>
                    <td class="border-left border-bottom border-right border-top-0">&nbsp;</td>
                </tr>
            @endif

        @endforeach

    </table>

    <!-- SUBMIT BUTTON --> 
    <div class="text-center"> 
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
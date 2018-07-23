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
            $vars = getPickFormVars($game, $vars['prev_game_day'] ?? null, $tiebreaker_points);
            @endphp

            <!-- HEADER ROWS -->
            @if($vars['show_header'])
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
                <td id="home_{{$game->number}}" class="align-middle border-left {{$vars['home_class']}}">
                    <input type="radio" name="game_{{$game->number}}" value="{{$game->home_team}}" onclick="HighlightPick('home', '{{$game->number}}')" {{$vars['home_checked']}}>
                    <img src="/img/logos/{{$game->homeTeam->abbreviation}}.gif" width="30" height="30"> {{$vars['home_team_name']}} {{$vars['home_team_record']}}
                    <span class="float-right font-weight-bold">{{$game->home_spread}}</span>
                </td>
                <td id="away_{{$game->number}}" class="align-middle border-left {{$vars['away_class']}}">
                    <input type="radio" name="game_{{$game->number}}" value="{{$game->away_team}}" onclick="HighlightPick('away', '{{$game->number}}')" {{$vars['away_checked']}}>
                    <img src="/img/logos/{{$game->awayTeam->abbreviation}}.gif" width="30" height="30"> {{$vars['away_team_name']}} {{$vars['away_team_record']}}
                    <span class="float-right font-weight-bold">{{$game->away_spread}}</span>
                </td>
                <td class="align-middle text-center border-left border-right">
                    bb
                </td>
            </tr>

            <!-- TIEBREAKER POINTS ROW -->
            @if ($loop->last && $flags['picks_made'] == 'all')
                <tr>
                    <td class="border-left border-bottom border-top-0">&nbsp;</td>
                    <td colspan="2" class="text-center border-left border-top-0 border-bottom">
                        tiebreaker points: <input type="text" name="tiebreaker_points" size="4" maxlength="2" value="{{$vars['tiebreaker_points']}}">
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
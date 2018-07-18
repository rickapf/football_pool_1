@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 ml-md-auto mr-md-auto">

            <table class="table table-sm table-borderedx">

                @foreach($games as $game)

                    @php
                    if (!isset($prevGameDay) || $prevGameDay != $game->when->format('l')) {
                        $showHeader = true;
                        $prevGameDay = $game->when->format('l');
                    } else {
                        $showHeader = false;
                    }
                    @endphp

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

                    <tr>
                        <td class="align-middle text-center border">
                            {{$game->when->format('g:i A \E\T')}}
                        </td>
                        <td class="align-middle border">
                            <input type="radio">
                            <img src="/img/logos/{{$game->homeTeam->abbreviation}}.gif" width="30" height="30">
                            {{$game->homeTeam->city . ' ' . $game->homeTeam->name}}
                            ({{$game->homeTeam->wins . '-' . $game->homeTeam->losses . '-' . $game->homeTeam->ties}})
                            <span class="float-right font-weight-bold">-8.5</span>
                        </td>
                        <td class="align-middle border">
                            <input type="radio">
                            <img src="/img/logos/{{$game->awayTeam->abbreviation}}.gif" width="30" height="30">
                            {{$game->awayTeam->city . ' ' . $game->awayTeam->name}}
                            ({{$game->awayTeam->wins . '-' . $game->awayTeam->losses . '-' . $game->awayTeam->ties}})
                            <span class="float-right font-weight-bold">+8.5</span>
                        </td>
                        <td class="align-middle text-center border">
                            {{$game->number}}
                        </td>
                    </tr>

                @endforeach

            </table>

        </div>
    </div>


@endsection
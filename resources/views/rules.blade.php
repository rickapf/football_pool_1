@extends('layouts.app')

@section('content')

    <div class="accordion" id="rules">

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#cost">
                    <h6 class="mb-0">COST</h6>
                </a>
            </div>
            <div id="cost" class="collapse" data-parent="#rules">
                <div class="card-body">
                    @include('partials.rules.cost')
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#prizes">
                    <h6 class="mb-0">PRIZES</h6>
                </a>
            </div>
            <div id="prizes" class="collapse" data-parent="#rules">
                <div class="card-body">
                    PRIZES
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#payment">
                    <h6 class="mb-0">PAYMENT</h6>
                </a>
            </div>
            <div id="payment" class="collapse" data-parent="#rules">
                <div class="card-body">
                    PAYMENT
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#picks">
                    <h6 class="mb-0">MAKING PICKS</h6>
                </a>
            </div>
            <div id="picks" class="collapse" data-parent="#rules">
                <div class="card-body">
                    MAKING PICKS
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#auto_picks">
                    <h6 class="mb-0">AUTO PICKER</h6>
                </a>
            </div>
            <div id="auto_picks" class="collapse" data-parent="#rules">
                <div class="card-body">
                    AUTO PICKER
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#tie_breakers">
                    <h6 class="mb-0">TIE BREAKERS</h6>
                </a>
            </div>
            <div id="tie_breakers" class="collapse" data-parent="#rules">
                <div class="card-body">
                    TIE BREAKERS
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#best_bet">
                    <h6 class="mb-0">BEST BET</h6>
                </a>
            </div>
            <div id="best_bet" class="collapse" data-parent="#rules">
                <div class="card-body">
                    BEST BET
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#scoring">
                    <h6 class="mb-0">SCORING</h6>
                </a>
            </div>
            <div id="scoring" class="collapse" data-parent="#rules">
                <div class="card-body">
                    SCORING
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#standings">
                    <h6 class="mb-0">STANDINGS</h6>
                </a>
            </div>
            <div id="standings" class="collapse" data-parent="#rules">
                <div class="card-body">
                    STANDINGS
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a data-toggle="collapse" data-parent="#rules" href="#misc">
                    <h6 class="mb-0">MISCELLANEOUS</h6>
                </a>
            </div>
            <div id="misc" class="collapse" data-parent="#rules">
                <div class="card-body">
                    MISCALLANEOUS
                </div>
            </div>
        </div>

    </div>

@endsection
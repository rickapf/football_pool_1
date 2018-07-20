@extends('layouts.app')

@section('content')

    @if (\App\Models\Setting::first()->current_week == 0)

        <div class="card border-0">
            <div class="card-header text-center bg-white border-0">
                <h5>Standings will be available after the season starts.</h5>
            </div>
        </div>

    @else

        STANDINGS

    @endif

@endsection
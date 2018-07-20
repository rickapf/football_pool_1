@extends('layouts.app')

@section('content')

    @if (\App\Models\Setting::first()->current_week == 0)

        <div class="card w-75 border-0 mx-auto">
            <div class="card-header text-center bg-white">
                <h5>Hello {{Auth::user()->fname}}, welcome to the pool.</h5>
            </div>
            <div class="card-body">
                <ul>
                    <li>Be sure to read the <a href="{{route('rules')}}">rules</a> to familiarize yoursef with how the pool works.</li>
                    <li>Use the <a href="{{route('feedback')}}">feedback</a> form to contact me with any questions or send me an email at <span class="font-weight-bold">{{config('pool.admin.email')}}</span>.</li>
                </ul>
            </div>
        </div>

    @else

        <div class="text-center">
            <h5>HOME PAGE GOES HERE</h5>
        </div>

    @endif

@endsection
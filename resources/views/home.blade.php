@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h5>Hello {{Auth::user()->fname}}, welcome to week 1</h5>
    </div>

@endsection
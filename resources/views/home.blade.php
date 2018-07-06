@extends('layouts.app')

@section('content')

    <h5>Hello {{Auth::user()->fname}}, welcome to week 1</h5>

@endsection
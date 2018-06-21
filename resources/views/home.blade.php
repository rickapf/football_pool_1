@extends('layouts.app')

@section('content')
    {{Auth::user()->fname}}
@endsection
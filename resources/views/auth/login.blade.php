@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4 offset-md-4">

                @include('partials.errors')

                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0 text-primary"><i class="fas fa-sign-in-alt mr-1"></i> Login</h3>
                    </div>
                    <div class="card-body">
                        <form class="form text-dark" method="post" action="{{route('authenticate')}}">
                            @csrf
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <select name="id" class="form-control">
                                        <option value=""></option>
                                        @foreach ($users as $user)
                                            <option value="{{$user['id']}}" @if($user['id'] == old('id')) selected @endif>{{$user['fname'] . ' ' . $user['lname']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                                    </div>
                                    <input type="password" name="password" maxlength="30" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group inline">
                                <button class="btn btn-link pl-0 pr-0 pb-0">forgot password?</button>
                                <button type="submit" class="btn btn-outline-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

@endsection
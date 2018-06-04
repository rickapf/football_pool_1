@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('partials.errors')
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3 class="mb-0 text-primary">Register</h3>
                </div>
                <div class="card-body">
                    <form class="form text-dark" method="post" action="{{route('register')}}">
                        @csrf
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="fname" maxlength="30" value="{{old('fname')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" name="lname" maxlength="30" value="{{old('lname')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email Address:</label>
                            <input type="email" name="email" maxlength="30" value="{{old('email')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" maxlength="30" value="{{old('password')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password name="password_confirmation" maxlength="30" value="{{old('password_confirmation')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
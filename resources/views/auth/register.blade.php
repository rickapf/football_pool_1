@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">

            @if (session('first_name'))

                <!-- SUCCESSFULLY REGISTERED -->
                <div class="card">
                    <div class="card-header bg-success text-center text-white">
                        <h4>Welcome to the pool {{session('first_name')}}!</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">You will receive a confirmation email shortly. Please keep it for future reference.</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                    </div>
                </div>

            @else

                <!-- REGISTRATION FORM -->
                @include('partials.errors')
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h4 class="mb-0 text-primary"><i class="fas fa-user-plus mr-1"></i> Register</h4>
                    </div>
                    <div class="card-body">
                        <form class="form text-dark" method="post" action="{{route('create_user')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>First Name:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input type="text" name="first_name" maxlength="30" value="{{old('first_name')}}" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input type="text" name="last_name" maxlength="30" value="{{old('last_name')}}" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email Address:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                        </div>
                                        <input name="email" maxlength="50" value="{{old('email')}}" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Confirm Email Address:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                        </div>
                                        <input name="email_confirmation" maxlength="50" value="{{old('email_confirmation')}}" class="form-control" placeholder="Confirm Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Password:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        </div>
                                        <input type="password" name="password" maxlength="30" value="" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Confirm Password:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        </div>
                                        <input type="password" name="password_confirmation" maxlength="30" value="" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group inline">
                                <a href="{{route('login')}}" class="btn btn-link pl-0 pr-0 pb-0">already registered?</a>
                                <button type="submit" class="btn btn-primary float-right">Register</button>
                            </div>
                        </form>
                    </div>
                </div>

            @endif

        </div>
    </div>

@endsection
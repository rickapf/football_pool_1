@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4 offset-md-4">

            @if (session('fname'))

                <!-- SUCCESSFULLY REGISTERED -->
                <div class="card">
                    <div class="card-header bg-success text-center text-white">
                        <h4>Welcome to the pool {{session('fname')}}!</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">You will receive a confirmation email shortly. Please keep it for future reference.</li>
                        <li class="list-group-item">Please visit the 'Rules & Info' page to familiarize yourself with how the pool works.</li>
                        <li class="list-group-item">Use the 'Feedback' form to contact me with any questions or concerns.</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{route('login_form')}}" class="btn btn-outline-primary">Login</a>
                    </div>
                </div>

            @else

                <!-- REGISTRATION FORM -->
                @include('partials.errors')
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0 text-primary"><i class="fas fa-user-plus mr-1"></i> Register</h3>
                    </div>
                    <div class="card-body">
                        <form class="form text-dark" method="post" action="{{route('create_user')}}">
                            @csrf
                            <div class="form-group">
                                <label>First Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" name="fname" maxlength="30" value="{{old('fname')}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Last Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" name="lname" maxlength="30" value="{{old('lname')}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-at"></i></div>
                                    </div>
                                    <input type="email" name="email" maxlength="50" value="{{old('email')}}" class="form-control">
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
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                                    </div>
                                    <input type="password" name="password_confirmation" maxlength="30" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-default float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            @endif

        </div>
    </div>

@endsection
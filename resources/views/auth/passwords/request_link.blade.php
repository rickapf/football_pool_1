@extends('layouts.app')

@section('content')

    @if (session('email'))

        <!-- EMAIL SENT -->
        <div class="card-body text-center">
            An email that contains a link to reset your password has been sent to <b>{{session('email')}}</b>
        </div>

    @else

        <!-- REQUEST LINK FORM -->
        <div class="row">
            <div class="col-md-4 offset-md-4">

                @include('partials.errors')
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h4 class="mb-0 text-primary"><i class="fas fa-user-lock"></i> Forgot Password</h4>
                    </div>
                    <div class="card-body">
                        <form class="form text-dark" method="post" action="{{route('send_reset_password_link')}}">
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
                                <label>Email Address:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-at"></i></div>
                                    </div>
                                    <input name="email" maxlength="50" value="{{old('email')}}" class="form-control">
                                </div>
                                <small class="form-text text-muted">
                                    Must be the same email address you registered with.
                                </small>
                            </div>
                            <div class="form-group inline">
                                <a href="{{route('login')}}" class="btn btn-link pl-0 pr-0 pb-0">login</a>
                                <button type="submit" class="btn btn-primary float-right">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    @endif

@endsection
@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4 offset-md-4">

            <!-- RESET PASSWORD FORM -->
            @include('partials.errors')
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h4 class="mb-0 text-primary"><i class="fas fa-redo mr-1"></i> Reset Password</h4>
                </div>
                <div class="card-body">
                    <form class="form text-dark" method="post" action="{{route('reset_password')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$resetId}}">
                        <input type="hidden" name="token" value="{{$token}}">
                        <div class="form-group">
                            <label>New Password:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" name="password" maxlength="30" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" name="password_confirmation" maxlength="30" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-default float-right">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
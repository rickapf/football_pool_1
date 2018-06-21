@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4 offset-md-4">

                @include('partials.errors')

                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0 text-primary">Login <i class="fas fa-sign-in-alt float-right"></i></h3>
                    </div>
                    <div class="card-body">
                        <form class="form text-dark" method="post" action="{{route('authenticate')}}">
                            @csrf
                            <div class="form-group">
                                <label>Name:</label>
                                <select name="id" class="form-control">
                                    <option value=""></option>
                                    @foreach ($users as $user)
                                        <option value="{{$user['id']}}" @if($user['id'] == old('id')) selected @endif>{{$user['fname'] . ' ' . $user['lname']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" maxlength="30" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-default float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

@endsection
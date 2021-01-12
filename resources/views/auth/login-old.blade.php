@extends('layouts.master')

@section('title')
    Login
@stop


@section('content')

    <div class="login_page">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <h3>Login</h3>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <button type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.master')

@section('title')
    Login
@stop

@section('content')

    <section>
        <div class="block no-padding  gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner2">
                            <div class="inner-title2">
                                <h3>Login</h3>
                                <span>Keep up to date with the latest news</span>
                            </div>
                            <div class="page-breacrumbs">
                                <ul class="breadcrumbs">
                                    <li><a href="{{ url('/') }}" title="">Home</a></li>
                                    <li><a href="{{ url('login') }}" title="">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-popup-area signin-popup-box static">
                            <div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{Session::get('success')}}
                                    </div>
                                @endif

                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                        @foreach($errors->all() as $error)
                                            <p>{{$error}}</p>
                                        @endforeach

                                    </div>
                                @endif
                            </div>
                            <div class="account-popup">
                                <h3>Login</h3>
                                <span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>

                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="cfield{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                        <i class="la la-envelope"></i>
                                    </div>
                                    <div class="cfield{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input type="password" id="password" placeholder="********" name="password">
                                        <i class="la la-key"></i>
                                    </div>
                                    <p class="remember-label">
                                        <input type="checkbox" name="remember_token" id="cb1"><label for="cb1">Remember me</label>
                                    </p>
                                    <a href="#" title="">Forgot Password?</a>
                                    <button type="submit">Login</button>
                                </form>
                            </div>
                        </div><!-- LOGIN POPUP -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    @stop



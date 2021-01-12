@extends('layouts.master')

@section('title')
    Register
@stop

@section('content')

    <section>
        <div class="block no-padding  gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner2">
                            <div class="inner-title2">
                                <h3>Register</h3>
                                <span>Keep up to date with the latest news</span>
                            </div>
                            <div class="page-breacrumbs">
                                <ul class="breadcrumbs">
                                    <li><a href="#" title="">Home</a></li>
                                    <li><a href="#" title="">Pages</a></li>
                                    <li><a href="#" title="">Register</a></li>
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
                        <div class="account-popup-area signup-popup-box static">
                            <div class="account-popup">
                                <h3>Sign Up</h3>
                                <span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>
                                <!-- Start Button -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link  active" href="#Candidate" role="tab" data-toggle="tab" aria-selected="true">Candidate</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Employer" role="tab" data-toggle="tab">Employer</a>
                                    </li>
                                </ul>

                                <br>
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger" style="margin-top: 20px;">
                                        @foreach($errors->all() as $error)
                                            {{$error}} <br>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start Form Candidate -->
                                    <div role="tabpanel" class="tab-pane active" id="Candidate">
                                        <form method="POST" action="{{ url('register/candidate') }}">
                                            {{ csrf_field() }}
                                            <div class="cfield {{ $errors->has('username') ? ' has-error' : '' }}">
                                                <input type="text" name="username" value="{{old('username')}}" placeholder="Enter Your Username" required />
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="cfield {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="Enter Your First Name" required />
                                                <i class="la la-user"></i>
                                            </div>

                                            <div class="cfield  {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Enter Your Last Name" required />
                                                <i class="la la-user"></i>
                                            </div>

                                            <div class="cfield  {{ $errors->has('jop_title') ? ' has-error' : '' }}">
                                                <input type="text" name="jop_title" value="{{old('jop_title')}}" placeholder="Enter Your Jop Title" required />
                                                <i class="la la-user"></i>
                                            </div>

                                            <div class="cfield {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <input type="email" placeholder="Enter Your Email" name="email" value="{{old('email')}}" required />
                                                <i class="la la-envelope-o"></i>
                                            </div>

                                            <div class="cfield {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <input type="text" placeholder="Enter Your Phone Number" value="{{old('phone')}}" name="phone" required />
                                                <i class="la la-phone"></i>
                                            </div>

                                            <div class="cfield {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <input type="password" placeholder="Enter Your Password" name="password" required />
                                                <i class="la la-key"></i>
                                            </div>

                                            <div class="dropdown-field">
                                                <select name="city_id" required class="chosen">
                                                    <option disabled selected>Please Select Your City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="dropdown-field">
                                                <select name="gander" required class="chosen">
                                                    <option selected disabled>Please Select Gander</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>

                                            <button type="submit">Signup</button>
                                        </form>
                                    </div>

                                    <!-- Start Form Employer -->
                                    <div role="tabpanel" class="tab-pane fade" id="Employer">
                                        <form method="POST" action="{{ url('register/employers') }}">
                                            {{ csrf_field() }}
                                            <div class="cfield {{ $errors->has('username_employer') ? ' has-error' : '' }}">
                                                <input type="text" name="username_employer" value="{{old('username_employer')}}" placeholder="Enter Your Username" />
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="cfield {{ $errors->has('first_name_employer') ? ' has-error' : '' }}">
                                                <input type="text" name="first_name_employer" value="{{old('first_name_employer')}}" placeholder="Enter Your First Name" required />
                                                <i class="la la-user"></i>
                                            </div>

                                            <div class="cfield  {{ $errors->has('last_name_employer') ? ' has-error' : '' }}">
                                                <input type="text" name="last_name_employer" value="{{old('last_name_employer')}}" placeholder="Enter Your Last Name" required />
                                                <i class="la la-user"></i>
                                            </div>

                                            <div class="cfield  {{ $errors->has('title_employer') ? ' has-error' : '' }}">
                                                <input type="text" name="title_employer" value="{{old('title_employer')}}" placeholder="Enter Your Companey Name" required />
                                                <i class="la la-user"></i>
                                            </div>

                                            <div class="dropdown-field">
                                                <select name="employment_id" required class="chosen">
                                                    <option disabled selected>Choose Employment</option>
                                                    @foreach($Employments as $Employment)
                                                        <option value="{{$Employment->id}}">{{$Employment->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="cfield {{ $errors->has('email_employer') ? ' has-error' : '' }}">
                                                <input type="email" placeholder="Enter Your Email" name="email_employer" value="{{old('email_employer')}}" required />
                                                <i class="la la-envelope-o"></i>
                                            </div>

                                            <div class="cfield {{ $errors->has('phone_employer') ? ' has-error' : '' }}">
                                                <input type="text" placeholder="Enter Your Phone Number" value="{{old('phone_employer')}}" name="phone_employer" required />
                                                <i class="la la-phone"></i>
                                            </div>

                                            <div class="cfield {{ $errors->has('password_employer') ? ' has-error' : '' }}">
                                                <input type="password" placeholder="Enter Your Password" name="password_employer" required />
                                                <i class="la la-key"></i>
                                            </div>


                                            <div class="dropdown-field">
                                                <select name="city_id_employer" required class="chosen">
                                                    <option disabled selected>Please Select Your City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>



                                            <button type="submit">Signup</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- SIGNUP POPUP -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

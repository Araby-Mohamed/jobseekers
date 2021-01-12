@extends('layouts.master')

@section('title')
    My Profile
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/css/daterangepicker.css" />
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">

            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Welcome {{auth()->user()->username}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    @include('layouts.sidebar')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            @include('layouts.message')
                            <form action="{{url('profile/employments/'.auth()->user()->id.'/update')}}" method="post" enctype="multipart/form-data" class="form-control">
                                {{csrf_field()}}
                            <div class="profile-title">
                                    <h3>My Profile</h3>
                                    <div class="upload-img-bar">
                                        @if(auth()->user()->image != '')
                                            <span class="round"><img src="{{asset('images/users/'.auth()->user()->image)}}" style="width:156px; height:156px" alt="" /></span>
                                        @else
                                            <span class="round"><img src="{{asset('images')}}/user.png" style="width:156px; height:156px" alt="" /></span>
                                        @endif
                                        <div class="upload-info">
                                            <h3>{{Auth::user()->first_name}} {{auth()->user()->last_name}}</h3>
                                            <div class="custom-file">
                                                <span>Browse</span>
                                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                            </div>
                                            <span>Max file size is 1MB, Minimum dimension: 156x156 And Suitable files are .jpg & .png</span>
                                        </div>
                                    </div>

                                    <div class="upload-img-bar">
                                        @if($companies->logo != '')
                                            <span class="round"><img src="{{asset('images/companies/'.$companies->logo)}}" style="width:156px; height:156px" alt="" /></span>
                                        @else
                                            <span class="round"><img src="{{asset('images')}}/logo.png" style="width:156px; height:156px" alt="" /></span>
                                        @endif
                                        <div class="upload-info">
                                            <h3>Company Logo</h3>
                                            <div class="custom-file">
                                                <span>Browse</span>
                                                <input type="file" name="logo" class="custom-file-input" id="customFile2">
                                            </div>
                                            <span>Max file size is 1MB, Minimum dimension: 156x156 And Suitable files are .jpg & .png</span>
                                        </div>
                                    </div>
                                </div>
                            <div class="profile-form-edit contact-edit">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Username</span>
                                        <div class="pf-field">
                                            <input type="text" name="username" value="{{auth()->user()->username}}" placeholder="{{auth()->user()->username}}" />
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Company Name</span>
                                        <div class="pf-field">
                                            <input type="text" name="title" value="{{$companies->title}}" />
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <span class="pf-title">First Name</span>
                                        <div class="pf-field">
                                            <input type="text" name="first_name" value="{{auth()->user()->first_name}}" />
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <span class="pf-title">Last Name</span>
                                        <div class="pf-field">
                                            <input type="text" name="last_name" value="{{auth()->user()->last_name}}" />
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <span class="pf-title">Password</span>
                                        <div class="pf-field">
                                            <input type="password" name="password" placeholder="**************" />
                                            <i class="fa fa-key"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <span class="pf-title">Company Email</span>
                                        <div class="pf-field">
                                            <input type="email" name="email_company" value="{{$companies->email_company}}" placeholder="{{$companies->email_company}}" />
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <span class="pf-title">Employment</span>
                                        <div class="pf-field">
                                            <select class="chosen" name="employment_id">
                                                <option value="{{$companies->employment_id}}" selected>{{$companies->employment_title}}</option>
                                                @foreach($works as $work)
                                                    @if($work->id != $companies->employment_id)
                                                        <option value="{{ $work->id }}" >{{$work->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <span class="pf-title">city</span>
                                        <div class="pf-field">
                                            <select name="city_id" class="chosen">
                                                <option value="{{$companies->city_id}}">{{$companies->city}}</option>
                                                @foreach($cities as $city)
                                                    @if($city->id != $companies->city_id)
                                                        <option value="{{$city->id}}">{{$city->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <span class="pf-title">Description</span>
                                        <div class="pf-field">
                                            <textarea name="Description">{{$companies->Description}}</textarea>
                                        </div>
                                    </div>

                                    <h3 class="form-title">Social Edit</h3>
                                    <div class="col-lg-6">
                                            <span class="pf-title">Facebook</span>
                                            <div class="pf-field">
                                                <input type="url" name="facebook" value="{{$companies->facebook}}" placeholder="Your Link Facebook" />
                                                <i class="fa fa-facebook"></i>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                            <span class="pf-title">Twitter</span>
                                            <div class="pf-field">
                                                <input type="url" name="twitter" value="{{$companies->twitter}}" placeholder="Your Link Twitter" />
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                            <span class="pf-title">Linkedin</span>
                                            <div class="pf-field">
                                                <input type="url" name="linkedin" value="{{$companies->linkedin}}" placeholder="Your Link Linkedin" />
                                                <i class="fa fa-linkedin"></i>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                            <span class="pf-title">Website</span>
                                            <div class="pf-field">
                                                <input type="url" name="website" value="{{$companies->website}}" placeholder="www.example.com" />
                                                <i class="fa fa-globe"></i>
                                            </div>
                                        </div>

                                    <h3 class="form-title">Contact</h3>
                                    <div class="col-md-6">
                                        <span class="pf-title">Phone Number</span>
                                        <div class="pf-field">
                                            <input type="text" name="phone" value="{{auth()->user()->phone}}" placeholder="{{auth()->user()->phone}}" />
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="pf-title">Email</span>
                                        <div class="pf-field">
                                            <input type="email" name="email" value="{{auth()->user()->email}}" placeholder="{{auth()->user()->email}}" />
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        {{--{!! Form::hidden('_method','PUT') !!}--}}
                                        {{--<input type="hidden" name="_method" value="PUT">--}}
                                        <input type="submit" value="Save" class="srch-lctn">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('js')
    {{--<script src="{{ asset('front') }}/js/circle-progress.min.js" type="text/javascript"></script>--}}
    {{--<script src="{{ asset('front') }}/js/tag.js" type="text/javascript"></script>--}}
    <script src="{{ asset('front') }}/js/maps3.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('front') }}/js/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('front') }}/js/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="birthday"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: parseInt(moment().format('YYYY') - 60),
                maxYear: parseInt(moment().format('YYYY') - 18)
            }, function(start, end, label) {
                var years = moment().diff(start, 'years');
                //alert("You are " + years + " years old!");
            });
        });
    </script>
@stop
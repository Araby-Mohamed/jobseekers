<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Jobsekers">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/icons.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/responsive.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/chosen.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/colors/colors.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/font-awesome.min.css" />
    @yield('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/custome.css" />

</head>
<body>

<div class="page-loading">
    <img src="{{ asset('front') }}/images/loader.gif" alt="" />
</div>

<div class="theme-layout" id="scrollup">
    <!-- Start Header Responsive -->
    <div class="responsive-header">
        <div class="responsive-menubar">
            <div class="res-logo"><a href="{{url('/')}}" title=""><img src="{{url('front')}}/images/resource/logo.png" alt="" /></a></div>
            <div class="menu-resaction">
                <div class="res-openmenu">
                    <img src="{{url('front')}}/images/icon.png" alt="" /> Menu
                </div>
                <div class="res-closemenu">
                    <img src="{{url('front')}}/images/icon2.png" alt="" /> Close
                </div>
            </div>
        </div>
        <div class="responsive-opensec">
            <div class="btn-extars">
                <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
                <ul class="account-btns">
                    <li><a href="{{ url('register') }}" title=""><i class="la la-key"></i> Sign Up</a></li>
                    <li><a href="{{ url('login') }}" title=""><i class="la la-external-link-square"></i> Login</a></li>
                </ul>
            </div><!-- Btn Extras -->
            <form class="res-search">
                <input type="text" placeholder="Job title, keywords or company name" />
                <button type="submit"><i class="la la-search"></i></button>
            </form>
            <div class="responsivemenu">
                <ul>
                    <li>
                        <a href="{{url('/')}}" title="">Home</a>
                    </li>
                    <li>
                        <a href="#">About Us</a>
                    </li>
                    <li>
                        <a href="{{url('categories')}}" title="">Categories</a>
                    </li>
                    <li>
                        <a href="{{url('employers')}}">Employers</a>
                    </li>
                    <li>
                        <a href="{{url('candidates')}}" title="">Candidates</a>
                    </li>
                    <li>
                        <a href="{{url('jobs')}}">Jobs</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Start Header -->
    @if(!(Request::is('register') or Request::is('login')))
    <header class="stick-top">
    @else
    <header class="gradient">
    @endif
        <div class="menu-sec">
            <div class="container">
                <div class="logo">
                    <a href="{{ url('/') }}" title="">
                        <img class="hidesticky" src="{{ asset('front') }}/images/resource/logo.png" alt="">
                        <img class="showsticky" src="{{ asset('front') }}/images/resource/logo10.png" alt="">
                    </a>
                </div><!-- Logo -->
                <div class="btn-extars">
                    @guest
                        <ul class="account-btns">
                            <li class="signup-popup"><a href="{{ url('register') }} " title=""><i class="la la-key"></i> Sign Up</a></li>
                            <li class="signin-popup"><a href="{{ url('login') }} " title=""><i class="la la-external-link-square"></i> Login</a></li>
                        </ul>
                    @else
                        <div class="my-profiles-sec">
                            <span><img src="{{ auth()->user()->image != '' ? asset('images/users/'.auth()->user()->image) : asset('images').'/user.png' }}" style="width: 54px; height: 54px" alt=""> {{auth()->user()->username}} <i class="la la-bars"></i></span>
                        </div>
                    @endguest
                </div><!-- Btn Extras -->
                <nav>
                    <ul>
                        <li>
                            <a href="{{url('/')}}" title="">Home</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="{{url('categories')}}" title="">Categories</a>
                        </li>
                        <li>
                            <a href="{{url('employers')}}">Employers</a>
                        </li>
                        <li>
                            <a href="{{url('candidates')}}" title="">Candidates</a>
                        </li>
                        <li>
                            <a href="{{url('jobs')}}">Jobs</a>
                        </li>
                    </ul>
                </nav><!-- Menus -->
            </div>
        </div>
    </header>

    @yield('content')

<footer>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 column">
                    <div class="widget">
                        <div class="about_widget">
                            <div class="logo">
                                <a href="index.html" title=""><img src="{{url('front')}}/images/resource/logo.png" alt="" /></a>
                            </div>
                            <span>Collin Street West, Victor 8007, Australia.</span>
                            <span>+1 246-345-0695</span>
                            <span>info@jobhunt.com</span>
                            <div class="social">
                                <a href="#" title=""><i class="fa fa-facebook"></i></a>
                                <a href="#" title=""><i class="fa fa-twitter"></i></a>
                                <a href="#" title=""><i class="fa fa-linkedin"></i></a>
                                <a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                <a href="#" title=""><i class="fa fa-behance"></i></a>
                            </div>
                        </div><!-- About Widget -->
                    </div>
                </div>
                <div class="col-lg-4 column">
                    <div class="widget">
                        <h3 class="footer-title">Frequently Asked Questions</h3>
                        <div class="link_widgets">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="#" title="">Privacy & Seurty </a>
                                    <a href="#" title="">Terms of Serice</a>
                                    <a href="#" title="">Communications </a>
                                    <a href="#" title="">Referral Terms </a>
                                    <a href="#" title="">Lending Licnses </a>
                                    <a href="#" title="">Disclaimers </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" title="">Support </a>
                                    <a href="#" title="">How It Works </a>
                                    <a href="#" title="">For Employers </a>
                                    <a href="#" title="">Underwriting </a>
                                    <a href="#" title="">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 column">
                    <div class="widget">
                        <h3 class="footer-title">Find Jobs</h3>
                        <div class="link_widgets">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="#" title="">US Jobs</a>
                                    <a href="#" title="">Canada Jobs</a>
                                    <a href="#" title="">UK Jobs</a>
                                    <a href="#" title="">Emplois en Fnce</a>
                                    <a href="#" title="">Jobs in Deuts</a>
                                    <a href="#" title="">Vacatures China</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 column">
                    <div class="widget">
                        <div class="download_widget">
                            <a href="#" title=""><img src="{{url('front')}}/images/resource/dw1.png" alt="" /></a>
                            <a href="#" title=""><img src="{{url('front')}}/images/resource/dw2.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-line">
        <span>© 2018 Jobhunt All rights reserved. Design by Creative Layers</span>
        <a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
    </div>
</footer>

@if(auth()->user())
    <div class="profile-sidebar">
        <span class="close-profile"><i class="la la-close"></i></span>
        <div class="can-detail-s">
            <div class="cst">
                @if(auth()->user()->image != '')
                    <img src="{{asset('images/users/'.auth()->user()->image)}}" style="width:114px; height: 114px;" alt="" />
                @else
                    <img src="{{asset('images')}}/user.png" style="width:114px; height: 114px;" alt="" />
                @endif
            </div>
            <h3>{{auth()->user()->username}}</h3>
            <span>{{auth()->user()->email}}</span>
        </div>
        <div class="tree_widget-sec">
        <ul>
            <li class="active">
                <a href="{{ (auth()->user()->level == 'employer' ? url('profile/employments') : url('profile/candidates') )}}" title=""><i class="la la-file-text"></i>My Profile</a>
            </li>
            @if(auth()->user()->level == 'employer')
                <li><a href="{{url('add/job')}}"><i class="la la-plus-square-o"></i> Add Job</a> </li>
            @endif
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="la la-unlink"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
    </div><!-- Profile Sidebar -->
@endif

<script src="{{ asset('front') }}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/modernizr.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/script.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/wow.min.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/slick.min.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/parallax.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/select-chosen.js" type="text/javascript"></script>

    </header>
</div>
@yield('js')

<script>
    $(document).ready(function(){
        $('.tree_widget-sec ul li').click(function(){
            $('.tree_widget-sec ul li').removeClass("active");
            $(this).addClass("active");
        });
    });

    $('.confirm').click(function () {
        return confirm('Are You Sure Delete Item?');
    });
</script>

    </body>
</html>



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
    <link rel="stylesheet" href="{{ asset('front') }}/css/responsive.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/chosen.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/colors/colors.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/font-awesome.min.css" />
    @yield('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/custome.css" />

</head>
<body>

<div class="page-loading">
    <img src="{{ asset('front') }}/images/loader.gif" alt="" />
</div>

<div class="theme-layout" id="scrollup">

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
                        <a href="#" title="">Home</a>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="#" title="">Employers</a>
                        <ul>
                            <li><a href="employer_list1.html" title=""> Employer List 1</a></li>
                            <li><a href="employer_list2.html" title="">Employer List 2</a></li>
                            <li><a href="employer_list3.html" title="">Employer List 3</a></li>
                            <li><a href="employer_list4.html" title="">Employer List 4</a></li>
                            <li><a href="employer_single1.html" title="">Employer Single 1</a></li>
                            <li><a href="employer_single2.html" title="">Employer Single 2</a></li>
                            <li class="menu-item-has-children">
                                <a href="#" title="">Employer Dashboard</a>
                                <ul>
                                    <li><a href="employer_manage_jobs.html" title="">Employer Job Manager</a></li>
                                    <li><a href="employer_packages.html" title="">Employer Packages</a></li>
                                    <li><a href="employer_post_new.html" title="">Employer Post New</a></li>
                                    <li><a href="employer_profile.html" title="">Employer Profile</a></li>
                                    <li><a href="employer_resume.html" title="">Employer Resume</a></li>
                                    <li><a href="employer_transactions.html" title="">Employer Transaction</a></li>
                                    <li><a href="employer_job_alert.html" title="">Employer Job Alert</a></li>
                                    <li><a href="employer_change_password.html" title="">Employer Change Password</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#" title="">Candidates</a>
                        <ul>
                            <li><a href="candidates_list.html" title="">Candidates List 1</a></li>
                            <li><a href="candidates_list2.html" title="">Candidates List 2</a></li>
                            <li><a href="candidates_list3.html" title="">Candidates List 3</a></li>
                            <li><a href="candidates_single.html" title="">Candidates Single 1</a></li>
                            <li><a href="candidates_single2.html" title="">Candidates Single 2</a></li>
                            <li class="menu-item-has-children">
                                <a href="#" title="">Candidates Dashboard</a>
                                <ul>
                                    <li><a href="candidates_my_resume.html" title="">Candidates Resume</a></li>
                                    <li><a href="candidates_my_resume_add_new.html" title="">Candidates Resume new</a></li>
                                    <li><a href="candidates_profile.html" title="">Candidates Profile</a></li>
                                    <li><a href="candidates_shortlist.html" title="">Candidates Shortlist</a></li>
                                    <li><a href="candidates_job_alert.html" title="">Candidates Job Alert</a></li>
                                    <li><a href="candidates_dashboard.html" title="">Candidates Dashboard</a></li>
                                    <li><a href="candidates_cv_cover_letter.html" title="">CV Cover Letter</a></li>
                                    <li><a href="candidates_change_password.html" title="">Change Password</a></li>
                                    <li><a href="candidates_applied_jobs.html" title="">Candidates Applied Jobs</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#" title="">Blog</a>
                        <ul>
                            <li><a href="blog_list.html"> Blog List 1</a></li>
                            <li><a href="blog_list2.html">Blog List 2</a></li>
                            <li><a href="blog_list3.html">Blog List 3</a></li>
                            <li><a href="blog_single.html">Blog Single</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#" title="">Job</a>
                        <ul>
                            <li><a href="job_list_classic.html">Job List Classic</a></li>
                            <li><a href="job_list_grid.html">Job List Grid</a></li>
                            <li><a href="job_list_modern.html">Job List Modern</a></li>
                            <li><a href="job_single1.html">Job Single 1</a></li>
                            <li><a href="job_single2.html">Job Single 2</a></li>
                            <li><a href="job-single3.html">Job Single 3</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#" title="">Pages</a>
                        <ul>
                            <li><a href="about.html" title="">About Us</a></li>
                            <li><a href="404.html" title="">404 Error</a></li>
                            <li><a href="contact.html" title="">Contact Us 1</a></li>
                            <li><a href="contact2.html" title="">Contact Us 2</a></li>
                            <li><a href="faq.html" title="">FAQ's</a></li>
                            <li><a href="how_it_works.html" title="">How it works</a></li>
                            <li><a href="login.html" title="">Login</a></li>
                            <li><a href="pricing.html" title="">Pricing Plans</a></li>
                            <li><a href="register.html" title="">Register</a></li>
                            <li><a href="terms_and_condition.html" title="">Terms & Condition</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <header class="stick-top">
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

</div>

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
                <a href="{{url('profile')}}" title=""><i class="la la-file-text"></i>My Profile</a>
            </li>
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
<script src="{{ asset('front') }}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/modernizr.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/script.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/wow.min.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/slick.min.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/parallax.js" type="text/javascript"></script>
<script src="{{ asset('front') }}/js/select-chosen.js" type="text/javascript"></script>
@yield('js')


</body>
</html>



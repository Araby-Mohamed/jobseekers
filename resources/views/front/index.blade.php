@extends('layouts.master')

@section('title')
    Job seeker
@stop

@section('content')
    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-featured-sec">
                            <ul class="main-slider-sec text-arrows">
                                <li class="slideHome"><img src="{{ asset('front') }}/images/resource/mslider3.jpg" alt="" /></li>
                                <li class="slideHome"><img src="{{ asset('front') }}/images/resource/mslider2.jpg" alt="" /></li>
                                <li class="slideHome"><img src="{{ asset('front') }}/images/resource/mslider1.jpg" alt="" /></li>
                            </ul>
                            <div class="job-search-sec">
                                <div class="job-search">
                                    <h3>The Easiest Way to Get Your New Job</h3>
                                    <span>Find Jobs, Employment & Career Opportunities</span>
                                    <form method="get" action="{{ url('search/jobs') }}">
                                        <div class="row">
                                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                                <div class="job-field">
                                                    <input type="text" name="query" placeholder="Job title" />
                                                    <i class="la la-keyboard-o"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
                                                <button type="submit"><i class="la la-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="scroll-to">
                                <a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="scroll-here">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Popular Categories</h2>
                            <span>37 jobs live - 0 added today.</span>
                        </div><!-- Heading -->
                        <div class="cat-sec">
                            <div class="row no-gape">
                                @foreach($Employments as $employment)
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="{{url('jobs/'.$employment->id)}}" title="">
                                            <i class="la {{$employment->icon}}"></i>
                                            <span>{{$employment->title}}</span>
                                            <p>({{$employment->jobs->count()}} open positions)</p>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cat-sec">
                            <div class="row no-gape">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="{{url('categories')}}" title="">Browse All Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block double-gap-top double-gap-bottom">
            <div data-velocity="-.1" style="background: url({{ asset('front') }}/images/resource/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="simple-text-block">
                            <h3>Make a Difference with Your Online Resume!</h3>
                            <span>Your resume in minutes with JobHunt resume assistant is ready!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Latest Jobs</h2>
                            <span>Leading Employers already using job and talent.</span>
                        </div><!-- Heading -->
                        <div class="job-listings-sec">
                            <!-- Get Some Jobs -->
                            @foreach($Jobs as $job)
                                <div class="job-listing">
                                <div class="job-title-sec">
                                    <div class="c-logo">
                                        @if($job->logo != '')
                                            <img style="width: 60px;" src="{{url(asset('images'))}}/companies/{{$job->logo}}" alt="" />
                                        @else
                                            <img style="width: 60px;" src="{{url(asset('images'))}}/logo.png" alt="" />
                                        @endif
                                    </div>
                                    <h3><a href="{{url('job/'.$job->id)}}" title="">{{$job->Job_title}}</a></h3>
                                    <span>{{$job->companeyName}}</span>
                                </div>
                                <span class="job-lctn"><i class="la la-map-marker"></i>{{$job->cityTitle}}</span>
                                @if($job->Job_type == 'Full Time')
                                    <span class="job-is ft">{{$job->Job_type}}</span>
                                @elseif($job->Job_type == 'Part Time')
                                    <span class="job-is pt">{{$job->Job_type}}</span>
                                @else
                                    <span class="job-is fl">{{$job->Job_type}}</span>
                                @endif
                            </div><!-- Job -->
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="{{url('jobs')}}" title="">Load more listings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div data-velocity="-.1" style="background: url({{ asset('front') }}/images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading light">
                            <h2>Kind Words From Happy Candidates</h2>
                            <span>What other people thought about the service provided by JobHunt</span>
                        </div><!-- Heading -->
                        <div class="reviews-sec" id="reviews-carousel">
                            <div class="col-lg-6">
                                <div class="reviews">
                                    <img src="images/resource/r1.jpg" alt="" />
                                    <h3>Augusta Silva <span>Web designer</span></h3>
                                    <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                                </div><!-- Reviews -->
                            </div>
                            <div class="col-lg-6">
                                <div class="reviews">
                                    <img src="images/resource/r2.jpg" alt="" />
                                    <h3>Ali Tufan <span>Web designer</span></h3>
                                    <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                                </div><!-- Reviews -->
                            </div>
                            <div class="col-lg-6">
                                <div class="reviews">
                                    <img src="images/resource/r1.jpg" alt="" />
                                    <h3>Augusta Silva <span>Web designer</span></h3>
                                    <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                                </div><!-- Reviews -->
                            </div>
                            <div class="col-lg-6">
                                <div class="reviews">
                                    <img src="images/resource/r2.jpg" alt="" />
                                    <h3>Ali Tufan <span>Web designer</span></h3>
                                    <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                                </div><!-- Reviews -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Companies We've Helped</h2>
                            <span>Some of the companies we've helped recruit excellent applicants over the years.</span>
                        </div><!-- Heading -->
                        <div class="comp-sec">
                            <div class="company-img">
                                <a href="#" title=""><img src="images/resource/cc1.jpg" alt="" /></a>
                            </div><!-- Client  -->
                            <div class="company-img">
                                <a href="#" title=""><img src="images/resource/cc2.jpg" alt="" /></a>
                            </div><!-- Client  -->
                            <div class="company-img">
                                <a href="#" title=""><img src="images/resource/cc3.jpg" alt="" /></a>
                            </div><!-- Client  -->
                            <div class="company-img">
                                <a href="#" title=""><img src="images/resource/cc4.jpg" alt="" /></a>
                            </div><!-- Client  -->
                            <div class="company-img">
                                <a href="#" title=""><img src="images/resource/cc5.jpg" alt="" /></a>
                            </div><!-- Client  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div data-velocity="-.1" style="background: url({{ asset('front') }}/images/resource/parallax3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Quick Career Tips</h2>
                            <span>Found by employers communicate directly with hiring managers and recruiters.</span>
                        </div><!-- Heading -->
                        <div class="blog-sec">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="my-blog">
                                        <div class="blog-thumb">
                                            <a href="#" title=""><img src="images/resource/b1.jpg" alt="" /></a>
                                            <div class="blog-metas">
                                                <a href="#" title="">March 29, 2017</a>
                                                <a href="#" title="">0 Comments</a>
                                            </div>
                                        </div>
                                        <div class="blog-details">
                                            <h3><a href="#" title="">Attract More Attention Sales And Profits</a></h3>
                                            <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                                            <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="my-blog">
                                        <div class="blog-thumb">
                                            <a href="#" title=""><img src="images/resource/b2.jpg" alt="" /></a>
                                            <div class="blog-metas">
                                                <a href="#" title="">March 29, 2017</a>
                                                <a href="#" title="">0 Comments</a>
                                            </div>
                                        </div>
                                        <div class="blog-details">
                                            <h3><a href="#" title="">11 Tips to Help You Get New Clients</a></h3>
                                            <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                                            <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="my-blog">
                                        <div class="blog-thumb">
                                            <a href="#" title=""><img src="images/resource/b3.jpg" alt="" /></a>
                                            <div class="blog-metas">
                                                <a href="#" title="">March 29, 2017</a>
                                                <a href="#" title="">0 Comments</a>
                                            </div>
                                        </div>
                                        <div class="blog-details">
                                            <h3><a href="#" title="">An Overworked Newspaper Editor</a></h3>
                                            <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                                            <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="simple-text">
                            <h3>Gat a question?</h3>
                            <span>We're here to help. Check out our FAQs, send us an email or call us at 1 (800) 555-5555</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
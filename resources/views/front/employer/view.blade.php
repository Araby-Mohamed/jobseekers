@extends('layouts.master')
@section('title')
    Employer
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Employer</h3>
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
                    <div class="col-lg-12 column">
                        <div class="job-single-sec style3">
                            <div class="job-head-wide">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="job-single-head3 emplye">
                                            <div class="job-thumb">
                                                @if($Company->logo != '')
                                                    <img src="{{asset('images/companies/'.$Company->logo)}}" alt="" />
                                                @else
                                                    <img src="{{asset('images')}}/logo.png" style="width:156px; height:156px" alt="" />
                                                @endif
                                            </div>
                                            <div class="job-single-info3">
                                                <h3>{{$Company->title}}</h3>
                                                <span><i class="la la-map-marker"></i>{{$Company->address}} - {{$Company->titleCity}}</span>
                                                <ul class="tags-jobs">
                                                    <li><i class="la la-calendar-o"></i> Post Date: {{$Company->created_at->diffForHumans()}}</li>
                                                </ul>
                                            </div>
                                        </div><!-- Job Head -->
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="share-bar">
                                            @if($Company->facebook != '')
                                                <a href="{{$Company->facebook}}" title="" class="share-fb"><i class="fa fa-facebook"></i></a>
                                            @endif
                                            @if($Company->twitter != '')
                                                <a href="{{$Company->twitter}}" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                            @endif
                                            @if($Company->linkedin != '')
                                                <a href="{{$Company->linkedin}}" title="" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                                            @endif
                                            @if($Company->website != '')
                                                <a href="{{$Company->website}}" title="" class="share-link"><i class="fa fa-link"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-wide-devider">
                                <div class="row">
                                    <div class="col-lg-8 column">
                                        @if($Company->Description != '')
                                            <div class="job-details">
                                                <h3>About Business Network</h3>
                                                <p>{{$Company->Description}}</p>
                                            </div>
                                        @endif
                                        <div class="recent-jobs">
                                            <h3>Jobs from Business Network</h3>
                                            <div class="job-list-modern">
                                                @foreach($Jobs as $Job)
                                                    <div class="job-listings-sec no-border">
                                                    <div class="job-listing wtabs noimg">
                                                        <div class="job-title-sec">
                                                            <h3><a href="{{url('job/'.$Job->id)}}" title="">{{$Job->Job_title}}</a></h3>
                                                            <span>{{$Job->companeyName}}</span>
                                                            <div class="job-lctn"><i class="la la-map-marker"></i>{{$Job->cityTitle}}</div>
                                                        </div>
                                                        <div class="job-style-bx">
                                                            @if($Job->Job_type == 'Full Time')
                                                                <span class="job-is ft">{{$Job->Job_type}}</span>
                                                            @elseif($Job->Job_type == 'Part Time')
                                                                <span class="job-is pt">{{$Job->Job_type}}</span>
                                                            @else
                                                                <span class="job-is fl">{{$Job->Job_type}}</span>
                                                            @endif
                                                            <i>{{$Job->created_at->diffForHumans()}}</i>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @if($JobsCount > 9)
                                                <div class="emply-btns">
                                                    <a class="seemap" href="{{url('jobs/company/'.$Company->user_id)}}" title=""> View All Job</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 column">
                                        <div class="job-overview">
                                            <h3>Company Information</h3>
                                            <ul>
                                                <li><i class="la la-map"></i><h3>Locations</h3><span>{{$Company->address}} '-' {{$Company->titleCity}}</span></li>
                                                <li><i class="la la-bars"></i><h3>Employments</h3><span>{{$Company->titleEmployments}}</span></li>
                                                <li><i class="la la-clock-o"></i><h3>Created</h3><span>{{$Company->created_at->diffForHumans()}}</span></li>
                                                @if($Company->email_company != '')
                                                    <li><i class="la la-comment"></i><h3>Email</h3><span>{{$Company->email_company}}</span></li>
                                                @endif
                                                <li><i class="la la-mobile"></i><h3>Phone Number</h3><span>{{$Company->phone}}</span></li>
                                            </ul>
                                        </div><!-- Job Overview -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
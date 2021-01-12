@extends('layouts.master')
@section('title')
    Candidates
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6">
                                        <div class="action-inner">

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

    <section class="overlape">
        <div class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cand-single-user">
                            <div class="share-bar circle">
                                @if($Candidate->facebook != '')
                                    <a href="{{$Candidate->facebook}}" target="_blank" title="facebook" class="share-fb"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if($Candidate->twitter != '')
                                    <a href="{{$Candidate->twitter}}" target="_blank" title="twitter" class="share-twitter"><i class="la la-twitter"></i></a>
                                @endif
                                @if($Candidate->linkedin != '')
                                    <a href="{{$Candidate->linkedin}}" target="_blank" title="linkedin" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                                @endif
                                @if($Candidate->website != '')
                                    <a href="{{$Candidate->website}}" target="_blank" title="website" class="share-link"><i class="fa fa-link"></i></a>
                                @endif
                            </div>
                            <div class="can-detail-s">
                                <div class="cst">
                                    @if($Candidate->image != '')
                                        <img src="{{asset('images/users/'.$Candidate->image)}}" width="137px" height="137px" alt="" />
                                    @else
                                        <img src="{{asset('images/user.png')}}" width="137px" height="137px" alt="" />
                                    @endif
                                </div>
                                <h3>{{$Candidate->username}}</h3>
                                <span><i>{{$Candidate->jop_title}}</i></span>
                                <p>{{$Candidate->email}}</p>
                                <p><i class="la la-map-marker"></i>{{$Candidate->city}} / Egypt</p>
                            </div>
                            <div class="download-cv">
                                @if($Candidate->cv != '')
                                    <a href="{{asset('cv/users/'.$Candidate->cv)}}" target="_blank" title="">Download CV <i class="la la-download"></i></a>
                                @endif
                            </div>

                        </div>
                        <ul class="cand-extralink">
                            <li><a href="#about" title="">About</a></li>
                            @if($Candidate->cv != '')
                                <li><a href="#cv" title="">CV</a></li>
                            @endif
                        </ul>
                        <div class="cand-details-sec">
                            <div class="row">
                                <div class="col-lg-8 column">
                                    <div class="cand-details" id="about">
                                        <h2>Candidates About</h2>
                                        <p>{{$Candidate->Description}}</p>
                                        @if($Candidate->education_levels != '')
                                            <div class="edu-history-sec" id="education">
                                                <h2>Education Level</h2>
                                                <div class="edu-history">
                                                    <i class="la la-graduation-cap"></i>
                                                    <div class="edu-hisinfo">
                                                        <span style="margin-top: 19px">{{$Candidate->education_levels}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($Candidate->cv != '')
                                            <div class="edu-history-sec" id="cv">
                                                <h2>CV</h2>
                                                <iframe width="100%" height="1100px" src="{{url('cv/users/'.$Candidate->cv)}}"></iframe>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-lg-4 column">
                                    <div class="job-overview">
                                        <h3>Job Overview</h3>
                                        <ul>
                                            <li><i class="la la-mars-double"></i><h3>Gender</h3><span>{{$Candidate->gander}}</span></li>
                                            @if($Candidate->education_levels != '')
                                                <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>{{$Candidate->education_levels}}</span></li>
                                            @endif
                                            <li><i class="fa fa-comment"></i><h3>Email</h3><span>{{$Candidate->email}}</span></li>
                                            <li><i class="fa fa-mobile"></i><h3>Phone Number</h3><span>{{$Candidate->phone}}</span></li>
                                        </ul>
                                    </div><!-- Job Overview -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
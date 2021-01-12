@extends('layouts.master')
@section('title')
    Job Details
@stop

@section('content')

    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>{{$Job->Job_title}}</h3>
                            <div class="job-statistic">
                                <span>{{$Job->Job_type}}</span>
                                <p><i class="la la-map-marker"></i> {{$Job->cityTitle}}</p>
                                <p><i class="la la-calendar-o"></i>{{$Job->created_at->diffForHumans()}}</p>
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
                    <div class="col-lg-8 column">
                        <div class="job-single-sec">
                            <div class="job-single-head">
                                <div class="job-thumb">
                                    @if($Job->logo != '')
                                        <img style="width: 100px; height: 100px" src="{{url(asset('images'))}}/companies/{{$Job->logo}}" alt="" />
                                    @else
                                        <img style="width: 100px; height: 100px" src="{{url(asset('images'))}}/logo.png" alt="" />
                                    @endif
                                </div>
                                <div class="job-head-info">
                                    <h4>{{$Job->companeyName}}</h4>
                                    @if($Job->address != '')
                                    <span>{{$Job->address}}</span>
                                    @endif
                                    @if($Job->website != '')
                                        <p><i class="la la-unlink"></i>{{$Job->website}}</p>
                                    @endif
                                    @if($Job->phone != '')
                                        <p><i class="la la-phone"></i> {{$Job->phone}}</p>
                                    @endif
                                    @if($Job->email != '')
                                        <p><i class="la la-envelope-o"></i> {{$Job->email}}</p>
                                    @endif

                                </div>
                            </div><!-- Job Head -->
                            @if($Job->job_details != '')
                                <div class="job-details">
                                    <h3>Job Description</h3>
                                    <p>{{$Job->job_details}}</p>
                                </div>
                            @endif

                            @if($Job->other_conditions != '')
                                <div class="job-details">
                                    <h3>Other Conditions</h3>
                                    <p>{{$Job->other_conditions}}</p>
                                </div>
                            @endif

                            <div class="recent-jobs">
                                <h3>Recent Jobs</h3>
                                <div class="job-list-modern">
                                    <div class="job-listings-sec no-border">
                                        @foreach($Jobs as $Job)
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo">
                                                        @if($Job->logo != '')
                                                            <img style="width: 60px;" src="{{url(asset('images'))}}/companies/{{$Job->logo}}" alt="" />
                                                        @else
                                                            <img style="width: 60px;" src="{{url(asset('images'))}}/logo.png" alt="" />
                                                        @endif
                                                    </div>
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
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 column">
                        @if(auth()->check())
                            @include('layouts.message')
                            @if(auth()->user()->level == 'candidate')
                                <form action="{{url('apply_for_jobs')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="job_id" value="{{$Job->id}}">
                                    <button class="apply-job-button"><i class="la la-paper-plane"></i>Apply for job</button>
                                </form>
                            @endif
                        @else
                            <div class="alert alert-warning" role="alert">
                                Sign in so you can apply for the job
                            </div>
                        @endif
                        <div class="job-overview">
                            <h3>Job Overview</h3>
                            <ul>
                                @if($Job->basic_salary != '')
                                    <li><i class="la la-money"></i><h3>Offerd Salary</h3><span>{{$Job->basic_salary}}</span></li>
                                @endif
                                <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>{{$Job->qualification}}</span></li>
                                <li><i class="la la-shield"></i><h3>Experience</h3><span>{{$Job->years_of_experience}}</span></li>
                                <li><i class="la la-puzzle-piece"></i><h3>English Language</h3><span>{{$Job->english_language}}</span></li>
                                <li><i class="la la-thumb-tack"></i><h3>Computer</h3><span>{{$Job->computer}}</span></li>
                                <li><i class="la la-file-word-o "></i><h3>Microsoft Office</h3><span>{{$Job->microsoft_office}}</span></li>
                                <li><i class="la la-birthday-cake"></i><h3>Age</h3><span>{{$Job->age}}</span></li>
                                <li><i class="la la-mars-double"></i><h3>Gender</h3><span>{{$Job->gander}}</span></li>
                            </ul>
                        </div><!-- Job Overview -->

                        <div class="extra-job-info">
                            <span><i class="la la-clock-o"></i>{{$Job->created_at->diffForHumans()}}</span>
                            <span><i class="la la-file-text"></i><strong>{{$Job->apply->count()}}</strong> Application</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
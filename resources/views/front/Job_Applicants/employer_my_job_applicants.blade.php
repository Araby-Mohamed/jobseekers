@extends('layouts.master')
@section('title')
    Job seeker
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Application </h3>
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
                            <div class="emply-resume-sec">
                                <h3>Resume</h3>
                                @include('layouts.message')
                                @foreach($JobApplicants as $jobApplicant)
                                    <div class="emply-resume-list">
                                        <div class="emply-resume-thumb">
                                        @if($jobApplicant->image != '')
                                            <img style="width: 100px;height: 86px" src="{{asset('images/users/'.$jobApplicant->image)}}" alt="" />
                                        @else
                                            <img src="{{asset('images')}}/user.png" alt="" />
                                        @endif
                                    </div>
                                        <div class="emply-resume-info" style="width: 60%">
                                            <h3><a href="#" title="">{{$jobApplicant->username}}</a></h3>
                                            <span><i>{{$jobApplicant->jop_title}}</i> </span>
                                            <p><i class="la la-map-marker"></i>{{$jobApplicant->city_id()->first()->title}}</p>
                                        </div>
                                        <div class="action-resume">
                                        <a href="{{url('candidate/'.$jobApplicant->user_id)}}">
                                            <div class="action-center">
                                                <span style="text-align: center">View Profile <i class="la la-angle-right"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                        <div style="color: #999999;text-align: center;vertical-align: middle;display: table-cell;">
                                        <a href="{{url('profile/applicants/'.$jobApplicant->apply_id.'/delete')}}" class="confirm" title=""><i class="la la-trash-o"></i></a>
                                    </div>
                                    </div><!-- Emply List -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
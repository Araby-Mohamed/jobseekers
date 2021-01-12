@extends('layouts.master')
@section('title')
    Jobs
@stop

@section('content')
<section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Jobs</h3>
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
                    <div class="filterbar">
                        <h5>{{$JobsCount}} Jobs & Vacancies</h5>
                    </div>
                    @include('layouts.message')
                    <div class="job-grid-sec">
                        <div class="row">
                            @foreach($Jobs as $Job)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="job-grid border">
                                    <div class="job-title-sec">
                                        <div class="c-logo">
                                            @if($Job->logo != '')
                                                <img style="width: 100px;" src="{{url(asset('images'))}}/companies/{{$Job->logo}}" alt="" />
                                            @else
                                                <img style="width: 100px;" src="{{url(asset('images'))}}/logo.png" alt="" />
                                            @endif
                                        </div>
                                        <h3 style="text-align: center"><a href="{{url('job/'.$Job->id)}}" title="">{{$Job->Job_title}}</a></h3>
                                        <span style="text-align: center;float: initial;">{{$Job->companeyName}}</span>
                                    </div>
                                    <span class="job-lctn">{{$Job->cityTitle}}</span>
                                    @if(auth()->check())
                                        @if(auth()->user()->level == 'candidate')
                                            <form action="{{url('apply_for_jobs')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="job_id" value="{{$Job->id}}">
                                                <button>APPLY NOW</button>
                                            </form>
                                        @endif
                                    @else
                                        <a href="{{url('job/'.$Job->id)}}">View Details</a>
                                    @endif
                                </div><!-- JOB Grid -->
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination">
                        <ul>
                            {{$Jobs->links()}}
                        </ul>
                    </div><!-- Pagination -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
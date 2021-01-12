@extends('admin.layouts.master')

@section('title')
    Jobseekers | Find a Job
@endsection


@section('content')
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <div class="container">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>Jobseekers
                                    <small> | Find a Job.</small>
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                            <!-- BEGIN PAGE TOOLBAR -->
                            <div class="page-toolbar">
                                <!-- BEGIN THEME PANEL -->
                                <div class="btn-group btn-theme-panel">
                                </div>
                                <!-- END THEME PANEL -->
                            </div>
                            <!-- END PAGE TOOLBAR -->
                        </div>
                    </div>
                    <!-- END PAGE HEAD-->

                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">
                            <!-- BEGIN PAGE BREADCRUMBS -->
            
                            <!-- END PAGE BREADCRUMBS -->
                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">
                                <div class="row">

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat2 ">
                                            <div class="display">
                                                <div class="number">
                                                    <h3 class="font-green-sharp">
                                                        <span data-counter="counterup" data-value="{{ $employer }}">0</span>
                                                        <small class="font-green-sharp"></small>
                                                    </h3>
                                                    <small>Employers</small>
                                                </div>
                                                <div class="icon">
                                                    <i class="icon-note"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat2 ">
                                            <div class="display">
                                                <div class="number">
                                                    <h3 class="font-red-haze">
                                                        <span data-counter="counterup" data-value="{{ $candidate }}">0</span>
                                                    </h3>
                                                    <small>Candidate</small>
                                                </div>
                                                <div class="icon">
                                                    <i class="icon-direction"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat2 ">
                                            <div class="display">
                                                <div class="number">
                                                    <h3 class="font-blue-sharp">
                                                        <span data-counter="counterup" data-value="{{ $work }}"></span>
                                                    </h3>
                                                    <small>Works</small>
                                                </div>
                                                <div class="icon">
                                                    <i class="icon-puzzle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat2 ">
                                            <div class="display">
                                                <div class="number">
                                                    <h3 class="font-purple-soft">
                                                        <span data-counter="counterup" data-value="{{$jobs}}"></span>
                                                    </h3>
                                                    <small>Jobs</small>
                                                </div>
                                                <div class="icon">
                                                    <i class="icon-like"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-12 col-xs-12 col-sm-12">--}}
                                        {{--<div class="portlet light ">--}}
                                            {{--<div class="portlet-title">--}}
                                                {{--<div class="caption">--}}
                                                    {{--<i class="icon-cursor font-dark hide"></i>--}}
                                                    {{--<span class="caption-subject font-dark bold uppercase">General Stats</span>--}}
                                                {{--</div>--}}
                                                {{--<div class="actions">--}}
                                                    {{--<a href="javascript:;" class="btn btn-sm btn-circle red easy-pie-chart-reload">--}}
                                                        {{--<i class="fa fa-repeat"></i> Reload </a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="portlet-body">--}}
                                                {{--<div class="row">--}}
                                                    {{--<div class="col-md-4">--}}
                                                        {{--<div class="easy-pie-chart">--}}
                                                            {{--<div class="number transactions" data-percent="55">--}}
                                                                {{--<span>55</span>% </div>--}}
                                                            {{--<a class="title" href="javascript:;"> Attendence--}}
                                                                {{--<i class="icon-arrow-right"></i>--}}
                                                            {{--</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="margin-bottom-10 visible-sm"> </div>--}}
                                                    {{--<div class="col-md-4">--}}
                                                        {{--<div class="easy-pie-chart">--}}
                                                            {{--<div class="number visits" data-percent="85">--}}
                                                                {{--<span>85</span>% </div>--}}
                                                            {{--<a class="title" href="javascript:;"> Quiz--}}
                                                                {{--<i class="icon-arrow-right"></i>--}}
                                                            {{--</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="margin-bottom-10 visible-sm"> </div>--}}
                                                    {{--<div class="col-md-4">--}}
                                                        {{--<div class="easy-pie-chart">--}}
                                                            {{--<div class="number bounce" data-percent="46">--}}
                                                                {{--<span>46</span>% </div>--}}
                                                            {{--<a class="title" href="javascript:;"> Assignment--}}
                                                                {{--<i class="icon-arrow-right"></i>--}}
                                                            {{--</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            </div>
                            <!-- END PAGE CONTENT INNER -->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->

                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>

@stop


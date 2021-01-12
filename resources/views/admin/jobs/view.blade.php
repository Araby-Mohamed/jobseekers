@extends('admin.layouts.master')

@section('title')
    Details Company
@stop

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
                                <h1>Details Job</h1>
                            </div>
                            <!-- END PAGE TITLE -->

                        </div>
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">

                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">
                                <div class="profile">
                                    <div class="tabbable-line tabbable-full-width">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <!-- BEGIN PROFILE SIDEBAR -->
                                                        <div class="profile-sidebar">
                                                            <!-- PORTLET MAIN -->
                                                            <div class="portlet light profile-sidebar-portlet ">
                                                                <!-- SIDEBAR USERPIC -->
                                                                <div class="profile-userpic">
                                                                    @if($job->logo != "")
                                                                        <img style="width: 128px; height: 128px;"  class="img-responsive" src="{{asset('images/companies/'.$job->logo)}}">
                                                                    @else
                                                                        <img src="{{asset('admin')}}/assets/img/logo.png">
                                                                    @endif
                                                                </div>
                                                                <!-- END SIDEBAR USERPIC -->
                                                                <!-- SIDEBAR USER TITLE -->
                                                                <div class="profile-usertitle">
                                                                    <div class="profile-usertitle-name"> {{ $job->username }} </div>
                                                                    <div class="profile-usertitle-job"> {{ $job->email }} </div>
                                                                </div>
                                                                <!-- END SIDEBAR USER TITLE -->
                                                            </div>
                                                            <!-- END PORTLET MAIN -->
                                                        </div>
                                                        <!-- END BEGIN PROFILE SIDEBAR -->
                                                    </div>


                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-12 profile-info">
                                                                <h1 class="font-green sbold uppercase">{{ $job->Job_title }}</h1>
                                                                <p> <span>Company: </span> {{ $job->companyName }} </p>
                                                                <p> <span>Email: </span> {{ ($job->email_company != '') ? $job->email_company : '-----' }} </p>
                                                                <p> <span>Phone: </span> {{ $job->phone }} </p>

                                                                <div class="company_details">
                                                                    <h2>Job Details:</h2>

                                                                    <div class="com_view">
                                                                        <p><span>Experience: </span> {{ $job->years_of_experience }}</p>
                                                                        <p><span>Computer: </span> {{ $job->computer }}</p>
                                                                        <p><span>Gander: </span> {{ $job->gander }}</p>
                                                                        <p><span>Qualification: </span> {{ $job->qualification }}</p>
                                                                        <p><span>English Language: </span> {{ $job->english_language }}</p>
                                                                        <p><span>Microsoft Office:</span>{{ $job->microsoft_office }}</p>
                                                                        <p><span>Age:</span>{{ $job->age }}</p>
                                                                        <p><span>Offered Salary: </span> {{ $job->basic_salary }} </p>
                                                                        <p><span>Job Type: </span> {{ $job->Job_type }}</p>
                                                                        <p><span>City: </span> {{ $job->cityTitle }}</p>
                                                                        <p><span>Employment</span> {{$job->employmentsTitle }} </p>
                                                                        <p><span>Job Details</span>{{ $job->job_details }}</p>
                                                                        <p><span>Other Conditions</span>{{ $job->other_conditions }}</p>
                                                                        <p><span>Created At</span>{{$job->created_at->diffForHumans()}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-md-8-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE CONTENT INNER -->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>
@endsection


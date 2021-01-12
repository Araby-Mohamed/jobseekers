@extends('admin.layouts.master')

@section('title')
    Details Employer
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
                                <h1>Details Employer</h1>
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
                                                                    @if($employer->image != "")
                                                                        <img style="width: 128px; height: 128px;"  class="img-responsive" src="{{asset('images/users/'.$employer->image)}}">
                                                                    @else
                                                                        <img src="{{asset('admin')}}/assets/img/user.png">
                                                                    @endif
                                                                </div>
                                                                <!-- END SIDEBAR USERPIC -->
                                                                <!-- SIDEBAR USER TITLE -->
                                                                <div class="profile-usertitle">
                                                                    <div class="profile-usertitle-name"> {{ $employer->username }} </div>
                                                                    <div class="profile-usertitle-job"> {{ $employer->email }} </div>
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
                                                                <h1 class="font-green sbold uppercase">{{ $employer->username }}</h1>
                                                                <p> <span>First Name: </span> {{ $employer->first_name }} </p>
                                                                <p> <span>Last Name: </span> {{ $employer->last_name }} </p>
                                                                <p> <span>Email: </span> {{ $employer->email }} </p>
                                                                <p> <span>Phone: </span> {{ $employer->phone }} </p>

                                                                <div class="company_details">
                                                                    <h2>Company Details:</h2>

                                                                    <div class="com_view">
                                                                        <p><span>Company Name: </span> {{ $employer->companyTitle }}</p>
                                                                        <p><span>Company City: </span> {{ $employer->titleCity }}</p>
                                                                        <p><span>Company Employment: </span> {{ $employer->titleEmployments }}</p>
                                                                        @if($employer->address != '')
                                                                            <p><span>Company Address: </span> {{ $employer->address }}</p>
                                                                        @else
                                                                            -----
                                                                        @endif
                                                                        @if($employer->email_company != '')
                                                                            <p><span>Company E-mail: </span> {{ $employer->email_company }}</p>
                                                                        @else
                                                                            <p><span>Company E-mail: </span> ----- </p>
                                                                        @endif

                                                                        @if($employer->Description != '')
                                                                            <p><span>Company Description: </span> {{ $employer->Description }}
                                                                        @else
                                                                            <p><span>Company Description: </span> ----- </p>
                                                                        @endif
                                                                        <p><span>Company Website: </span>
                                                                            @if($employer->website != "")
                                                                                <a target="_blank" href="{{ $employer->website }}"><i class="fa fa-link"></i> </a>
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>
                                                                        <p><span>Company Facebook: </span>
                                                                            @if($employer->facebook != "")
                                                                                <a target="_blank" href="{{ $employer->facebook }}"><i class="fa fa-facebook"></i> </a>
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>
                                                                        <p><span>Company Twitter: </span>
                                                                            @if($employer->twitter != "")
                                                                                <a target="_blank" href="{{ $employer->twitter }}"><i class="fa fa-twitter"></i> </a>
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>
                                                                        <p><span>Company Linkedin: </span>
                                                                            @if($employer->linkedin != "")
                                                                                <a target="_blank" href="{{ $employer->linkedin }}"><i class="fa fa-linkedin"></i> </a>
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>

                                                                        <p><span>Company Logo: </span>
                                                                            @if($employer->logo != "")
                                                                                <img src="{{ asset('images/companies/'.$employer->logo) }}">
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                @if($employer->accept == 0)
                                                                    <div class="accept_user">
                                                                        <a title="Accept Employer" class="confirm" href="{{ url('admin/employers/'.$employer->id.'/accept') }}"><i class="fa fa-check"></i></a>
                                                                    </div>
                                                                @endif

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

@section('quick')
    <nav class="quick-nav">
        <a class="quick-nav-trigger" href="#0">
            <span aria-hidden="true"></span>
        </a>
        <ul>

            <li>
                <a href="{{url('admin/employers/'.$employer->id.'/edit')}}" >
                    <span>Edit Employer</span>
                    <i class="fa fa-edit"></i>
                </a>
            </li>

            <li>
                <a href="{{url('admin/employers')}}" >
                    <span>Employers</span>
                    <i class="fa fa-users"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection

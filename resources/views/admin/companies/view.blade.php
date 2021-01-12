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
                                <h1>Details Company</h1>
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
                                                                    <img style="width: 128px; height: 128px;"  class="img-responsive" src="{{asset('images/companies/'.$company->logo)}}">
                                                                </div>
                                                                <!-- END SIDEBAR USERPIC -->
                                                                <!-- SIDEBAR USER TITLE -->
                                                                <div class="profile-usertitle">
                                                                    <div class="profile-usertitle-name"> {{ $company->title }} </div>
                                                                    <div class="profile-usertitle-job"> {{ $company->email }} </div>
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
                                                                <h1 class="font-green sbold uppercase">{{ $company->title }}</h1>
                                                                <div class="company_details">
                                                                    <h2>Company Details:</h2>

                                                                    <div class="com_view">
                                                                        <p><span>Company Name: </span> {{ $company->title }}</p>
                                                                        <p><span>Company City: </span> {{ $company->company_city }}</p>
                                                                        <p><span>Company Address: </span> {{ $company->address }} </p>
                                                                        <p><span>Company Employment: </span> {{ $company->work }}</p>
                                                                        <p><span>Company Address: </span> {{ $company->address }}</p>
                                                                        <p><span>Company E-mail: </span> {{$company->email_company}}</p>
                                                                        <p><span>Description: </span> {{$company->Description}} </p>
                                                                        <p><span>Company Website: </span>
                                                                            @if($company->website != "")
                                                                                <a target="_blank" href="{{ $company->website }}"><i class="fa fa-link"></i> </a>
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>
                                                                        <p><span>Company Facebook: </span>
                                                                            @if($company->facebook != "")
                                                                                <a target="_blank" href="{{ $company->facebook }}"><i class="fa fa-facebook"></i> </a>
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>
                                                                        <p><span>Company Twitter: </span>
                                                                            @if($company->twitter != "")
                                                                                <a target="_blank" href="{{ $company->twitter }}"><i class="fa fa-twitter"></i> </a>
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>
                                                                        <p><span>Company Linkedin: </span>
                                                                            @if($company->twitter != "")
                                                                                <a target="_blank" href="{{ $company->linkedin }}"><i class="fa fa-linkedin"></i> </a>
                                                                            @else
                                                                                -----
                                                                            @endif
                                                                        </p>
                                                                        <p><span>Created BY: </span> <a class="view_created_by" href="{{ url('admin/employers/'.$company->user_id.'/view') }}">{{ $company->username }}</a> </p>
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

@section('quick')
    <nav class="quick-nav">
        <a class="quick-nav-trigger" href="#0">
            <span aria-hidden="true"></span>
        </a>
        <ul>

            <li>
                <a href="{{url('admin/companies/'.$company->id.'/edit')}}" >
                    <span>Edit Company</span>
                    <i class="fa fa-edit"></i>
                </a>
            </li>

            <li>
                <a href="{{url('admin/companies')}}" >
                    <span>Companies</span>
                    <i class="fa fa-building"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection
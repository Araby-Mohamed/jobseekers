@extends('admin.layouts.master')

@section('title')
    Admins
@stop

@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
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
                                <h1>Admins
                                    <small>public info</small>
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                            <!-- BEGIN PAGE TOOLBAR -->
                            <div class="page-toolbar">
                                <!-- BEGIN THEME PANEL -->

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
                                    <div class="col-lg-12 col-xs-12 col-sm-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Admins</span>
                                                </div>

                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">

                                                    @foreach($admins as $admin)
                                                    <div class="col-md-4">
                                                        <!--begin: widget 1-1 -->
                                                        <div class="mt-widget-1">

                                                            <div class="mt-img">
                                                                <img src="{{asset('admin')}}/assets/img/user.png"> </div>
                                                            <div class="mt-body">
                                                                <h3 class="mt-username">{{ $admin->username }}</h3>
                                                                <p class="pareg"> {{ $admin->email }} </p>
                                                                <div class="mt-stats">
                                                                    <div class="btn-group btn-group btn-group-justified">
                                                                        <a href="{{ url('admin/admins/'.$admin->id.'/view') }}" class="btn font-yellow">
                                                                            <i class="icon-eye"></i> View </a>
                                                                        <a href="{{ url('admin/admins/'.$admin->id.'/edit') }}" class="btn font-green">
                                                                            <i class="fa fa-edit"></i> Edit </a>
                                                                        <a href="{{ url('admin/admins/'.$admin->id.'/delete') }}" class="btn confirm font-red">
                                                                            <i class="icon-trash"></i> Delete </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end: widget 1-1 -->
                                                    </div>
                                                    @endforeach

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
    @if(auth()->guard('admin')->check())
        <nav class="quick-nav">
            <a class="quick-nav-trigger" href="#0">
                <i class="add-nav-icon quick-nav fa fa-plus"></i>
            </a>
            <ul>

                <li>
                    <a href="{{url('admin/admins/create')}}" >
                        <span>Add Admin</span>
                        <i class="icon-user"></i>
                    </a>
                </li>

            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav>
        <div class="quick-nav-overlay"></div>
    @endif

@endsection

@section('js')

@endsection

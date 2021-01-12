@extends('admin.layouts.master')

@section('title')
    Companies
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
                                <h1>Companies</h1>
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
                                                    <span class="caption-subject font-green-haze bold uppercase">Companies</span>
                                                </div>

                                            </div>
                                            <div class="portlet-body">

                                                <div class="msg_show">
                                                    @if(Session::has('success'))
                                                        <div class="alert alert-success">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{Session::get('success')}}
                                                        </div>
                                                    @endif


                                                        @if(Session::has('warning'))
                                                            <div class="alert alert-warning">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                {{Session::get('warning')}}
                                                            </div>
                                                        @endif

                                                    @if(count($errors) > 0)
                                                        <div class="alert alert-danger">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <ul>
                                                                @foreach($errors->all() as $error)
                                                                    <li>{{$error}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>


                                                <div class="tabbable-bordered">
                                                    <div class="row">
                                                        @if(count($companies) > 0)
                                                            @foreach($companies as $company)
                                                                <div class="col-md-4">
                                                                    <div class="company">
                                                                        <a href="{{ url('admin/companies/'.$company->id.'/view') }}">
                                                                            <div class="company_image">
                                                                                <img src="{{ asset('images/companies/'.$company->logo) }}">

                                                                                <div class="overlay_company">
                                                                                    <div class="icon_overlay_company">
                                                                                        <i class="fa fa-link"></i>
                                                                                    </div>
                                                                                </div><!-- /.overlay_company -->
                                                                            </div><!-- /.company _image -->

                                                                            <div class="company_info_data">
                                                                                <h3>{{ $company->title }}</h3>
                                                                                <a href="{{ url('admin/employers/'.$company->user_id.'/view') }}" class="view_details_employer">
                                                                                    {{ $company->username }}
                                                                                </a>

                                                                                <div class="control_companies">
                                                                                    <a href="{{ url('admin/companies/'.$company->id.'/edit') }}" class="edit_company" title="Edit Company">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </a>

                                                                                    <a href="{{ url('admin/companies/'.$company->id.'/view') }}" class="view_company" title="View Company">
                                                                                        <i class="fa fa-eye"></i>
                                                                                    </a>
                                                                                </div><!-- /.control_companies -->
                                                                            </div><!-- /.company_info -->
                                                                        </a>
                                                                    </div><!-- /.company -->
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <p class="not_data">There are no data :(</p>
                                                        @endif
                                                    </div><!-- /.row -->

                                                    <div class="text-center">
                                                        {!! $companies->render() !!}
                                                    </div>
                                                </div>
                                            </div><!-- /.portlet-body -->
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



@stop

@section('quick')
    <nav class="quick-nav">
        <a class="quick-nav-trigger" href="#0">
            <span aria-hidden="true"></span>
        </a>
        <ul>

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
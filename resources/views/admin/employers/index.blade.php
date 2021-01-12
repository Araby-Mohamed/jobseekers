@extends('admin.layouts.master')

@section('title')
    Employers
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
                                <h1>Employers</h1>
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
                                                    <span class="caption-subject font-green-haze bold uppercase">Employers</span>
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
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#accepted" data-toggle="tab"> Accepted </a>
                                                        </li>
                                                    </ul>


                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="accepted">
                                                            <div class="row">
                                                                @if(count($employers) > 0)
                                                                    @foreach($employers as $employer)
                                                                        <div class="col-md-4">
                                                                            <!--begin: widget 1-1 -->
                                                                            <div class="mt-widget-1">

                                                                                <div class="mt-img">
                                                                                    @if($employer->image != "")
                                                                                        <img style="width: 128px; height: 128px;" src="{{asset('images/users/'.$employer->image)}}">
                                                                                    @else
                                                                                        <img src="{{asset('admin')}}/assets/img/user.png">
                                                                                    @endif
                                                                                </div>

                                                                                <div class="mt-body">
                                                                                    <h3 class="mt-username">{{ $employer->username }}</h3>
                                                                                    <p class="pareg"> {{ $employer->email }} </p>
                                                                                    <div class="mt-stats">
                                                                                        <div class="btn-group btn-group btn-group-justified">
                                                                                            <a href="{{ url('admin/employers/'.$employer->id.'/view') }}" class="btn font-yellow">
                                                                                                <i class="icon-eye"></i> View </a>
                                                                                            <a href="{{ url('admin/employers/'.$employer->id.'/edit') }}" class="btn font-green">
                                                                                                <i class="fa fa-edit"></i> Edit </a>

                                                                                            @if(auth()->guard('admin')->user()->level == 2)
                                                                                            <a href="{{ url('admin/employers/'.$employer->id.'/delete') }}" class="btn confirm font-red">
                                                                                                <i class="icon-trash"></i> Delete </a>
                                                                                            @endif

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--end: widget 1-1 -->
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <p class="not_data">There are no data :(</p>
                                                                @endif
                                                            </div><!-- /.row -->

                                                            <div class="text-center">
                                                                {!! $employers->render() !!}
                                                            </div>
                                                        </div><!-- /.tab-pane -->

                                                    </div><!-- /.tab-content -->
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
    @if(auth()->guard('admin')->check())
        <nav class="quick-nav">
            <a class="quick-nav-trigger" href="#0">
                <i class="add-nav-icon quick-nav fa fa-plus"></i>
            </a>
            <ul>

                <li>
                    <a href="{{url('admin/employers/create')}}" >
                        <span>Add Employer</span>
                        <i class="fa fa-plus"></i>
                    </a>
                </li>

            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav>
        <div class="quick-nav-overlay"></div>
    @endif

@endsection
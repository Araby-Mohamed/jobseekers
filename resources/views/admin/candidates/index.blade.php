@extends('admin.layouts.master')

@section('title')
    Candidates
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
                                <h1>Candidates</h1>
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
                                                    <span class="caption-subject font-green-haze bold uppercase">Candidates</span>
                                                </div>

                                            </div>
                                            <div class="portlet-body">
                                                <div>
                                                    @if(Session::has('success'))
                                                        <div class="alert alert-success">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{Session::get('success')}}
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


                                                <div class="row">
                                                    @foreach($candidates as $candidate)
                                                    <div class="col-md-4">
                                                        <!--begin: widget 1-1 -->
                                                        <div class="mt-widget-1">

                                                            <div class="mt-img">
                                                                @if($candidate->image != "")
                                                                    <img style="width: 128px; height: 128px;" src="{{asset('images/users/'.$candidate->image)}}">
                                                                @else
                                                                    <img src="{{asset('admin')}}/assets/img/user.png">
                                                                @endif
                                                            </div>

                                                            <div class="mt-body">
                                                                <h3 class="mt-username">{{ $candidate->username }}</h3>
                                                                <p class="pareg"> {{ $candidate->email }} </p>
                                                                <div class="mt-stats">
                                                                    <div class="btn-group btn-group btn-group-justified">
                                                                        <a href="{{ url('admin/candidates/'.$candidate->id.'/view') }}" class="btn font-yellow">
                                                                            <i class="icon-eye"></i> View </a>
                                                                        <a href="{{ url('admin/candidates/'.$candidate->id.'/edit') }}" class="btn font-green">
                                                                            <i class="fa fa-edit"></i> Edit </a>

                                                                        @if(auth()->guard('admin')->user()->level == 2)
                                                                        <a href="{{ url('admin/candidates/'.$candidate->id.'/delete') }}" class="btn confirm font-red">
                                                                            <i class="icon-trash"></i> Delete </a>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end: widget 1-1 -->
                                                    </div>
                                                    @endforeach
                                                </div><!-- /.row -->

                                                <div class="text-center">
                                                    {!! $candidates->render() !!}
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
                            <a href="{{url('admin/candidates/create')}}" >
                                <span>Add Candidate</span>
                                <i class="fa fa-plus"></i>
                            </a>
                        </li>

                    </ul>
                    <span aria-hidden="true" class="quick-nav-bg"></span>
                </nav>
                <div class="quick-nav-overlay"></div>
    @endif

@endsection

@extends('admin.layouts.master')

@section('title')
    Works
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('line-awesome') }}/icons.css">
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
                                <h1>Works</h1>
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
                                                    <span class="caption-subject font-green-haze bold uppercase">Works</span>
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
                                                    <div class="col-md-12">

                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th> Title </th>
                                                                <th> Icon </th>
                                                                <th> Control </th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?php $countP = 1; ?>
                                                            @foreach($works as $work)

                                                                <tr>
                                                                    <td>{{ $countP }}</td>
                                                                    <td> {{ $work->title }} </td>
                                                                    <td class="icon_awesome"> <i class="la {{ $work->icon }}"></i> </td>
                                                                    <td>
                                                                        <a href="{{ url('admin/works/'.$work->id.'/edit') }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                                        <a href="{{ url('admin/works/'.$work->id.'/delete') }}" class="confirm btn btn-danger"><i class="fa fa-trash"></i></a>
                                                                    </td>

                                                                    <?php $countP++; ?>
                                                                </tr>

                                                            @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div><!-- /.row -->
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
                            <a href="{{url('admin/works/create')}}" >
                                <span>Add Work</span>
                                <i class="fa fa-gear"></i>
                            </a>
                        </li>

                    </ul>
                    <span aria-hidden="true" class="quick-nav-bg"></span>
                </nav>
                <div class="quick-nav-overlay"></div>
    @endif

@endsection

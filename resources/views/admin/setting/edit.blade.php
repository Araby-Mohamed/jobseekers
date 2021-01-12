@extends('admin.layouts.master')


@section('title')
    Setting
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
                                <h1>Setting
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
                                    <div class="col-lg-12 col-xs-12 col-sm-12">
                                        <div class="tab-pane" id="tab_2">

                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-equalizer font-green-haze"></i>
                                                        <span class="caption-subject font-green-haze bold uppercase">Setting</span>
                                                        <span class="caption-helper"> info...</span>
                                                    </div>

                                                </div>
                                                <div class="portlet-body form">

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

                                                    <!-- BEGIN FORM-->
                                                    <form role="form" method="post" action="{{ url('admin/setting/update') }}" class="form-horizontal" enctype="multipart/form-data">

                                                        {{ csrf_field() }}

                                                        <div class="form-body">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Site name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" name="site_name" value="{{ $setting->site_name }}" class="form-control" placeholder="Enter site name">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Email</label>
                                                                        <div class="col-md-9">
                                                                            <input type="email" name="email" value="{{ $setting->email }}" class="form-control" placeholder="Enter Email">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Phone 1</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" name="phone_1" value="{{ $setting->phone_1 }}" class="form-control" placeholder="Enter Phone 1">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Phone 2</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" name="phone_2" value="{{ $setting->phone_2 }}" class="form-control" placeholder="Enter Phone 2">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Address</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" name="address" value="{{ $setting->address }}" class="form-control" placeholder="Enter Address">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">File</label>
                                                                        <div class="col-md-9">
                                                                            <div>
                                                                                <a class="view_file" target="_blank" title="View File" href="{{ asset('files/setting').'/'.$setting->file}}">
                                                                                    <i class="fa fa-eye"></i>
                                                                                </a>
                                                                            </div>
                                                                            <input type="file" name="file" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Logo</label>
                                                                        <div class="col-md-9">
                                                                            <div>
                                                                                <img style="height:100px; margin-bottom: 10px;" src="{{ asset('images') }}/setting/{{ $setting->logo }}">
                                                                            </div>
                                                                            <input type="file" name="logo" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Favicon</label>
                                                                        <div class="col-md-9">
                                                                            <div>
                                                                                <img style="height:100px; margin-bottom: 10px;" src="{{ asset('images') }}/setting/{{ $setting->favicon }}">
                                                                            </div>
                                                                            <input type="file" name="favicon" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Facebook</label>
                                                                        <div class="col-md-9">
                                                                            <input type="url" name="facebook" value="{{ $setting->facebook }}" class="form-control" placeholder="Enter facebook link">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Linked in</label>
                                                                        <div class="col-md-9">
                                                                            <input type="url" name="linkedin" value="{{ $setting->linkedin }}" class="form-control" placeholder="Enter linked in link">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Instagram</label>
                                                                        <div class="col-md-9">
                                                                            <input type="url" name="instagram" value="{{ $setting->instagram }}" class="form-control" placeholder="Enter instagram link">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Telephone</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" name="telephone" value="{{ $setting->telephone }}" class="form-control" placeholder="Enter telephone">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Description</label>
                                                                        <div class="col-md-9">
                                                                            <textarea placeholder="Enter description" name="description" class="form-control">{!! nl2br($setting->description) !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label col-md-3">Keywords</label>
                                                                        <div class="col-md-9">
                                                                            <textarea placeholder="Enter keywords" name="keywords" class="form-control">{!! nl2br($setting->keywords) !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <!--/row-->

                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <button type="submit" class="btn green">Submit</button>
                                                                            <a href="{{ url('admin/home') }}" class="btn default">Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"> </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
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
                <!-- BEGIN QUICK SIDEBAR -->

                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>
@endsection



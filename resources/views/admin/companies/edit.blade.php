@extends('admin.layouts.master')


@section('title')
    Edit Company
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
                                <h1>Edit Company
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Edit Company</span>
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
                                                    <form role="form" method="post" action="{{ url('admin/companies/'.$company->id.'/update') }}" enctype="multipart/form-data">

                                                        {{ csrf_field() }}

                                                        <div class="form-body">
                                                            <div class="row">

                                                                <div class="col-md-12">
                                                                    <div class="company_info">
                                                                        <h3>Company Info...</h3>


                                                                        <div class="form_section">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                                                    <label>Title <span class="required">*</span> </label>
                                                                                    <input type="text" id="title" name="title" value="{{ $company->title or old('title') }}" class="form-control" placeholder="Enter Title">
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->

                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                                                    <label>City <span class="required">*</span> </label>
                                                                                    <select id="city" name="city" class="form-control bs-select" data-live-search="true" data-size="8" tabindex="-98">
                                                                                        <option disabled="disabled" selected value="">Choose City</option>

                                                                                        @foreach($cities as $city)
                                                                                            <option {{ $company->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->title }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->

                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('work') ? ' has-error' : '' }}">
                                                                                    <label>Employment <span class="required">*</span> </label>
                                                                                    <select id="work" name="work" class="form-control bs-select" data-live-search="true" data-size="8" tabindex="-98">
                                                                                        <option disabled="disabled" selected value="">Choose Employment</option>

                                                                                        @foreach($works as $work)
                                                                                            <option {{ $company->employment_id == $work->id ? 'selected' : '' }} value="{{ $work->id }}">{{ $work->title }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->

                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('email_company') ? ' has-error' : '' }}">
                                                                                    <label>Company E-mail <span class="required">*</span> </label>
                                                                                    <input type="email" id="email_company" name="email_company" value="{{ $company->email_company or old('email_company') }}" class="form-control" placeholder="Enter Company E-mail">
                                                                                </div>
                                                                            </div><!-- /.col-md-6 -->

                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                                                    <label>Address <span class="required">*</span> </label>
                                                                                    <input type="text" id="address" name="address" value="{{ $company->address or old('address') }}" class="form-control" placeholder="Enter Address">
                                                                                </div>
                                                                            </div><!-- /.col-md-6 -->

                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                                                                    <label>Logo</label>
                                                                                    <input type="file" id="logo" name="logo" class="form-control">
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->

                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                                                                    <label>Website</label>
                                                                                    <input type="url" id="website" name="website" value="{{ $company->website or old('website') }}" class="form-control" placeholder="Enter Website">
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->


                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                                                                    <label>Facebook</label>
                                                                                    <input type="url" id="facebook" name="facebook" value="{{ $company->facebook or old('facebook') }}" class="form-control" placeholder="Enter Facebook">
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->

                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                                                                    <label>Twitter</label>
                                                                                    <input type="url" id="twitter" name="twitter" value="{{ $company->twitter or old('twitter') }}" class="form-control" placeholder="Enter Twitter">
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->

                                                                            <div class="col-md-4">
                                                                                <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                                                                                    <label>Linkedin</label>
                                                                                    <input type="url" id="linkedin" name="linkedin" value="{{ $company->linkedin or old('linkedin') }}" class="form-control" placeholder="Enter Linkedin">
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->

                                                                            <div class="col-md-8">
                                                                                <div class="form-group{{ $errors->has('Description') ? ' has-error' : '' }}">
                                                                                    <label>Description</label>
                                                                                    <textarea class="form-control" name="Description" placeholder="Enter Description">{{$company->Description or old('Description')}}</textarea>
                                                                                </div>
                                                                            </div><!-- /.col-md-4 -->

                                                                            <div class="clear"></div>
                                                                        </div><!-- /.form_section -->
                                                                    </div><!-- /.company_info -->
                                                                </div><!-- /.col-md-12 -->

                                                            </div><!-- /.row -->
                                                        </div><!-- /.form-body -->

                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <button type="submit" class="btn green">Save</button>
                                                                            <a href="{{ url('admin/companies') }}" class="btn default">Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"> </div>
                                                            </div>
                                                        </div><!-- /.form-actions -->

                                                    </form>


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
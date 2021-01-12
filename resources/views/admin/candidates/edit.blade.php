@extends('admin.layouts.master')


@section('title')
    Edit Candidate
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('admin').'/assets/css/style.bundle.css' }}">
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
                                <h1>Edit Candidate
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Edit Candidate</span>
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
                                                    <form role="form" method="post" action="{{ url('admin/candidates/'.$candidate->id.'/update') }}" enctype="multipart/form-data">

                                                        {{ csrf_field() }}

                                                        <div class="form-body">
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                                                        <label>Username <span class="required">*</span> </label>
                                                                        <input type="text" id="username" name="username" value="{{ $candidate->username or old('username') }}" class="form-control" placeholder="Enter Username">
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                                        <label>First Name <span class="required">*</span> </label>
                                                                        <input type="text" id="first_name" name="first_name" value="{{ $candidate->first_name or old('first_name') }}" class="form-control" placeholder="Enter First Name">
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                                        <label>Last Name <span class="required">*</span> </label>
                                                                        <input type="text" id="last_name" name="last_name" value="{{ $candidate->last_name or old('last_name') }}" class="form-control" placeholder="Enter Last Name">
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                                        <label>Email <span class="required">*</span> </label>
                                                                        <input type="email" id="email" name="email" value="{{ $candidate->email or old('email') }}" class="form-control" placeholder="Enter Email">
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                                        <label>Password <span class="required">*</span> </label>
                                                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                                        <label>Phone <span class="required">*</span> </label>
                                                                        <input type="text" id="phone" name="phone" value="{{ $candidate->phone or old('phone') }}" class="form-control" placeholder="Enter Phone">
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                                                                        <label>City <span class="required">*</span></label>
                                                                        <select id="city_id" name="city_id" required class="form-control bs-select" data-live-search="true" data-size="8" tabindex="-98">
                                                                            <option disabled="disabled" selected value="">Choose Your City</option>
                                                                            @foreach($cities as $city)
                                                                                <option value="{{$city->id}}" {{ ($city->id == $candidate->city_id) ? 'selected' : '' }}>{{$city->title}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                                                        <label>Image</label>
                                                                        <input type="file" id="image" name="image" class="form-control">
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-4">
                                                                    <div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">
                                                                        <label>CV</label>
                                                                        <input type="file" id="cv" name="cv" class="form-control">
                                                                    </div>
                                                                </div><!-- /.col-md-4 -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                                                        <label>Birthday</label>
                                                                        <div class="input-group date">
                                                                            <input type="text" class="form-control m-input" name="birthday" placeholder="Select date" value="{{$candidate->birthday or old('birthday')}}" id="m_datetimepicker_6" id="birthday">
                                                                            <div class="input-group-append">
							                                                    <span class="input-group-text">
                                                                                    <i class="fa fa-calendar"></i>
							                                                    </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.col-md-3 -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group{{ $errors->has('gander') ? ' has-error' : '' }}">
                                                                        <label>Gander <span class="required">*</span> </label>
                                                                        <select id="gander" name="gander" required class="form-control bs-select" data-live-search="true" data-size="8" tabindex="-98">
                                                                            <option disabled="disabled" selected value="">Choose gander</option>
                                                                            <option value="Male" {{ ($candidate->gander == 'Male') ? 'selected' : '' }}>Male</option>
                                                                            <option value="Female" {{ ($candidate->gander == 'Female') ? 'selected' : '' }}>Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!-- /.col-md-3 -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group{{ $errors->has('jop_title') ? 'has-error' : '' }}">
                                                                        <label>Job Title <span class="required">*</span></label>
                                                                        <input type="text" required name="jop_title" class="form-control" id="jop_title" value="{{ $candidate->jop_title or old('jop_title') }}" placeholder="Enter Job Title">
                                                                    </div>
                                                                </div><!-- /.col-md-3 -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group{{ $errors->has('education_levels') ? 'has-error' : '' }}">
                                                                        <label>Education Levels</label>
                                                                        <select id="education_levels" name="education_levels" required class="form-control bs-select" data-live-search="true" data-size="8" tabindex="-98">
                                                                            <option disabled="disabled" selected value="">Choose Education Levels</option>
                                                                            <option value="Student" {{ ($candidate->education_levels == 'Student') ? 'selected' : '' }}>Student</option>
                                                                            <option value="Diploma" {{ ($candidate->education_levels == 'Diploma') ? 'selected' : '' }}>Diploma</option>
                                                                            <option value="Bachelor" {{ ($candidate->education_levels == 'Bachelor') ? 'selected' : '' }}>Bachelor</option>
                                                                            <option value="Graduate" {{ ($candidate->education_levels == 'Graduate') ? 'selected' : '' }}>Graduate</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!-- /.col-md-3 -->

                                                                <div class="col-md-12">
                                                                    <div class="form-group{{ $errors->has('Description') ? 'has-error' : '' }}">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control" id="Description" name="Description" rows="10" placeholder="Enter Description">{{ $candidate->Description or old('Description') }}</textarea>
                                                                    </div>
                                                                </div><!-- /.col-md-12 -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group{{ $errors->has('website') ? 'has-error' : '' }}">
                                                                        <label>Website</label>
                                                                        <input type="url" name="website" class="form-control" id="website" value="{{$candidate->website or old('website')}}" placeholder="Enter Website">
                                                                    </div>
                                                                </div><!-- /.col-md-3 -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group{{ $errors->has('facebook') ? 'has-error' : '' }}">
                                                                        <label>Facebook</label>
                                                                        <input type="url" name="facebook" class="form-control" id="facebook" value="{{$candidate->facebook or old('facebook')}}" placeholder="Enter Facebook">
                                                                    </div>
                                                                </div><!-- /.col-md-3 -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group{{ $errors->has('twitter') ? 'has-error' : '' }}">
                                                                        <label>Twitter</label>
                                                                        <input type="url" name="twitter" class="form-control" id="twitter" value="{{$candidate->twitter or old('twitter')}}" placeholder="Enter Twitter">
                                                                    </div>
                                                                </div><!-- /.col-md-3 -->

                                                                <div class="col-md-3">
                                                                    <div class="form-group{{ $errors->has('linkedin') ? 'has-error' : '' }}">
                                                                        <label>Linkedin</label>
                                                                        <input type="url" name="linkedin" class="form-control" id="linkedin" value="{{$candidate->linkedin or old('linkedin')}}" placeholder="Enter Linkedin">
                                                                    </div>
                                                                </div><!-- /.col-md-3 -->



                                                            </div><!-- /.row -->
                                                        </div><!-- /.form-body -->

                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <button type="submit" class="btn green">Save</button>
                                                                            <a href="{{ url('admin/candidates') }}" class="btn default">Cancel</a>
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
                <a href="{{url('admin/candidates')}}"  >
                    <span>Candidates</span>
                    <i class="fa fa-users"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection

@section('js')
    <script src="{{ asset('admin').'/assets/js/vendors.bundle.js' }}"></script>
    <script src="{{ asset('admin').'/assets/js/bootstrap-datetimepicker.js' }}"></script>
@endsection


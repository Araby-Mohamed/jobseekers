@extends('admin.layouts.master')


@section('title')
    Add Work
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
                                <h1>Add Work
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Add Work</span>
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
                                                    <form role="form" method="post" action="{{ url('admin/works/store') }}" enctype="multipart/form-data">

                                                        {{ csrf_field() }}

                                                        <div class="form-body">
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                                        <label>Title <span class="required">*</span> </label>
                                                                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Title">
                                                                    </div>
                                                                </div><!-- /.col-md-6 -->

                                                                <div class="col-md-6 icons_select">
                                                                    <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                                                        <label>Icon <span class="required">*</span>  </label>
                                                                        <select class="bs-select form-control" name="icon" data-show-subtext="true"  data-live-search="true" data-size="8" tabindex="-98">
                                                                            <option disabled="disabled" selected value="">Choose Icon</option>
                                                                            <option value="la-adjust" data-icon="la la-adjust">Adjust</option>
                                                                            <option value="la-anchor" data-icon="la la-anchor">Anchor</option>
                                                                            <option value="la-archive" data-icon="la la-archive">Archive</option>
                                                                            <option value="la-area-chart" data-icon="la la-area-chart">Area Chart</option>
                                                                            <option value="la-asterisk" data-icon="la la-asterisk">Asterisk</option>
                                                                            <option value="la-automobile" data-icon="la la-automobile">Automobile</option>
                                                                            <option value="la-balance-scale" data-icon="la la-balance-scale">Balance Scale</option>
                                                                            <option value="la-bank" data-icon="la la-bank">Bank</option>
                                                                            <option value="la-bar-chart" data-icon="la la-bar-chart">Bar Chart</option>
                                                                            <option value="la-beer" data-icon="la la-beer">Beer</option>
                                                                            <option value="la-birthday-cake" data-icon="la la-birthday-cake">Birthday Cake</option>
                                                                            <option value="la-bicycle" data-icon="la la-bicycle">Bicycle</option>
                                                                            <option value="la-book" data-icon="la la-book">Book</option>
                                                                            <option value="la-building" data-icon="la la-building">Building</option>
                                                                            <option value="la-briefcase" data-icon="la la-briefcase">Briefcase</option>
                                                                            <option value="la-bus" data-icon="la la-bus">Bus</option>
                                                                            <option value="la-cab" data-icon="la la-cab">Cab</option>
                                                                            <option value="la-calculator" data-icon="la la-calculator">Calculator</option>
                                                                            <option value="la-car" data-icon="la la-car">Car</option>
                                                                            <option value="la-cart-plus" data-icon="la la-cart-plus">Cart Plus</option>
                                                                            <option value="la-certificate" data-icon="la la-certificate">Certificate</option>
                                                                            <option value="la-check-circle" data-icon="la la-check-circle">Check Circle</option>
                                                                            <option value="la-cloud" data-icon="la la-cloud">Cloud</option>
                                                                            <option value="la-code" data-icon="la la-code">Code</option>
                                                                            <option value="la-code-fork" data-icon="la la-code-fork">Code Fork</option>
                                                                            <option value="la-coffee" data-icon="la la-coffee">Coffee</option>
                                                                            <option value="la-cogs" data-icon="la la-cogs">Cogs</option>
                                                                            <option value="la-comments" data-icon="la la-comments">Comments</option>
                                                                            <option value="la-compass" data-icon="la la-compass">Compass</option>
                                                                            <option value="la-crosshairs" data-icon="la la-crosshairs">Crosshairs</option>
                                                                            <option value="la-crop" data-icon="la la-crop">Crop</option>
                                                                            <option value="la-credit-card" data-icon="la la-credit-card">Credit Card</option>
                                                                            <option value="la-cutlery" data-icon="la la-cutlery">Cutlery</option>
                                                                            <option value="la-dashboard" data-icon="la la-dashboard">Dashboard</option>
                                                                            <option value="la-diamond" data-icon="la la-diamond">Diamond</option>
                                                                            <option value="la-desktop" data-icon="la la-desktop">Desktop</option>
                                                                            <option value="la-database" data-icon="la la-database">Database</option>
                                                                            <option value="la-download" data-icon="la la-download">Download</option>
                                                                            <option value="la-edit" data-icon="la la-edit">Edit</option>
                                                                            <option value="la-envelope" data-icon="la la-envelope">envelope</option>
                                                                            <option value="la-eye" data-icon="la la-eye">Eye</option>
                                                                            <option value="la-eyedropper" data-icon="la la-eyedropper">Eyedropper</option>
                                                                            <option value="la-fax" data-icon="la la-fax">Fax</option>
                                                                            <option value="la-feed" data-icon="la la-feed">Feed</option>
                                                                            <option value="la-female" data-icon="la la-female">Female</option>
                                                                            <option value="la-film" data-icon="la la-film">Film</option>
                                                                            <option value="la-filter" data-icon="la la-filter">Filter</option>
                                                                            <option value="la-fire" data-icon="la la-fire">Fire</option>
                                                                            <option value="la-fire-extinguisher" data-icon="la la-fire-extinguisher">Fire Extinguisher</option>
                                                                            <option value="la-flag" data-icon="la la-flag">Flag</option>
                                                                            <option value="la-flask" data-icon="la la-flask">Flask</option>
                                                                            <option value="la-flash" data-icon="la la-flash">Flash</option>
                                                                            <option value="la-folder" data-icon="la la-folder">Folder</option>
                                                                            <option value="la-gavel" data-icon="la la-gavel">Gavel</option>
                                                                            <option value="la-gamepad" data-icon="la la-gamepad">Gamepad</option>
                                                                            <option value="la-futbol-o" data-icon="la la-futbol-o">Futbol</option>
                                                                            <option value="la-gears" data-icon="la la-gears">Gears</option>
                                                                            <option value="la-gift" data-icon="la la-gift">Gift</option>
                                                                            <option value="la-glass" data-icon="la la-glass">Glass</option>
                                                                            <option value="la-group" data-icon="la la-group">Group</option>
                                                                            <option value="la-globe" data-icon="la la-globe">globe</option>
                                                                            <option value="la-heart" data-icon="la la-heart">Heart</option>
                                                                            <option value="la-hotel" data-icon="la la-hotel">Hotel</option>
                                                                            <option value="la-home" data-icon="la la-home">Home</option>
                                                                            <option value="la-inbox" data-icon="la la-inbox">Inbox</option>
                                                                            <option value="la-industry" data-icon="la la-industry">Industry</option>
                                                                            <option value="la-image" data-icon="la la-image">image</option>
                                                                            <option value="la-info" data-icon="la la-info">Info</option>
                                                                            <option value="la-institution" data-icon="la la-institution">Institution</option>
                                                                            <option value="la-key" data-icon="la la-key">Key</option>
                                                                            <option value="la-laptop" data-icon="la la-laptop">Laptop</option>
                                                                            <option value="la-lightbulb-o" data-icon="la la-lightbulb-o">Lightbulb</option>
                                                                            <option value="la-magic" data-icon="la la-magic">Magic</option>
                                                                            <option value="la-magnet" data-icon="la la-magnet">Magnet</option>
                                                                            <option value="la-male" data-icon="la la-male">Male</option>
                                                                            <option value="la-microphone" data-icon="la la-microphone">Microphone</option>
                                                                            <option value="la-mobile" data-icon="la la-mobile">Mobile</option>
                                                                            <option value="la-motorcycle" data-icon="la la-motorcycle">Motorcycle</option>
                                                                            <option value="la-money" data-icon="la la-money">Money</option>
                                                                            <option value="la-music" data-icon="la la-music">Music</option>
                                                                            <option value="la-newspaper-o" data-icon="la la-newspaper-o">Newspaper</option>
                                                                            <option value="la-paint-brush" data-icon="la la-paint-brush">Paint Brush</option>
                                                                            <option value="la-music" data-icon="la la-music">Music</option>
                                                                            <option value="la-pencil" data-icon="la la-pencil">pencil</option>
                                                                            <option value="la-phone" data-icon="la la-phone">Phone</option>
                                                                            <option value="la-plane" data-icon="la la-plane">Plane</option>
                                                                            <option value="la-pie-chart" data-icon="la la-pie-chart">Pie Chart</option>
                                                                            <option value="la-print" data-icon="la la-print">Print</option>
                                                                            <option value="la-question" data-icon="la la-question">Question</option>
                                                                            <option value="la-road" data-icon="la la-road">Road</option>
                                                                            <option value="la-search" data-icon="la la-search">Search</option>
                                                                            <option value="la-server" data-icon="la la-server">Server</option>
                                                                            <option value="la-send" data-icon="la la-send">Send</option>
                                                                            <option value="la-suitcase" data-icon="la la-suitcase">Suitcase</option>
                                                                            <option value="la-tasks" data-icon="la la-tasks">Tasks</option>
                                                                            <option value="la-tags" data-icon="la la-tags">Tags</option>
                                                                            <option value="la-television" data-icon="la la-television">Television</option>
                                                                            <option value="la-university" data-icon="la la-university">University</option>
                                                                            <option value="la-tv" data-icon="la la-tv">TV</option>
                                                                            <option value="la-users" data-icon="la la-users">Users</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!-- /.col-md-6 -->
                                                            </div><!-- /.row -->
                                                        </div><!-- /.form-body -->

                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <button type="submit" class="btn green">Save</button>
                                                                            <a href="{{ url('admin/works') }}" class="btn default">Cancel</a>
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
                <a href="{{url('admin/works')}}"  >
                    <span>Works</span>
                    <i class="fa fa-gear"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection


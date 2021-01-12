@extends('admin.layouts.master')


@section('title')
    Edit Work
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
                                <h1>Edit Work
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Edit Work</span>
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
                                                    <form role="form" method="post" action="{{ url('admin/works/'.$work->id.'/update') }}" enctype="multipart/form-data">

                                                        {{ csrf_field() }}

                                                        <div class="form-body">
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                                        <label>Title <span class="required">*</span> </label>
                                                                        <input type="text" id="title" name="title" value="{{ $work->title or old('title') }}" class="form-control" placeholder="Enter Title">
                                                                    </div>
                                                                </div><!-- /.col-md-6 -->

                                                                <div class="col-md-6 icons_select">
                                                                    <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                                                        <label>Icon <span class="required">*</span>  </label>
                                                                        <select class="bs-select form-control" name="icon" data-show-subtext="true"  data-live-search="true" data-size="8" tabindex="-98">
                                                                            <option disabled="disabled" selected value="">Choose Icon</option>
                                                                            <option {{ $work->icon == "la-adjust" ? 'selected' : '' }} value="la-adjust" data-icon="la la-adjust">Adjust</option>
                                                                            <option {{ $work->icon == "la-anchor" ? 'selected' : '' }} value="la-anchor" data-icon="la la-anchor">Anchor</option>
                                                                            <option {{ $work->icon == "la-archive" ? 'selected' : '' }} value="la-archive" data-icon="la la-archive">Archive</option>
                                                                            <option {{ $work->icon == "la-area-chart" ? 'selected' : '' }} value="la-area-chart" data-icon="la la-area-chart">Area Chart</option>
                                                                            <option {{ $work->icon == "la-asterisk" ? 'selected' : '' }} value="la-asterisk" data-icon="la la-asterisk">Asterisk</option>
                                                                            <option {{ $work->icon == "la-automobile" ? 'selected' : '' }} value="la-automobile" data-icon="la la-automobile">Automobile</option>
                                                                            <option {{ $work->icon == "la-balance-scale" ? 'selected' : '' }} value="la-balance-scale" data-icon="la la-balance-scale">Balance Scale</option>
                                                                            <option {{ $work->icon == "la-bank" ? 'selected' : '' }} value="la-bank" data-icon="la la-bank">Bank</option>
                                                                            <option {{ $work->icon == "la-bar-chart" ? 'selected' : '' }} value="la-bar-chart" data-icon="la la-bar-chart">Bar Chart</option>
                                                                            <option {{ $work->icon == "la-beer" ? 'selected' : '' }} value="la-beer" data-icon="la la-beer">Beer</option>
                                                                            <option {{ $work->icon == "la-birthday-cake" ? 'selected' : '' }} value="la-birthday-cake" data-icon="la la-birthday-cake">Birthday Cake</option>
                                                                            <option {{ $work->icon == "la-bicycle" ? 'selected' : '' }} value="la-bicycle" data-icon="la la-bicycle">Bicycle</option>
                                                                            <option {{ $work->icon == "la-book" ? 'selected' : '' }} value="la-book" data-icon="la la-book">Book</option>
                                                                            <option {{ $work->icon == "la-building" ? 'selected' : '' }} value="la-building" data-icon="la la-building">Building</option>
                                                                            <option {{ $work->icon == "la-briefcase" ? 'selected' : '' }} value="la-briefcase" data-icon="la la-briefcase">Briefcase</option>
                                                                            <option {{ $work->icon == "la-bus" ? 'selected' : '' }} value="la-bus" data-icon="la la-bus">Bus</option>
                                                                            <option {{ $work->icon == "la-cab" ? 'selected' : '' }} value="la-cab" data-icon="la la-cab">Cab</option>
                                                                            <option {{ $work->icon == "la-calculator" ? 'selected' : '' }} value="la-calculator" data-icon="la la-calculator">Calculator</option>
                                                                            <option {{ $work->icon == "la-car" ? 'selected' : '' }} value="la-car" data-icon="la la-car">Car</option>
                                                                            <option {{ $work->icon == "la-cart-plus" ? 'selected' : '' }} value="la-cart-plus" data-icon="la la-cart-plus">Cart Plus</option>
                                                                            <option {{ $work->icon == "la-certificate" ? 'selected' : '' }} value="la-certificate" data-icon="la la-certificate">Certificate</option>
                                                                            <option {{ $work->icon == "la-check-circle" ? 'selected' : '' }} value="la-check-circle" data-icon="la la-check-circle">Check Circle</option>
                                                                            <option {{ $work->icon == "la-cloud" ? 'selected' : '' }} value="la-cloud" data-icon="la la-cloud">Cloud</option>
                                                                            <option {{ $work->icon == "la-code" ? 'selected' : '' }} value="la-code" data-icon="la la-code">Code</option>
                                                                            <option {{ $work->icon == "la-code-fork" ? 'selected' : '' }} value="la-code-fork" data-icon="la la-code-fork">Code Fork</option>
                                                                            <option {{ $work->icon == "la-coffee" ? 'selected' : '' }} value="la-coffee" data-icon="la la-coffee">Coffee</option>
                                                                            <option {{ $work->icon == "la-cogs" ? 'selected' : '' }} value="la-cogs" data-icon="la la-cogs">Cogs</option>
                                                                            <option {{ $work->icon == "la-comments" ? 'selected' : '' }} value="la-comments" data-icon="la la-comments">Comments</option>
                                                                            <option {{ $work->icon == "la-compass" ? 'selected' : '' }} value="la-compass" data-icon="la la-compass">Compass</option>
                                                                            <option {{ $work->icon == "la-crosshairs" ? 'selected' : '' }} value="la-crosshairs" data-icon="la la-crosshairs">Crosshairs</option>
                                                                            <option {{ $work->icon == "la-crop" ? 'selected' : '' }} value="la-crop" data-icon="la la-crop">Crop</option>
                                                                            <option {{ $work->icon == "la-credit-card" ? 'selected' : '' }} value="la-credit-card" data-icon="la la-credit-card">Credit Card</option>
                                                                            <option {{ $work->icon == "la-cutlery" ? 'selected' : '' }} value="la-cutlery" data-icon="la la-cutlery">Cutlery</option>
                                                                            <option {{ $work->icon == "la-dashboard" ? 'selected' : '' }} value="la-dashboard" data-icon="la la-dashboard">Dashboard</option>
                                                                            <option {{ $work->icon == "la-diamond" ? 'selected' : '' }} value="la-diamond" data-icon="la la-diamond">Diamond</option>
                                                                            <option {{ $work->icon == "la-desktop" ? 'selected' : '' }} value="la-desktop" data-icon="la la-desktop">Desktop</option>
                                                                            <option {{ $work->icon == "la-database" ? 'selected' : '' }} value="la-database" data-icon="la la-database">Database</option>
                                                                            <option {{ $work->icon == "la-download" ? 'selected' : '' }} value="la-download" data-icon="la la-download">Download</option>
                                                                            <option {{ $work->icon == "la-edit" ? 'selected' : '' }} value="la-edit" data-icon="la la-edit">Edit</option>
                                                                            <option {{ $work->icon == "la-envelope" ? 'selected' : '' }} value="la-envelope" data-icon="la la-envelope">envelope</option>
                                                                            <option {{ $work->icon == "la-eye" ? 'selected' : '' }} value="la-eye" data-icon="la la-eye">Eye</option>
                                                                            <option {{ $work->icon == "la-eyedropper" ? 'selected' : '' }} value="la-eyedropper" data-icon="la la-eyedropper">Eyedropper</option>
                                                                            <option {{ $work->icon == "la-fax" ? 'selected' : '' }} value="la-fax" data-icon="la la-fax">Fax</option>
                                                                            <option {{ $work->icon == "la-feed" ? 'selected' : '' }} value="la-feed" data-icon="la la-feed">Feed</option>
                                                                            <option {{ $work->icon == "la-female" ? 'selected' : '' }} value="la-female" data-icon="la la-female">Female</option>
                                                                            <option {{ $work->icon == "la-film" ? 'selected' : '' }} value="la-film" data-icon="la la-film">Film</option>
                                                                            <option {{ $work->icon == "la-filter" ? 'selected' : '' }} value="la-filter" data-icon="la la-filter">Filter</option>
                                                                            <option {{ $work->icon == "la-fire" ? 'selected' : '' }} value="la-fire" data-icon="la la-fire">Fire</option>
                                                                            <option {{ $work->icon == "la-fire-extinguisher" ? 'selected' : '' }} value="la-fire-extinguisher" data-icon="la la-fire-extinguisher">Fire Extinguisher</option>
                                                                            <option {{ $work->icon == "la-flag" ? 'selected' : '' }} value="la-flag" data-icon="la la-flag">Flag</option>
                                                                            <option {{ $work->icon == "la-flask" ? 'selected' : '' }} value="la-flask" data-icon="la la-flask">Flask</option>
                                                                            <option {{ $work->icon == "la-flash" ? 'selected' : '' }} value="la-flash" data-icon="la la-flash">Flash</option>
                                                                            <option {{ $work->icon == "la-folder" ? 'selected' : '' }} value="la-folder" data-icon="la la-folder">Folder</option>
                                                                            <option {{ $work->icon == "la-gavel" ? 'selected' : '' }} value="la-gavel" data-icon="la la-gavel">Gavel</option>
                                                                            <option {{ $work->icon == "la-gamepad" ? 'selected' : '' }} value="la-gamepad" data-icon="la la-gamepad">Gamepad</option>
                                                                            <option {{ $work->icon == "la-futbol-o" ? 'selected' : '' }} value="la-futbol-o" data-icon="la la-futbol-o">Futbol</option>
                                                                            <option {{ $work->icon == "la-gears" ? 'selected' : '' }} value="la-gears" data-icon="la la-gears">Gears</option>
                                                                            <option {{ $work->icon == "la-gift" ? 'selected' : '' }} value="la-gift" data-icon="la la-gift">Gift</option>
                                                                            <option {{ $work->icon == "la-glass" ? 'selected' : '' }} value="la-glass" data-icon="la la-glass">Glass</option>
                                                                            <option {{ $work->icon == "la-group" ? 'selected' : '' }} value="la-group" data-icon="la la-group">Group</option>
                                                                            <option {{ $work->icon == "la-globe" ? 'selected' : '' }} value="la-globe" data-icon="la la-globe">globe</option>
                                                                            <option {{ $work->icon == "la-heart" ? 'selected' : '' }} value="la-heart" data-icon="la la-heart">Heart</option>
                                                                            <option {{ $work->icon == "la-hotel" ? 'selected' : '' }} value="la-hotel" data-icon="la la-hotel">Hotel</option>
                                                                            <option {{ $work->icon == "la-home" ? 'selected' : '' }} value="la-home" data-icon="la la-home">Home</option>
                                                                            <option {{ $work->icon == "la-inbox" ? 'selected' : '' }} value="la-inbox" data-icon="la la-inbox">Inbox</option>
                                                                            <option {{ $work->icon == "la-industry" ? 'selected' : '' }} value="la-industry" data-icon="la la-industry">Industry</option>
                                                                            <option {{ $work->icon == "la-image" ? 'selected' : '' }} value="la-image" data-icon="la la-image">image</option>
                                                                            <option {{ $work->icon == "la-info" ? 'selected' : '' }} value="la-info" data-icon="la la-info">Info</option>
                                                                            <option {{ $work->icon == "la-institution" ? 'selected' : '' }} value="la-institution" data-icon="la la-institution">Institution</option>
                                                                            <option {{ $work->icon == "la-key" ? 'selected' : '' }} value="la-key" data-icon="la la-key">Key</option>
                                                                            <option {{ $work->icon == "la-laptop" ? 'selected' : '' }} value="la-laptop" data-icon="la la-laptop">Laptop</option>
                                                                            <option {{ $work->icon == "la-lightbulb-o" ? 'selected' : '' }} value="la-lightbulb-o" data-icon="la la-lightbulb-o">Lightbulb</option>
                                                                            <option {{ $work->icon == "la-magic" ? 'selected' : '' }} value="la-magic" data-icon="la la-magic">Magic</option>
                                                                            <option {{ $work->icon == "la-magnet" ? 'selected' : '' }} value="la-magnet" data-icon="la la-magnet">Magnet</option>
                                                                            <option {{ $work->icon == "la-male" ? 'selected' : '' }} value="la-male" data-icon="la la-male">Male</option>
                                                                            <option {{ $work->icon == "la-microphone" ? 'selected' : '' }} value="la-microphone" data-icon="la la-microphone">Microphone</option>
                                                                            <option {{ $work->icon == "la-mobile" ? 'selected' : '' }} value="la-mobile" data-icon="la la-mobile">Mobile</option>
                                                                            <option {{ $work->icon == "la-motorcycle" ? 'selected' : '' }} value="la-motorcycle" data-icon="la la-motorcycle">Motorcycle</option>
                                                                            <option {{ $work->icon == "la-money" ? 'selected' : '' }} value="la-money" data-icon="la la-money">Money</option>
                                                                            <option {{ $work->icon == "la-music" ? 'selected' : '' }} value="la-music" data-icon="la la-music">Music</option>
                                                                            <option {{ $work->icon == "la-newspaper-o" ? 'selected' : '' }} value="la-newspaper-o" data-icon="la la-newspaper-o">Newspaper</option>
                                                                            <option {{ $work->icon == "la-paint-brush" ? 'selected' : '' }} value="la-paint-brush" data-icon="la la-paint-brush">Paint Brush</option>
                                                                            <option {{ $work->icon == "la-music" ? 'selected' : '' }} value="la-music" data-icon="la la-music">Music</option>
                                                                            <option {{ $work->icon == "la-pencil" ? 'selected' : '' }} value="la-pencil" data-icon="la la-pencil">pencil</option>
                                                                            <option {{ $work->icon == "la-phone" ? 'selected' : '' }} value="la-phone" data-icon="la la-phone">Phone</option>
                                                                            <option {{ $work->icon == "la-plane" ? 'selected' : '' }} value="la-plane" data-icon="la la-plane">Plane</option>
                                                                            <option {{ $work->icon == "la-pie-chart" ? 'selected' : '' }} value="la-pie-chart" data-icon="la la-pie-chart">Pie Chart</option>
                                                                            <option {{ $work->icon == "la-print" ? 'selected' : '' }} value="la-print" data-icon="la la-print">Print</option>
                                                                            <option {{ $work->icon == "la-question" ? 'selected' : '' }} value="la-question" data-icon="la la-question">Question</option>
                                                                            <option {{ $work->icon == "la-road" ? 'selected' : '' }} value="la-road" data-icon="la la-road">Road</option>
                                                                            <option {{ $work->icon == "la-search" ? 'selected' : '' }} value="la-search" data-icon="la la-search">Search</option>
                                                                            <option {{ $work->icon == "la-server" ? 'selected' : '' }} value="la-server" data-icon="la la-server">Server</option>
                                                                            <option {{ $work->icon == "la-send" ? 'selected' : '' }} value="la-send" data-icon="la la-send">Send</option>
                                                                            <option {{ $work->icon == "la-suitcase" ? 'selected' : '' }} value="la-suitcase" data-icon="la la-suitcase">Suitcase</option>
                                                                            <option {{ $work->icon == "la-tasks" ? 'selected' : '' }} value="la-tasks" data-icon="la la-tasks">Tasks</option>
                                                                            <option {{ $work->icon == "la-tags" ? 'selected' : '' }} value="la-tags" data-icon="la la-tags">Tags</option>
                                                                            <option {{ $work->icon == "la-television" ? 'selected' : '' }} value="la-television" data-icon="la la-television">Television</option>
                                                                            <option {{ $work->icon == "la-university" ? 'selected' : '' }} value="la-university" data-icon="la la-university">University</option>
                                                                            <option {{ $work->icon == "la-tv" ? 'selected' : '' }} value="la-tv" data-icon="la la-tv">TV</option>
                                                                            <option {{ $work->icon == "la-users" ? 'selected' : '' }} value="la-users" data-icon="la la-users">Users</option>
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


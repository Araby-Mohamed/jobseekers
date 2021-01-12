@extends('layouts.master')

@section('title')
    Candidates
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Candidates</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-bottom">
            <div class="container">
                <div class="row no-gape">
                    {{--<aside class="col-lg-3 column">--}}
                        {{--<div class="widget">--}}
                            {{--<div class="search_widget_job">--}}
                                {{--<div class="field_w_search">--}}
                                    {{--<input type="text" placeholder="Search Keywords" />--}}
                                    {{--<i class="la la-search"></i>--}}
                                {{--</div><!-- Search Widget -->--}}
                                {{--<div class="field_w_search">--}}
                                    {{--<input type="text" placeholder="All Locations" />--}}
                                    {{--<i class="la la-map-marker"></i>--}}
                                {{--</div><!-- Search Widget -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget">--}}
                            {{--<h3 class="sb-title open">Last Activity</h3>--}}
                            {{--<div class="specialism_widget">--}}
                                {{--<div class="simple-checkbox">--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="22"><label for="22">Last Hour</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="23"><label for="23">Last 24 hours</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="24"><label for="24">Last 7 days</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="25"><label for="25">Last 14 days</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="26"><label for="26">Last 30 days</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="27"><label for="27">All</label></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget">--}}
                            {{--<h3 class="sb-title open">Specialism</h3>--}}
                            {{--<div class="specialism_widget">--}}
                                {{--<div class="simple-checkbox scrollbar">--}}
                                    {{--<p><input type="checkbox" name="spealism" id="as"><label for="as">Accountancy (2)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="asd"><label for="asd">Banking (2)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="errwe"><label for="errwe">Charity & Voluntary (3)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="fdg"><label for="fdg">Digital & Creative (4)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="sc"><label for="sc">Estate Agency (3)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="aw"><label for="aw">Graduate (2)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="ui"><label for="ui">IT Contractor (7)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="saas"><label for="saas">Charity & Voluntary (3)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="rrrt"><label for="rrrt">Digital & Creative (4)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="eweew"><label for="eweew">Estate Agency (3)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="bnbn"><label for="bnbn">Graduate (2)</label></p>--}}
                                    {{--<p><input type="checkbox" name="spealism" id="ffd"><label for="ffd">IT Contractor (7)</label></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget">--}}
                            {{--<h3 class="sb-title open">Offerd Salary</h3>--}}
                            {{--<div class="specialism_widget">--}}
                                {{--<div class="simple-checkbox">--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="1"><label for="1">10k - 20k</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="2"><label for="2">20k - 30k</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="3"><label for="3">30k - 40k</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="4"><label for="4">40k - 50k</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="28"><label for="28">50k - 60k</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="29"><label for="29">60k - 70k</label></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget">--}}
                            {{--<h3 class="sb-title closed">Career Level</h3>--}}
                            {{--<div class="specialism_widget">--}}
                                {{--<div class="simple-checkbox">--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="5"><label for="5">Intermediate</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="6"><label for="6">Normal</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="7"><label for="7">Special</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="8"><label for="8">Experienced</label></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget">--}}
                            {{--<h3 class="sb-title closed">Experince</h3>--}}
                            {{--<div class="specialism_widget">--}}
                                {{--<div class="simple-checkbox">--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="9"><label for="9">1Year to 2Year</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="10"><label for="10">2Year to 3Year</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="11"><label for="11">3Year to 4Year</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="12"><label for="12">4Year to 5Year</label></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="widget">--}}
                            {{--<h3 class="sb-title closed">Gender</h3>--}}
                            {{--<div class="specialism_widget">--}}
                                {{--<div class="simple-checkbox">--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="13"><label for="13">Male</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="14"><label for="14">Female</label></p>--}}
                                    {{--<p><input type="checkbox" name="smplechk" id="15"><label for="15">Others</label></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</aside>--}}
                    <div class="col-lg-12 column">
                        <div class="emply-resume-sec">
                            @foreach($Candidates as $candidate)
                                <div class="emply-resume-list square">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="emply-resume-thumb">
                                                @if($candidate->image != '')
                                                    <img src="{{url('images/users/'.$candidate->image)}}" alt="" />
                                                @else
                                                    <img src="{{url('images/user.png')}}" alt="" />
                                                @endif
                                            </div>
                                            <div class="emply-resume-info">
                                                <h3><a href="#" title="">{{$candidate->username}}</a></h3>
                                                <span><i>{{$candidate->jop_title}}</i></span>
                                                <p><i class="la la-map-marker"></i>{{$candidate->city}} / Egypt</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="shortlists">
                                                <a href="candidate/{{$candidate->user_id}}" title="">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Emply List -->
                            @endforeach

                            <div class="pagination">
                                {{$candidate->link}}
                            </div><!-- Pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
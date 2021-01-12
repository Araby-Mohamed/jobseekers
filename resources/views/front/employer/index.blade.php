@extends('layouts.master')

@section('title')
    Employer
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Employer</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block less-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 column">
                        <div class="filterbar">
                            <p>Total of {{$count}} Employer</p>
                        </div>
                        <div class="emply-list-sec">
                            <div class="row" id="masonry">
                                @foreach($Companies as $company)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                    <div class="emply-list box">
                                        <div class="emply-list-thumb">
                                            <a href="{{url('employer/'.$company->id)}}" title="">
                                                @if($company->logo != '')
                                                    <img style="width: 104px; height: 99px;" src="{{asset('images/companies/'.$company->logo)}}" alt="" />
                                                @else
                                                    <img style="width: 104px; height: 99px" src="{{asset('images')}}/logo.png" style="width:156px; height:156px" alt="" />
                                                @endif
                                            </a>

                                        </div>
                                        <div class="emply-list-info">
                                            <h3><a href="{{url('employer/'.$company->id)}}" title="">{{$company->title}}</a></h3>
                                            <span>{{$company->titleEmployments}}</span>
                                            <h6><i class="la la-map-marker"></i> {{$company->titleCity}}</h6>
                                        </div>
                                    </div><!-- Employe List -->
                                </div>
                                @endforeach
                                <div class="col-lg-12">

                                        {{$Companies->links()}}
                                    </div><!-- Pagination -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
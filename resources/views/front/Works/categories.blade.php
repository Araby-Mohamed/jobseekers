@extends('layouts.master')

@section('title')
    Popular Categories
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Popular Categories</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="cat-sec">
                            <div class="row no-gape">
                                @foreach($Categories as $category)
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="{{url('jobs').'/'.$category->id}}" title="">
                                            <i class="la {{$category->icon}}"></i>
                                            <span>{{$category->title}}</span>
                                            <p>({{$category->jobs->count()}} open positions)</p>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="cat-sec">
                            <div class="row no-gape">
                            </div>
                        </div>
                        <div class="text-center">
                            {{$Categories->links()}}
                        </div>
                </div>
            </div>
        </div>
    </section>
@stop
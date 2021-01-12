@extends('layouts.master')
@section('title')
    My Jobs
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">

            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>My Jobs</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    @include('layouts.sidebar')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <h3>Manage Jobs</h3>
                                <div class="extra-job-info">
                                    <span><i class="la la-clock-o"></i><strong>{{$CountAllMyJob}}</strong> Job Posted</span>
                                    <span><i class="la la-file-text"></i><strong>{{$countApply}}</strong> Application</span>
                                    <span><i class="la la-users"></i><strong>{{$CountAllMyJobActive}}</strong> Active Jobs</span>
                                </div>
                                @include('layouts.message')
                                <table>
                                    <thead>
                                    <tr>
                                        <td>Title</td>
                                        <td>Applications</td>
                                        <td>Created</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Jobs as $Job)
                                        <tr>
                                            <td>
                                                <div class="table-list-title">
                                                    <h3><a href="{{url('job/'.$Job->id)}}" title="">{{$Job->Job_title}}</a></h3>
                                                    <span><i class="la la-map-marker"></i>{{$Job->cityTitle}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{url('profile/applicants/'.$Job->id)}}"> <span class="applied-field">{{$Job->apply->count()}} Applied</span></a>
                                            </td>
                                            <td>
                                                <span>{{$Job->created_at->diffForHumans()}}</span>
                                            </td>
                                            <td>
                                                @if($Job->accept == 1)
                                                    <span class="status active">Active</span>
                                                @else
                                                    <span class="status">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="action_job">
                                                    <li><span>View Job</span><a href="{{url('job/'.$Job->id)}}" title=""><i class="la la-eye"></i></a></li>
                                                    @if($Job->accept != 1)
                                                        <li><span>Edit</span><a href="{{url('job/edit/'.$Job->id)}}" title=""><i class="la la-pencil"></i></a></li>
                                                    @endif
                                                    <li><span>Delete</span><a href="{{url('job/delete/'.$Job->id)}}" class="confirm" title=""><i class="la la-trash-o"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    <ul>
                                        {{$Jobs->links()}}
                                    </ul>
                                </div><!-- Pagination -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
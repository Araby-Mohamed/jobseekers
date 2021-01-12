@extends('layouts.master')
@section('title')
    Add Job
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Add Job</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-top">
            <div class="container">
                <div class="row no-gape">
                    @include('layouts.sidebar')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                @include('layouts.message')
                                <div class="border-title"><h3>Job Requirements</h3></div>
                                <form action="{{url('add/job')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="resumeadd-form">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Years of experience <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Years of experience" required name="years_of_experience" class="chosen">
                                                        <option selected disabled>Years of experience</option>
                                                        <option>1 Year</option>
                                                        <option>2 Year</option>
                                                        <option>3 Year</option>
                                                        <option>4 Year</option>
                                                        <option>More than 5 year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Computer <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Computer" required name="computer" class="chosen">
                                                        <option selected disabled>Computer</option>
                                                        <option>Excellent</option>
                                                        <option>Very Good</option>
                                                        <option>Good</option>
                                                        <option>Acceptable</option>
                                                        <option>Not Required</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <span class="pf-title">Gander <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select date-placeholder="Chose Gander" required name="gander" class="chosen">
                                                        <option selected disabled>Chose Gander</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Males and females</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <span class="pf-title">Required Qualification <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select class="chosen" name="qualification" required>
                                                        <option selected disabled>Chose Required Qualification</option>
                                                        <option>Higher education</option>
                                                        <option>Above average education</option>
                                                        <option>Intermediate Education (Diploma)</option>
                                                        <option>Masters</option>
                                                        <option>Doctor</option>
                                                        <option>Without education</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <span class="pf-title">English language <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="English language" required name="english_language" class="chosen">
                                                        <option selected disabled>English language</option>
                                                        <option>Excellent</option>
                                                        <option>Very Good</option>
                                                        <option>Good</option>
                                                        <option>Acceptable</option>
                                                        <option>Not Required</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <span class="pf-title">Microsoft Office <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Microsoft Office" required name="microsoft_office" class="chosen">
                                                        <option selected disabled>MicroSoft Office</option>
                                                        <option>Excellent</option>
                                                        <option>Very Good</option>
                                                        <option>Good</option>
                                                        <option>Acceptable</option>
                                                        <option>Not Required</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <span class="pf-title">Age <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Age" required name="age" class="chosen">
                                                        <option selected disabled>Chose Age</option>
                                                        <option>18 - 25 year</option>
                                                        <option>26 - 35 year</option>
                                                        <option>36 - 55 year</option>
                                                        <option>All Ages</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <span class="pf-title">Other conditions</span>
                                                <div class="pf-field">
                                                    <textarea name="other_conditions">{{old('other_conditions')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-title"><h3>Salary and type of work</h3></div>
                                    <div class="resumeadd-form">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Basic Salary</span>
                                                <div class="pf-field">
                                                    <input placeholder="Basic Salary" value="{{old('basic_salary')}}" name="basic_salary" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Job type <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Job type" required name="Job_type" class="chosen">
                                                        <option selected disabled>Chose Job Type</option>
                                                        <option>Full Time</option>
                                                        <option>Part Time</option>
                                                        <option>Freelancer</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-title"><h3>Job Details</h3></div>
                                    <div class="resumeadd-form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <span class="pf-title">Job Title <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <input placeholder="Job Title" name="Job_title" value="{{old('Job_title')}}" type="text">
                                                </div>
                                            </div>


                                            <div class="col-lg-12">
                                                <span class="pf-title">Job Specialization <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Job Specialization" required name="employments_id" class="chosen">
                                                        <option disabled selected>chose Job Specialization</option>
                                                        @foreach($Employments as $emp)
                                                            <option value="{{$emp->id}}">{{$emp->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="pf-title">Job Details</span>
                                                <div class="pf-field">
                                                    <textarea name="job_details"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
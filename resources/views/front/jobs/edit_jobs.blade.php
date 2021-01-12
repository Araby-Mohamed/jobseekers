@extends('layouts.master')
@section('title')
    Edit Job
@stop

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url('{{url('front')}}/images/resource/mslider1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Edit Job</h3>
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
                                <form action="{{url('job/edit/'.$Job->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="resumeadd-form">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Years of experience <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Years of experience" required name="years_of_experience" class="chosen">
                                                        <option disabled>Years of experience</option>
                                                        <option {{$Job->years_of_experience == '1 Year' ? 'selected' : ''}}>1 Year</option>
                                                        <option {{$Job->years_of_experience == '2 Year' ? 'selected' : ''}}>2 Year</option>
                                                        <option {{$Job->years_of_experience == '3 Year' ? 'selected' : ''}}>3 Year</option>
                                                        <option {{$Job->years_of_experience == '4 Year' ? 'selected' : ''}}>4 Year</option>
                                                        <option {{$Job->years_of_experience == 'More than 5 year' ? 'selected' : ''}}>More than 5 year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Computer <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Computer" required name="computer" class="chosen">
                                                        <option disabled>Computer</option>
                                                        <option {{$Job->computer == 'Excellent' ? 'selected' : ''}}>Excellent</option>
                                                        <option {{$Job->computer == 'Very Good' ? 'selected' : ''}}>Very Good</option>
                                                        <option {{$Job->computer == 'Good' ? 'selected' : ''}}>Good</option>
                                                        <option {{$Job->computer == 'Acceptable' ? 'selected' : ''}}>Acceptable</option>
                                                        <option {{$Job->computer == 'Not Required' ? 'selected' : ''}}>Not Required</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <span class="pf-title">Gander <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select date-placeholder="Chose Gander" required name="gander" class="chosen">
                                                        <option disabled>Chose Gander</option>
                                                        <option {{$Job->gander == 'Male' ? 'selected' : ''}}>Male</option>
                                                        <option {{$Job->gander == 'Female' ? 'selected' : ''}}>Female</option>
                                                        <option {{$Job->gander == 'Males and females' ? 'selected' : ''}}>Males and females</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <span class="pf-title">Required Qualification <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select class="chosen" name="qualification" required>
                                                        <option disabled>Chose Required Qualification</option>
                                                        <option {{$Job->qualification == 'Higher education' ? 'selected' : ''}}>Higher education</option>
                                                        <option {{$Job->qualification == 'Above average education' ? 'selected' : ''}}>Above average education</option>
                                                        <option {{$Job->qualification == 'Intermediate Education (Diploma)' ? 'selected' : ''}}>Intermediate Education (Diploma)</option>
                                                        <option {{$Job->qualification == 'Masters' ? 'selected' : ''}}>Masters</option>
                                                        <option {{$Job->qualification == 'Doctor' ? 'selected' : ''}}>Doctor</option>
                                                        <option {{$Job->qualification == 'Without education' ? 'selected' : ''}}>Without education</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <span class="pf-title">English language <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="English language" required name="english_language" class="chosen">
                                                        <option disabled>English language</option>
                                                        <option {{$Job->english_language == 'Excellent' ? 'selected' : ''}}>Excellent</option>
                                                        <option {{$Job->english_language == 'Very Good' ? 'selected' : ''}}>Very Good</option>
                                                        <option {{$Job->english_language == 'Good' ? 'selected' : ''}}>Good</option>
                                                        <option {{$Job->english_language == 'Acceptable' ? 'selected' : ''}}>Acceptable</option>
                                                        <option {{$Job->english_language == 'Not Required' ? 'selected' : ''}}>Not Required</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <span class="pf-title">Microsoft Office <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Microsoft Office" required name="microsoft_office" class="chosen">
                                                        <option disabled>MicroSoft Office</option>
                                                        <option {{$Job->microsoft_office == 'Excellent' ? 'selected' : ''}}>Excellent</option>
                                                        <option {{$Job->microsoft_office == 'Very Good' ? 'selected' : ''}}>Very Good</option>
                                                        <option {{$Job->microsoft_office == 'Good' ? 'selected' : ''}}>Good</option>
                                                        <option {{$Job->microsoft_office == 'Acceptable' ? 'selected' : ''}}>Acceptable</option>
                                                        <option {{$Job->microsoft_office == 'Not Required' ? 'selected' : ''}}>Not Required</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <span class="pf-title">Age <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Age" required name="age" class="chosen">
                                                        <option disabled>Chose Age</option>
                                                        <option {{$Job->age == '18 - 25 year' ? 'selected' : ''}}>18 - 25 year</option>
                                                        <option {{$Job->age == '26 - 35 year' ? 'selected' : ''}}>26 - 35 year</option>
                                                        <option {{$Job->age == '36 - 55 year' ? 'selected' : ''}}>36 - 55 year</option>
                                                        <option {{$Job->age == 'All Ages' ? 'selected' : ''}}>All Ages</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <span class="pf-title">Other conditions</span>
                                                <div class="pf-field">
                                                    <textarea name="other_conditions">{{$Job->other_conditions}}</textarea>
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
                                                    <input placeholder="Basic Salary" value="{{$Job->basic_salary}}" name="basic_salary" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Job type <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Job type" required name="Job_type" class="chosen">
                                                        <option disabled>Chose Job Type</option>
                                                        <option {{$Job->Job_type == 'Full Time' ? 'selected' : ''}}>Full Time</option>
                                                        <option {{$Job->Job_type == 'Part Time' ? 'selected' : ''}}>Part Time</option>
                                                        <option {{$Job->Job_type == 'Freelancer' ? 'selected' : ''}}>Freelancer</option>
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
                                                    <input placeholder="Job Title" name="Job_title" value="{{$Job->Job_title}}" type="text">
                                                </div>
                                            </div>


                                            <div class="col-lg-12">
                                                <span class="pf-title">Job Specialization <span style="color:#fb236a">*</span></span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Job Specialization" required name="employments_id" class="chosen">
                                                        <option disabled>chose Job Specialization</option>
                                                        @foreach($Employments as $emp)
                                                            <option value="{{$emp->id}}" {{$emp->id == $Job->employments_id ? 'selected' : ''}}>{{$emp->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="pf-title">Job Details</span>
                                                <div class="pf-field">
                                                    <textarea name="job_details">{{$Job->job_details}}</textarea>
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
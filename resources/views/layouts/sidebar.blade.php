<aside class="col-lg-3 column border-right">
    <div class="widget">
        <div class="tree_widget-sec">
            <ul>
                @if(auth()->user()->level == 'employer' )
                <li class="{{Request::is('profile/employments') ? 'active' : ''}}">
                    <a href="{{url('profile/employments')}}" title=""><i class="la la-file-text"></i>My Profile</a>
                </li>
                <li class="{{Request::is('profile/my_jobs') ? 'active' : ''}}">
                    <a href="{{url('profile/my_jobs')}}" title=""><i class="la la-briefcase"></i>My Jobs</a>
                </li>
                <li class="{{Request::is('add/job') ? 'active' : ''}}">
                    <a href="{{url('add/job')}}" title=""><i class="la la-calendar-plus-o"></i>Add Job</a>
                </li>
                @else
                    <li class="{{Request::is('profile/candidates') ? 'active' : ''}}">
                        <a href="{{url('profile/candidates')}}" title=""><i class="la la-file-text"></i>My Profile</a>
                    </li>
                @endif
                @if(auth()->user()->level == 'candidate')
                <li class="{{Request::is('profile/applicants/'.Auth::id().'/candidate') ? 'active' : ''}}">
                    <a href="{{url('profile/applicants/'.Auth::id().'/candidate')}}"><i class="la la-briefcase"></i>Jobs Provided</a>
                </li>
                @endif
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="la la-unlink"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

</aside>


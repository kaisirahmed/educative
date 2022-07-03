<div class="page__header  page__header-nav mb-0">
    <div class="container">
        <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex" id="secondaryNavbar">
            <ul class="nav navbar-nav">

                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a>
                </li>

                <li class="nav-item {{ Request::is('courses') ? 'active' : '' }}">
                    <a href="{{ route('courses') }}" class="nav-link {{ Request::is('courses') ? 'active' : '' }}">Courses</a>
                   
                </li>

                <li class="nav-item {{ Request::is('tracks') ? 'active' : '' }}">
                    <a href="{{ route('tracks') }}" class="nav-link {{ Request::is('tracks') ? 'active' : '' }}">Tracks</a>
                     
                </li> 

                <li class="nav-item {{ Request::is('topics') ? 'active' : '' }}">
                    <a href="{{ route('topics') }}" class="nav-link {{ Request::is('topics') ? 'active' : '' }}">Topics</a>
                    
                </li>

                <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
                    <a href="{{ route('blogs') }}" class="nav-link {{ Request::is('blogs') ? 'active' : '' }}">Blog</a>
                </li>   

                @if(Auth::check())

                <li class="nav-item {{ Request::is('subscriptions') ? 'active' : '' }}">
                    <a href="{{ route('subscriptions') }}" class="nav-link {{ Request::is('mycourses') ? 'active' : '' }}">My Subscriptions</a>
                </li>

                <li class="nav-item {{ Request::is('mycourses') ? 'active' : '' }}">
                    <a href="topics.html" class="nav-link {{ Request::is('mycourses') ? 'active' : '' }}">My Courses</a>
                </li> 
              
                @endif
                
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-light" href="#" data-toggle="modal" data-target="#modal-center">Why eLearning</a>
                </li>
            </ul>
        </div>
    </div>
</div>
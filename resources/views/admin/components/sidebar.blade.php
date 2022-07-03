<div id="sidebar-menu">
  <!-- Left Menu Start -->
  <ul class="metismenu list-unstyled" id="side-menu">
      <li class="menu-title">Main</li>


      <li class="{{ Request::is('admin.dashboard') ? 'mm-active' : '' }}">
          <a href="{{ route('admin.dashboard') }}" class="waves-effect">
              <span class="badge badge-pill badge-primary float-right">20+</span>
              <i class="mdi mdi-view-dashboard"></i>
              <span> Dashboard </span>
          </a>
      </li>
      <li class="menu-title">Users</li>
      <li class="@if(Request::is('admin/register')) mm-active @endif">
          <a href="{{ route('admin.authors.index') }}" class="waves-effect">
              <i class="mdi mdi-account-box"></i>
              <span> Authors </span>
          </a>
      </li>

      <li>
          <a href="{{ route('admin.users.index') }}" class="waves-effect">
              <i class="mdi mdi-account-box"></i>
              <span> Students </span>
          </a>
      </li>

      <li class="menu-title"> Learning </li>

      <li>
          <a href="{{ route('admin.tracks.index') }}" class="waves-effect">
              <i class="mdi mdi-cube-outline"></i>
              <span> Tracks </span>
          </a>
      </li>

       <li>
          <a href="{{ route('admin.topics.index') }}" class="waves-effect">
              <i class="mdi mdi-calendar-check"></i>
              <span> Topics </span>
          </a>
      </li>
      <li class="menu-title">Course</li>
      <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="mdi mdi-format-list-bulleted-type"></i>
              <span> Courses </span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
              <li class="waves-effect"><a href="{{ route('admin.courses.index') }}">Courses</a></li>

              <li class="waves-effect"><a href="{{ route('admin.lessons.index') }}">Lessons</a></li>

              <li class="waves-effect"><a href="{{ route('admin.lessonlists.index') }}">Lesson Lists</a></li>

              <li class="waves-effect"><a href="{{ route('admin.quizzes.index') }}">Quizzes</a></li>

              <li class="waves-effect"><a href="email-compose.html">Recommendations</a></li>
          </ul>
      </li>

      <li>
          <a href="{{ route('admin.subscriptions.index') }}" class="waves-effect">
              <i class="mdi mdi-buffer"></i>
              <span>Subscriptions</span>
          </a>
      </li>

      <li>
          <a href="{{ route('admin.blogs.index') }}" class="waves-effect">
              <i class="mdi mdi-google-pages"></i>
              <span>Blogs</span>
          </a>
      </li>

      <li>
          <a href="{{ route('admin.enrolls.index') }}" class="waves-effect">
              <i class="mdi mdi-google-pages"></i>
              <span>Enrolls</span>
          </a>
      </li>
 
      <li class="menu-title">Help & Support</li>
      
      <li class="waves-effect">
        <a href="{{ route('admin.contact.index') }}" class="waves-effect">
            <i class="mdi mdi-contact-mail-outline"></i>
            <span>Contact</span>
        </a>
      </li>
      
  
{{-- 
      <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="dripicons-network-1"></i>
              <span>Multi Level</span>
          </a>
          <ul class="sub-menu" aria-expanded="true">
              <li><a href="javascript: void(0);">Level 1.1</a></li>
              <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                  <ul class="sub-menu" aria-expanded="true">
                      <li><a href="javascript: void(0);">Level 2.1</a></li>
                      <li><a href="javascript: void(0);">Level 2.2</a></li>
                  </ul>
              </li>
          </ul>
      </li> --}}

  </ul>
</div>
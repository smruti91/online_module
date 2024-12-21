<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
@if (Auth::user()->role == 'cd')
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Programs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('cd.allProgram')}}">
          <i class="bi bi-circle"></i><span>Approve Program</span>
        </a>
      </li>
      {{-- <li>
        <a href="components-accordion.html">
          <i class="bi bi-circle"></i><span>Accordion</span>
        </a>
      </li> --}}

    </ul>
  </li>
@endif

@if (Auth::user()->role == 'deo')
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Programs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('deo.manageProgram')}}">
          <i class="bi bi-circle"></i><span>Add Program</span>
        </a>
      </li>

    </ul>
  </li>
@endif

@if (Auth::user()->role == 'trainee')
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Course Offered</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('trainee.ModuleWise')}}">
          <i class="bi bi-circle"></i><span>Module Wise</span>
        </a>
      </li>
      {{-- <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>Subject Wise</span>
        </a>
      </li> --}}


    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('get.enrolledPrograms')}}">
      <i class="bi bi-file-earmark"></i>
      <span>Ongoing Programs</span>
    </a>
  </li>
@endif
      <!-- End Components Nav -->

     <!-- End Blank Page Nav -->

    </ul>

  </aside>

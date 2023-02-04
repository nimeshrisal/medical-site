@include('admin.includes.navbar')
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('doctors.index')}}" aria-expanded="false" aria-controls="">
                <i class="mdi mdi-stethoscope menu-icon"></i>
                <span class="menu-title">Doctors</span>
                {{-- <i class="menu-arrow"></i> --}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('slider.index')}}" aria-expanded="false" aria-controls="">
                <i class="mdi mdi-image menu-icon"></i>
                <span class="menu-title">Slider</span>
                {{-- <i class="menu-arrow"></i> --}}
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('blogs.index')}}" aria-expanded="false" aria-controls="">
                <i class="mdi mdi-book menu-icon"></i>
                <span class="menu-title">Blogs</span>
                {{-- <i class="menu-arrow"></i> --}}
              </a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('services.index')}}" aria-expanded="false" aria-controls="">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Services</span>
                {{-- <i class="menu-arrow"></i> --}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('site.setting')}}" aria-expanded="false" aria-controls="">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Site Setting</span>
                {{-- <i class="menu-arrow"></i> --}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('appointments.index')}}" aria-expanded="false" aria-controls="">
                <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">Appointments</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('feedback.index')}}" aria-expanded="false" aria-controls="">
                <i class="mdi mdi-vibrate menu-icon"></i>
                <span class="menu-title">Feedbacks</span>
                {{-- <i class="menu-arrow"></i> --}}
              </a>
            </li>
          </ul>
        </nav>
    
@push('scripts')

<script src="https://www.bootstrapdash.com/demo/skydash/template/vendors/dropify/dropify.min.js"></script>
<script src="https://www.bootstrapdash.com/demo/skydash/template/js/dropify.js"></script>
    
@endpush
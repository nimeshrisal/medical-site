@include('admin.includes.header')
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <a class="navbar-brand brand-logo  me-5  w-100" href="{{URL::to('admin/dashboard')}}">
                <div class="d-flex align-items-center justify-content-start">
                    <img src="{{url('/storage/'.$images[0]->logo)}}" alt="logo" height="50" class="flex-grow-0 me-2">
                    <p class="font-weight-bold text-black flex-grow-1 m-0 text-left ml-1">Docmed Admin</p>
                </div>
              </a>
            <a class="navbar-brand brand-logo-mini  w-100" href="{{URL::to('dashboard')}}">
                <div class="d-flex align-content-center justify-content-center h-100 w-100">
                    <img src="{{url('/storage/'.$images[0]->logo)}}" alt="logo" height="40">
                </div>
                </a>
          </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="{{url('/storage/'.$images[0]->profile)}}" alt="profile">
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"> <i class="ti-power-off text-primary"></i>
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas"><span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">

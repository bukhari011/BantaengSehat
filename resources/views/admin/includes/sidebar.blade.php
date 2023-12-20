 <!-- partial:partials/_sidebar.html -->
 {{-- @auth --}}
     
 <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar" >
   <div class="user-info">
    <img src="{{ asset('admin/images/profile.jpg')}}" alt="">
    @if(Auth::check())
    <p class="name">{{ Auth::user()->name }}</p>
    <p class="designation">{{ Auth::user()->role }}</p>
    @endif

      <span class="online"></span>
    </div>
    <ul class="nav">
      <li class="nav-item {{$status_d??" "}}">
        <a class="nav-link" href="{{route('adminUtama')}}">
          <img src="{{asset('admin/images/icons/1.png')}}" alt="">
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{$status_du??" "}}">
        <a class="nav-link" href="{{route('user')}}">
          <img src="{{asset('admin/images/icons/user.png')}}" alt="">
          <span class="menu-title">Daftar User</span>
        </a>
      </li>
      <li class="nav-item {{$status_dk??" "}}">
        <a class="nav-link" href="{{route('tableKlinik')}}">
          <img src="{{asset('admin/images/icons/2.png')}}" alt="">
          <span class="menu-title">Daftar Klinik</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <img src="images/icons/2.png" alt="">
          <span class="menu-title"><i class="fa fa-sign-out "></i> Log Out</span>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </a>
      </li>
     
    </ul>
  </nav>
  {{-- @endauth --}}
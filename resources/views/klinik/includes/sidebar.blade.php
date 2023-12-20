 <!-- partial:partials/_sidebar.html -->
 <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar" >
    <div class="user-info">
      <div class="image-container  text-primary">
        @if ($clinic)
    <img src="{{ $clinic->picture ? asset($clinic->picture) : asset('admin/images/profile.jpg') }}" alt="{{ $clinic->picture ? 'Gambar Klinik' : 'Gambar Default' }}" class="{{ $clinic->picture ? 'rounded-circle img-fluid' : 'img-thumbnail' }}" style="{{ $clinic->picture ? 'width: 200px; height: 88px; object-fit: cover;' : '' }}">
@else
    <!-- Tampilkan gambar default jika $clinic tidak ada -->
    <img src="{{ asset('admin/images/profile.jpg') }}" alt="Gambar Default" class="img-thumbnail">
@endif

        @if($clinic)
        <a href="{{ route('editKlinik', ['id' => $clinic->id]) }}">
            <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
    @endif
    
           
      </div>
      @if(Auth::check())
      <p class="name">{{ Auth::user()->name }}</p>
      @if(Auth::user()->clinic)
          <p class="name"> Klinik {{ Auth::user()->clinic->name_clinic }}</p>
          <p class="designation">{{ Auth::user()->role }}</p>
      @else
          <p class="name text-warning">Klinik Belum Terdaftar</p>
      @endif
  @else
      <p>silahkan login</p>
  @endif
    
      <span class="online"></span>
    </div>
    <ul class="nav">
      <li class="nav-item {{$status_d??" "}}">
        <a class="nav-link" href="{{route('adminKlinik')}}">
          <img src="{{ asset('admin/images/icons/1.png')}}" alt="">
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{$status_dk?? " "}}">
        <a class="nav-link" href="{{route('tableKamar')}}">
          <img src="{{ asset('admin/images/icons/kamar.png') }}" alt="">
          <span class="menu-title"> Daftar Kamar</span>
        </a>
      </li>
      <li class="nav-item {{$status_dt?? " "}}">
        <a class="nav-link" href="{{route('tableTempatTidur')}} ">
          <img src="{{ asset('admin/images/icons/tempat-tidur.png') }}" alt="">
          <span class="menu-title">Daftar Tempat Tidur</span>
        </a>
      </li>

      <li class="nav-item">
      <a class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out align-self-center "></i>
        <span class="menu-title"> Log Out</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      </a>
    </li>
    </ul>
  </nav>
<nav>
    <!-- Isi dari navbar Anda di sini -->

    <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        {{-- <img src="assets/img/logo.png" alt="">  --}}
        <a href="{{route('home')}}">
          <h1>Bantaeng Sehat</h1>
          </a>
      </a>a

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('home')}}" class="active">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Klinik</span></a> 
       
          </li>
          {{-- <li><a href="about.html">Tentang Kami</a></li>
          <li><a href="contact.html">Kontak</a></li> --}}
          @if (Route::has('login'))
          <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
              @auth
                  @if (auth()->user()->role === 'Admin Klinik')
                      <li><a class="get-a-quote" href="{{ route('adminKlinik') }}">Dashboard</a></li>
                  @elseif (auth()->user()->role === 'Admin Utama')
                      <li><a class="get-a-quote" href="{{ route('adminUtama') }}">Dashboard</a></li>
                  @endif
              @else
                  <li><a class="get-a-quote" href="{{ route('login') }}">Log In</a></li>
              @endauth
          </div>
      @endif
          
          {{-- <li><a class="get-a-quote" href="get-a-quote.html">Get a Quote</a></li> --}}
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
</nav>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- PWA  -->
<meta name="theme-color" content="#6777ef"/>
<link rel="icon" href="{{ asset('icon-bs') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">

  <title>
    {{$title ?? "Bantaeng Sehat APP"}}
  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
        <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('import/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('import/assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <!-- Isi dari navbar Anda di sini -->
    
        <!-- ======= Header ======= -->
      <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    
          <a href="{{route('home')}}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Bantaeng Sehat</h1>
          </a>
    
          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a href="{{route('home')}}" class="{{$index?? " "}}">Beranda</a></li>
              <li class="{{$index?? " "}}"><a href="{{route('klinik')}}">Klinik</a>             </li>
           
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


    {{-- isi Content --}}

    @yield('bodyCompleate')

    {{-- End Content --}}

    {{-- footer --}}
    <footer>
        <!-- Isi dari footer Anda di sini -->
        
        <!-- ======= Footer ======= -->
      <footer id="footer" class="footer">
    
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
              <a href="index.html" class="logo d-flex align-items-center">
                <span>Bantaeng Sehat</span>
              </a>
              <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
              <div class="social-links d-flex mt-4">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
    
            {{-- <div class="col-lg-2 col-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Terms of service</a></li>
                <li><a href="#">Privacy policy</a></li>
              </ul>
            </div> --}}
    
            <div class="col-lg-2 col-6 footer-links">
              <h4>Pintasan</h4>
              <ul>
                <li><a href="{{route('home')}}">Beranda</a></li>
                <li><a href="{{route('klinik')}}">Klinik</a></li>
                {{-- <li><a href="/layanan">Layanan</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/kontak">Kontak</a></li> --}}
              </ul>
            </div>
    
            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
              <h4>Hubungi Kami</h4>
              <p>
               Jalan Poros Banyorang <br>
                Bantaeng<br>
                Indonesia <br><br>
                <strong>Phone:</strong> +62 812 4351 9529<br>
                <strong>Email:</strong> bukharikoin@gmail.com<br>
              </p>
    
            </div>
    
          </div>
        </div>
    
        <div class="container mt-4">
          <div class="copyright">
            &copy; Copyright <strong><span>Bantaeng Sehat</span></strong>. Semua Dilindungi
          </div>
          
        </div>
    
      </footer><!-- End Footer -->
      <!-- End Footer -->
    
      <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
      <div id="preloader"></div>
    
      <!-- Vendor JS Files -->
      <script src="{{ asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('import/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
      <script src="{{ asset('import/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
      <script src="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
      <script src="{{ asset('import/assets/vendor/aos/aos.js') }}"></script>
      <script src="{{ asset('import/assets/vendor/php-email-form/validate.js') }}"></script>
    
      <!-- Template Main JS File -->
      <script src="{{ asset('import/assets/js/main.js') }}"></script>
    
    </footer>
    <script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>
    
    
    
</body>
</html>
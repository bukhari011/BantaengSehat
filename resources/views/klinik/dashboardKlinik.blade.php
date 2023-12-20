<!DOCTYPE html>
<html lang="en">

<head>
 @include('klinik.includes.head')
</head>

<body>
  <div class=" container-scroller">
    {{-- Navbar --}}
    @include('klinik.includes.nav')
    
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
     {{-- sidebar --}}
        @include('klinik.includes.sidebar')

        {{-- Blank Page --}}
        {{-- <div class="content-wrapper"> --}}
          {{-- <h3 class="page-heading mb-4">Dashboard</h3> --}}
          <div class="content-wrapper">
            <h3 class="page-heading mb-4">
              {{$title ?? "Bantaeng Sehat APP"}}
            </h3>
          @yield('dashboardKlinik')
          </div>
         
                  
        {{-- </div> --}}
        
        {{-- footer --}}
        @include('klinik.includes.footer')
        
      </div>
    </div>
    
  </div>
  {{-- Script --}}
  @include('klinik.includes.script')
</body>

</html>

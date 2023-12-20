<!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.includes.head')
</head>

<body>
  <div class=" container-scroller">

    {{-- Navbar --}}
    @include('admin.includes.nav')
    
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        
     {{-- sidebar --}}
        @include('admin.includes.sidebar')

        {{-- Blank Page --}}
        {{-- <div class="content-wrapper"> --}}
          {{-- <h3 class="page-heading mb-4">Dashboard</h3> --}}
          <div class="content-wrapper">
            <h3 class="page-heading mb-4">
              {{$title ?? "Bantaeng Sehat APP"}}
            </h3>
          @yield('dashboardUtama')
          </div>
         
                  
        {{-- </div> --}}
        
        {{-- footer --}}
        @include('admin.includes.footer')
        
      </div>
    </div>
    
  </div>
  {{-- Script --}}
  @include('admin.includes.script')
</body>

</html>

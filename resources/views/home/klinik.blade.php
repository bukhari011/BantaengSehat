@extends('home.includes.compleate')
@php
    $title = "Klinik";
    $klinik = "active";
@endphp
@section('bodyCompleate')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('{{asset ('import/assets/img/klinik/klinik.jpg')}}');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Klinik</h2>
              <p>Kami menyediakan informasi dari beberapa klinik yang terhubung dan terdaftar yang ada di Kabupaten Bantaeng secara realtime</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('klinik')}}">Klinik</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Klinik Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Klinik Terdaftar</span>
          <h2>Klinik Terdaftar</h2>

        </div>

        <div class="row gy-4">

          
        @foreach($clinics as $clinic)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                  <div class="card-img" style="max-height: 200px">
                    <img src="{{ asset($clinic->picture) }}" alt=""  class="img-fluid" width="100%">
                  </div>
                  <h3><a href="{{ route('klinikDetile', $clinic->id) }}" class="stretched-link">{{ $clinic->name_clinic }}</a></h3>
                  <p>{{ $clinic->address }}</p>
              </div>
            </div>
            @endforeach
        <!-- End Card Item -->

        </div>

      </div>
    </section><!-- End Klinik Section -->

  </main><!-- End #main -->
    
@endsection
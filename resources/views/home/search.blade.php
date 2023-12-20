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
            {{-- <div class="col-lg-6 text-center">
              <h2>Services</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div> --}}
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Klinik</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Hasil Pencarian</span>
          <h2>Hasil Pencarian</h2>

        </div>

        <div class="row gy-4">

            <div class="row">
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
            </div>
            

        </div>

      </div>
    </section><!-- End Klinik Section -->

   



  </main><!-- End #main -->
    
@endsection
@extends('home.includes.compleate')
@php
    $title = "Klinik";
    $klinik = "active";
@endphp
@section('bodyCompleate')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('{{ asset($clinic->picture) }}');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Kamar</h2>
              <p>Sekarang kamu dapat mengakses Informasi Kamar Yang tersedia, dan yang sedang digunakan yang ada di Klinik ini</p>
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


    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Klinik {{$clinic->name_clinic}} </span>
          <h2>Klinik {{$clinic->name_clinic}} </h2>

        </div>
          <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter pt-0">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          @foreach($roomsByType as $roomType => $count)
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end=" {{ $count }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Kamar  {{ $roomType }}</p>
            </div>
          </div><!-- End Stats Item -->
          @endforeach

       

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

        <div class="row gy-4">

            @foreach($rooms as $data)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card" >
                    <div class="card-img"  style="max-height: 200px">
                      <img src="{{ asset($data->picture) }}" alt=""  class="img-fluid" width="100%">
                    </div>
                    <h3><a href="{{ route('kamarDetile', ['clinic' => $clinic->id, 'room' => $data->id]) }}" class="stretched-link"> Kamar {{ $data->room_number }}</a></h3>
                    <p>  {{$data->room_type}} dengan kapasitas {{ $roomBedCounts[$data->id]}} Tempat Tidur  </p>
                </div>
            </div>
        @endforeach
        

          

        </div>

      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->
    
@endsection
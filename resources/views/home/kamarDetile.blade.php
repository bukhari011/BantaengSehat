@extends('home.includes.compleate')
@php
    $title = "Klinik";
    $klinik = "active";
@endphp
@section('bodyCompleate')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('{{asset ('import/assets/img/klinik/kamar.jpg')}}');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Kamar</h2>
              <p>Kamar yang tersedia berbagai menyediakan informasi yang sedang digunakan, dibersihkan dan sedang tersedia</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol class="text-primary">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('klinik')}}">Klinik</a></li>
            <li>Kamar</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

   

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Kamar  {{$room->room_number}} </span>
          <h2>Kamar  {{$room->room_number}} </h2>
          

        </div>
       

<section id="stats-counter" class="stats-counter pt-0">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      @foreach($bedsByStatus as $information => $count)
      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end=" {{ $count }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Sedang  {{ $information }}</p>
        </div>
      </div><!-- End Stats Item -->
      @endforeach

   

    </div>

  </div>
</section><!-- End Stats Counter Section -->

        <div class="row gy-4">

            @foreach($beds as $data)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                  <div class="card">
                    <div class="card-img" style="max-height: 200px">
                        <img src="{{ asset($data->picture) }}" alt=""  class="img-fluid" width="100%">
                    </div>
                      <h3><a href="" class="stretched-link"> Tempat Tidur Nomor {{ $data->bed_number }}</a></h3>
                      <p>Status <span class="badge
                        @if ($data->information == 'Terisi') bg-primary text-light
                        @elseif ($data->information == 'Tersedia') bg-success text-light
                        @elseif ($data->information == 'Dibersihkan') bg-warning text-dark
                        @else bg-light text-dark
                        @endif
                    ">{{$data->information}}</span></p>
                    
                    

                  </div>
                </div>
                @endforeach

          

        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->
    
@endsection
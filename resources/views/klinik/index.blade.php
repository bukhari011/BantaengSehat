@extends('klinik.dashboardKlinik')
@php
    $title = "Dashboard Utama";
    $status = "active"
@endphp

@section('dashboardKlinik')

    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-warning">
                  <img src="{{ asset('admin/images/icons/kamar.png')}}" alt="">
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Kamar</p>
                  @if ($roomCount > 0)
                  <h4 class="bold-text text-center">{{ $roomCount }}</h4>
              @endif
               
              </div>
            </div>
            <p class="text-muted">
              {{-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> --}}
               Sekarang sudah Ada
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-success">
                  <img src="{{ asset('admin/images/icons/tempat-tidur.png')}}" alt="">
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Tempat Tidur</p>
                  @if ($bedCount > 0)
                  <h4 class="bold-text text-center">{{ $bedCount }}</h4>
              @endif
              </div>
            </div>
            <p class="text-muted">
              {{-- <i class="fa fa-calendar mr-1" aria-hidden="true"></i> --}}
               Sekarang sudah ada 
            </p>
          </div>
        </div>
      </div>
    </div>
    {{-- Daftar Klinik --}}
  
            

        

            
@endsection
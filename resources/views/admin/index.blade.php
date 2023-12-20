@extends('admin.dashboard')
@php
    $title = "Dashboard Utama";
    $status_d = "active"
@endphp

@section('dashboardUtama')

    <div class="row">
      {{-- @foreach ($users as $user) --}}
          
      {{-- @endforeach --}}
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-danger">
                  <i class="fa fa-user-o highlight-icon" aria-hidden="true"></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">User</p>
                <h4 class="bold-text">
                  {{$users}}
                </h4>
              </div>
            </div>
            <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> Sekarang Sudah Ada 
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-danger">
                  <i class="fa fa-hospital-o highlight-icon" aria-hidden="true"></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Klinik</p>
                <h4 class="bold-text">
                  {{$clinics}}
                </h4>
              </div>
            </div>
            <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> Sekarang Sudah Ada 
            </p>
          </div>
        </div>
      </div>
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
                <h4 class="bold-text">
                  {{$rooms}}
                </h4>
              </div>
            </div>
            <p class="text-muted">
              <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Sekarang Sudah Ada
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
                <h4 class="bold-text">
                  {{$beds}}
                </h4>
              </div>
            </div>
            <p class="text-muted">
              <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sekarang Sudah Ada
            </p>
          </div>
        </div>
      </div>
    </div>


    
    {{-- Daftar Klinik --}}
    @include('admin.indexTableKlinik')
            

        

            
@endsection
@extends('klinik.DashboardKlinik')
@php
    $title = "Form Input Kamar"
@endphp

@section('dashboardKlinik')
    
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h3>Klinik {{ $clinic->name_clinic }}</h3>

            
            <form class="forms-sample" action="{{ route('updateKlinik', ['id' => $clinic->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="name_clinic">Nama Klinik</label>
                <input type="text" class="form-control p-input" value="{{ $clinic->name_clinic }}" id="name_clinic" name="name_clinic"  placeholder="Nama Klinik">
              </div>
              <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control p-input" value="{{ $clinic->address }}" id="address" name="address"  placeholder="">
              </div>
              
              
              <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="text" class="form-control p-input" value="{{ $clinic->phone }}" id="phone" name="phone"  placeholder="">
              </div>
              
              
              <div class="form-group">
                <label for="picture">Pilih Gambar Profile</label>
                <input type="file" class="form-control p-input" id="picture" name="picture"  placeholder="Pilih Gambar">
              </div>
              
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
@endsection
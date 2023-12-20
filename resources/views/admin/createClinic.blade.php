@extends('.admin.dashboard')
@php
    $title ="Form Daftar Klinik";
   

@endphp

@section('dashboardUtama')
<div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <h3>Tambah Klinik untuk {{ $user->name }}</h3>
          
          <form class="forms-sample" action="{{route('clinicStore')}} " method="POST" >
            @csrf
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
              <label for="name_clinic">Nama Klinik</label>
              <input type="text" class="form-control p-input" id="name_clinic" name="name_clinic"  placeholder="Masukkan Nama Klinik">
            </div>
            <div class="form-group">
              <label for="phone">Nomor Telepon</label>
              <input type="text" class="form-control p-input" id="phone" name="phone"  placeholder="Masukkan Nomor Telepon">
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <input type="text" class="form-control p-input" id="address" name="address"  placeholder="Masukkan Alamat Lemkap">
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    
@endsection
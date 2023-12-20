@extends('klinik.DashboardKlinik')
@php
    $title = "Form Input Kamar"
@endphp

@section('dashboardKlinik')
    
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Daftar Kamar</h5>
            
            <form class="forms-sample" action="{{route('prossesTambahKamar')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="room_number">Nomor Kamar</label>
                <input type="text" class="form-control p-input" id="room_number" name="room_number"  placeholder="Nomor Kamar">
                <input type="hidden" name="id_kamar" value="">
              </div>

              <div class="form-group">
                <label for="picture">Tambahkan Gambar</label>
                <input type="file" class="form-control p-input" id="picture" name="picture"  placeholder="Pilih Gambar">
              </div>
              
              <div class="form-group">
                <label for="room_type">Jenis Kamar</label>
                <select type="text" class="form-control form-select" id="room_type" name="room_type" aria-describedby="" placeholder="Pilih Jenis Kamar">
                  <option >Pilih Jenis Kamar</option>
                  <option value="VIP">VIP</option>
                  <option value="Kelas 1">Kelas 1</option>
                  <option value="Kelas 2">Kelas 2</option>
                  <option value="Kelas 3">Kelas 3</option>
                </select>
              </div>  
              <div class="form-group">
                <label for="information">Kaeterangan</label>
                <input type="text" class="form-control p-input" id="information" name="information"  placeholder="Keterangan">
              
              </div>
              <br>          
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
@endsection
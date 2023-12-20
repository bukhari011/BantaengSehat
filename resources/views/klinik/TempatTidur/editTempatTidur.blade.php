@extends('klinik.DashboardKlinik')
@php
    $title = "Form Input Kamar"
@endphp

@section('dashboardKlinik')
    
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h3>Tempat Tidur Nomor {{ $bed->bed_number }}</h3>

            
            <form class="forms-sample" action="{{ route('putBed', $bed->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="bed_number">Nomor Tempat Tidur</label>
                <input type="number" class="form-control p-input" value="{{ $bed->bed_number }}" id="bed_number" name="bed_number"  placeholder="Nomor Tempat Tidur">
              </div>
              
              
              <div class="form-group">
                <label for="picture">Tambahkan Gambar</label>
                <input type="file" class="form-control p-input" id="picture" name="picture"  placeholder="Pilih Gambar">
              </div>
              <div class="form-group">
                <label for="information">Jenis Kamar</label>
                <select type="text" class="form-control form-select" id="information" name="information" aria-describedby="" placeholder="Keterangan">
                  <option value="{{ $bed->information }}">Informasi Kamar</option>
                  <option disabled>Informasi Kamar</option>
                  <option value="Terisi">Terisi</option>
                  <option value="Tersedia">Tersedia</option>
                  <option value="Dibersihkan">Dibersihkan</option>
                  
                </select>
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
@extends('klinik.DashboardKlinik')
@php
    $title = "Form Input Kamar"
@endphp

@section('dashboardKlinik')
    
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h3>{{ $room->roon_number }}</h3>

            
            <form class="forms-sample" action="{{ route('prossesTambahTempatTidur', $room->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="bed_number">Nomor Tempat Tidur</label>
                <input type="number" class="form-control p-input" id="bed_number" name="bed_number"  placeholder="Nomor Tempat Tidur">
              </div>
              
              
              <div class="form-group">
                <label for="picture">Tambahkan Gambar</label>
                <input type="file" class="form-control p-input" id="picture" name="picture"  placeholder="Pilih Gambar">
              </div>
              <div class="form-group">
                <label for="information">Jenis Kamar</label>
                <select type="text" class="form-control form-select" id="information" name="information" aria-describedby="" placeholder="Keterangan">
                  <option >Informasi Kamar</option>
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

    <!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Sukses!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tempat tidur berhasil ditambahkan.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

    
    
@endsection
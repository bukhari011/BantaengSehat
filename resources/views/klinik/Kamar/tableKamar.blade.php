@extends('klinik.dashboardKlinik')
@php
    $title =" Daftar Kamar";
    $status_dk ="active"
    
@endphp


@section('dashboardKlinik')

    
<div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4">Daftar Kamar
            @if(Auth::user()->clinic)
                <a href="{{ route('tambahKamar') }}">
                    <button type="button" class="btn btn-primary mr-2 float-right">
                        <i class="fa fa-plus highlight-icon"></i> Tambah Kamar
                    </button>
                </a>
            @endif
        </h5>
          
          <div class="table-responsive ">
            <table class="table center-aligned-table table table-striped table-hover">
              <thead>
                <tr class="center-aligned-table">
                  <th>No</th>
                  <th>Nomor Kamar</th>
                  <th>Jenis Kamar</th>
                  <th>Gambar</th>
                  <th>bad/Kamar</th>
                  <th>Keterangan</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($roomsWithBedCounts as $key => $roomWithBedCount)
                    <tr class="">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $roomWithBedCount['room']->room_number }}</td>
                        <td>{{ $roomWithBedCount['room']->room_type }}</td>
                        <td>
                            @if($roomWithBedCount['room']->picture)
                                <img src="{{ asset($roomWithBedCount['room']->picture) }}" alt="Gambar Kamar" class="img-fluid" width="50px">
                            @else
                                <img src="{{ asset('import/assets/img/default-room-image.jpg') }}" alt="Gambar Default" class="img-fluid" width="100">
                            @endif
                        </td>
                        <td>{{ $roomWithBedCount['bedCount'] }}</td>
                        <td>{{ $roomWithBedCount['room']->information}} </td>
                        <td><a href="{{ route('tambahTempatTidur', $roomWithBedCount['room']->id) }} " class="btn btn-primary btn-sm">Add Bad</a>
                        </td>
                        <td>
                          <a href="{{ route('editKamar', $roomWithBedCount['room']->id) }}"  data-method="PUT" data-token="{{ csrf_token() }}" class="btn btn-primary btn-sm">Edit</a>
                          <form action="{{ route('deleteKamar', $roomWithBedCount['room']->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

              
            </table>
          </div>
          @if($rooms->isEmpty())
          <p>Tidak ada kamar yang tersedia  atau klinik belum terdaftar</p>
      @else
          <div class="d-flex justify-content-center mt-4">
              {{ $rooms->links('pagination::bootstrap-4') }}
          </div>
      @endif
      
        </div>
      </div>
    </div>
  </div>    

@endsection
@extends('klinik.dashboardKlinik')
@php
    $title =" Daftar Tempat Tidur";
    $status_dt ="active"
    
@endphp


@section('dashboardKlinik')

    
<div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
         
          
          <div class="table-responsive ">
            <table class="table center-aligned-table table table-striped table-hover">
              <thead>
                <tr class="center-aligned-table">
                  <th>No</th>
                  <th>Nomor Tempat Tidur</th>
                  <th>Nomor Kamar</th>
                  <th>Gambar</th>
                  <th>Keterangan</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php
                $counter = 1;
                @endphp
                @foreach ($rooms as $room)
                    @foreach ($room->beds as $data)
                
                    
                <tr class="">
                  <td>{{ $counter++ }}</td>
                  <td>{{ $data->bed_number }}</td>
                  <td>{{ $room->room_number }} / <span class="">{{ $room->room_type }}</span></td>
                  <td>
                    <img src="{{ asset($data->picture) }}" alt="Gambar Tempat Tidur" alt="Gambar Tempat Tidur" width="100">
                  </td>
                  <td>{{$data->information}} </td>
                  <td>
                    <a href="{{ route('editTempatTidur', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('deleteTempatTidur', $data->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
                </tr>
                
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
          @if($rooms->isEmpty())
          <p>Tidak ada tempat tidur yang tersedia atau klinik belum terdaftar</p>
      @else
          <div class="d-flex justify-content-center mt-4">
              {{ $rooms->links('pagination::bootstrap-4') }}
          </div>
      @endif
      </div>
    </div>
  </div>    

@endsection
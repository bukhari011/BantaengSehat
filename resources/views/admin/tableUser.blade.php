@extends('admin.dashboard')
@php
    $title ="Daftar User";
    $status_du = "active"

@endphp
@section('dashboardUtama')

<div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4">Advanced Table</h5>
          <a class="float-right" href=" {{route('createAccount')}}" ><button class="btn btn-primary btn-sm">Add Account</button></a>
          <div class="table-responsive">
            <table class="table center-aligned-table table table-striped table-hover">
              <thead>
                <tr class="center-aligned-table">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Nama Klinik</th>
                  <th></th>
                  <th></th>
           
                </tr>
              </thead>
              <tbody>
                @foreach ($userClinics as $key=> $data)
                    
                <tr class="">
                  <td> {{$key + 1}}</td>
                  <td> {{$data->name}} </td>
                  <td> {{$data->email}} </td>
                  <td> {{$data->role}} </td>
                  <td>
                    @if ($data->role === 'Admin Utama')
                        Tidak perlu daftar
                    @elseif ($data->role === 'Admin Klinik' && $data->clinic)
                        {{ $data->clinic->name_clinic }}
                    @else
                        <a href="{{ route('clinicCreate', $data->id) }}" class="btn btn-primary btn-sm">Daftarkan</a>
                    @endif
                </td>
                  <td>
                    <a href="{{ route('editUser', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  </form>
                  
                  </td>
                  <td>
                    <form action="{{ route('deleteUser', ['id' => $data->id]) }}" method="POST">
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
        </div>
      </div>
    </div>
  </div>    

@endsection
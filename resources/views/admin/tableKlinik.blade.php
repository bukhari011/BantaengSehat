@extends('admin.dashboard')
@php
    $title ="Daftar Klinik";
    $status_dk = "active"

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
                  <th>Nama Klinik</th>
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
                  <th></th>
                  <th></th>
              
                </tr>
              </thead>
              <tbody>
                @foreach ($kliniks as $key=> $data)
                
                    
                <tr class="">
                  <td> {{$key + 1}}</td>
                  <td> {{$data->name_clinic}} </td>
                  <td> {{$data->address}} </td>
                  <td> {{$data->phone}} </td>
                  
                  <td><a href="#" class="btn btn-primary btn-sm">Edit</a>
                  </td>
                  <td>
                     <a href="#" class="btn btn-danger btn-sm">Hapus</a></td>
                 
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
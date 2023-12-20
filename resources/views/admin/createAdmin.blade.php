@extends('.admin.dashboard')
@php
    $title ="Form Tambah Admin";
   

@endphp

@section('dashboardUtama')
<div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          
          <form class="forms-sample" action=" " method="POST" >
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control p-input" id="name" name="name"  placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control p-input" id="email" name="email"  placeholder="Masukkan Email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control p-input" id="name" name="name"  placeholder="Password">
            </div>
            <div class="form-group">
              <label for="role">Pilih Role/ Peran</label>
              <select type="text" class="form-control form-select" id="role" name="role" aria-describedby="" placeholder="Pilih Jenis Kamar">
                <option hidden value="Admin Utma">Pilih Role</option>
                <option value="Admin Utma">Admin Utma</option>
                <option value="Admin Klinik">Admin Klinik</option>
                
              </select>
            </div>  
            <br>          
          
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    
@endsection
@extends('.admin.dashboard')
@php
    $title ="For Edit User ";
   

@endphp

@section('dashboardUtama')
<div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          
          <form class="forms-sample" action="{{ route('updateUser', ['id' => $user->id]) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control p-input" id="name" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control p-input" id="email" name="email"  value="{{$user->email}}">
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
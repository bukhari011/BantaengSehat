
<div class="card">
    <div class="card-body">
      <h5 class="card-title mb-4">Daftar Klinik</h5>
      <table class="table table-striped">
        <thead>
          <tr class="">
            <th>No</th>
            <th>Nama Klinik</th>
            <th>alamat</th>
            <th>Jumlah Kamar</th>
            <th>Jumlah Tempat Tidur</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($kliniks as $key=> $data)
            <th scope="row"> {{$key + 1}}</th>
            <td>
              {{$data->name_clinic}}
            </td>
            <td>
              {{$data->address}}
            </td>
            <td> - </td>
            <td> - </td>
          </tr>
            
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
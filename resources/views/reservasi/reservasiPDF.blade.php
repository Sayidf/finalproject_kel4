<!DOCTYPE html>
<html>
<head>
  <title>Data Reservasi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h3 class="text-center">Data Reservasi</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal Reservasi</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Jumlah Orang</th>
        <th>No Meja</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($reservasi as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->users->fullname }}</td>
        <td>{{ $row->tgl_reservasi }}</td>
        <td>{{ $row->jam_in }}</td>
        <td>{{ $row->jam_out }}</td>
        <td>{{ $row->jml_orang }}</td>
        <td>{{ $row->meja->no_meja }}</td>
        <td>{{ $row->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
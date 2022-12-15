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
        <th>Kode Booking</th>
        <th>Tanggal Pembayaran</th>
        <th>Total Pembayaran</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($pembayaran as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ 'TRX-'.sprintf('%07d',$row->reservasi->id) }}</td>
        <td>{{ $row->tgl_pembayaran }}</td>
        <td>{{ $row->total_bayar }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Data Menu</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h3 class="text-center">Data Menu</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($menu as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->kategori->nama }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->harga }}</td>
        <td>{{ $row->ket }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
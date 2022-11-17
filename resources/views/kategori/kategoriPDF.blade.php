<!DOCTYPE html>
<html>
<head>
  <title>Data Kategori</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h3 class="text-center">Data Kategori</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kategori</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($kategori as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->nama }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
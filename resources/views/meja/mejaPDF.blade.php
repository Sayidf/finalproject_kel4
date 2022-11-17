<!DOCTYPE html>
<html>
<head>
  <title>Data Meja</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h3 class="text-center">Data Meja</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>No Meja</th>
        <th>Kapasitas</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($meja as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->no_meja }}</td>
        <td>{{ $row->kapasitas }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
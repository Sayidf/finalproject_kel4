<!DOCTYPE html>
<html>
<head>
  <title>Data Customer</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h3 class="text-center">Data Customer</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Username</th>
        <th>Email</th>
        <th>Nomor Telepon</th>
        <th>Tanggal Register</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($customer as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->fullname }}</td>
        <td>{{ $row->username }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->no_hp }}</td>
        <td>{{ $row->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
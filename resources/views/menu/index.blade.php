@extends('back.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Menu</h4>
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus"></i>
                                Tambah Menu
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="text" class="form-control input-default " placeholder="Nama" name="nama">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control input-rounded" placeholder="Harga" name="harga">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control input-rounded" placeholder="Foto" name="foto">
                                            </div>
                                            <div class="mb-3">
                                                <textarea name="ket" id="comment" class="form-control" rows="4" placeholder="Keterangan"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>NO</strong></th>
                                        <th><strong>FOTO</strong></th>
                                        <th><strong>NAMA</strong></th>
                                        <th><strong>PRICE</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>100</td>
                                        <td><img class="rounded-circle" width="50" src="https://imgs.search.brave.com/ayCGV163wL7_8zo5dqDeFENLzkavod8-nyZy5bAqh5A/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9pMi53/cC5jb20vY2hpbGlw/ZXBwZXJtYWRuZXNz/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMC8xMS9OYXNp/LUdvcmVuZy1JbmRv/bmVzaWFuLUZyaWVk/LVJpY2UtU1EuanBn" alt=""></td>
                                        <td>Nasi Goreng Seafood</td>
                                        <td>30.000</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>100</td>
                                        <td><img class="rounded-circle" width="50" src="https://imgs.search.brave.com/ayCGV163wL7_8zo5dqDeFENLzkavod8-nyZy5bAqh5A/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9pMi53/cC5jb20vY2hpbGlw/ZXBwZXJtYWRuZXNz/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMC8xMS9OYXNp/LUdvcmVuZy1JbmRv/bmVzaWFuLUZyaWVk/LVJpY2UtU1EuanBn" alt=""></td>
                                        <td>Nasi Goreng Seafood</td>
                                        <td>30.000</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>100</td>
                                        <td><img class="rounded-circle" width="50" src="https://imgs.search.brave.com/ayCGV163wL7_8zo5dqDeFENLzkavod8-nyZy5bAqh5A/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9pMi53/cC5jb20vY2hpbGlw/ZXBwZXJtYWRuZXNz/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMC8xMS9OYXNp/LUdvcmVuZy1JbmRv/bmVzaWFuLUZyaWVk/LVJpY2UtU1EuanBn" alt=""></td>
                                        <td>Nasi Goreng Seafood</td>
                                        <td>30.000</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>100</td>
                                        <td><img class="rounded-circle" width="50" src="https://imgs.search.brave.com/ayCGV163wL7_8zo5dqDeFENLzkavod8-nyZy5bAqh5A/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9pMi53/cC5jb20vY2hpbGlw/ZXBwZXJtYWRuZXNz/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMC8xMS9OYXNp/LUdvcmVuZy1JbmRv/bmVzaWFuLUZyaWVk/LVJpY2UtU1EuanBn" alt=""></td>
                                        <td>Nasi Goreng Seafood</td>
                                        <td>30.000</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
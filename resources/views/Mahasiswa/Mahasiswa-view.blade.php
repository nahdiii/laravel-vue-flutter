<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
    <title>Tes Laravel Vue Flutter</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        @include('template.navbar')
        @include('template.left-sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Selamat Datang di Aplikasi SIAP</h1>
                            <h4>(Sistem Informasi Arsip Persuratan)</h4>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div> --}}
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Data Mahasiswa</h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <a href="{{ route('add-mhs') }}" class="btn btn-success">
                                Tambah Mahasiswa
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>

                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 15%">
                                            <center>ID</center>
                                        </th>
                                        <th>
                                            <center>Nama</center>
                                        </th>
                                        <th>
                                            <center>No. Telepon</center>
                                        </th>

                                        <th style="width: 15%">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>

                                    @foreach ($mhs as $item)

                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>
                                            <center>
                                                <a href="{{ url('edit-mhs/'.$item->id) }}" title="Edit Data">
                                                    <i class="fas fa-edit blue"></i>
                                                </a>
                                                |
                                                <a href="{{ url('hapus-mhs/'.$item->id) }}" title="Hapus Data">
                                                    <i class="fas fa-trash-alt red"></i>
                                                </a>
                                            </center>
                                        </td>

                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"></div>
                </div>

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        @include('template.footer')
    </div>


    <!-- ./wrapper -->
    <!-- jQuery -->
    @include('template.script')
</body>

</html>

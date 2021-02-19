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

                <router-view></router-view>
                <vue-progress-bar></vue-progress-bar>
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

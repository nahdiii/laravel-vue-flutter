<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="#" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Laravel Vue Flutter</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="#" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                {{-- <a href="#" class="d-block"> <b>{{auth()->user()->name}} {{auth()->user()->nameBelakang}}</b></a> --}}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt cyan"></i>
                        <p>
                            <b>Dashboard</b>
                        </p>
                    </a>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope orange"></i>
                        <p>
                            <b> Uji Coba </b>
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <li class="nav-item">
                                <router-link to="/user-register" class="nav-link">

                                    {{-- <a href="{{url('/isi-surat-keluar')}}" class="nav-link"> --}}
                                    <i class="nav-icon fas fa-plus-circle orange"></i>
                                    <p>
                                        Pengguna
                                    </p>
                                    {{-- </a> --}}
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link to="/kategori" class="nav-link">
                                    {{-- <a href="{{url('/isi-surat-keluar')}}" class="nav-link"> --}}
                                    <i class="nav-icon fas fa-plus-circle orange"></i>
                                    <p>
                                        Kategori
                                    </p>
                                    {{-- </a> --}}
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link to="/data-kirim-masuk" class="nav-link">
                                    {{-- <a href="{{url('/isi-surat-keluar')}}" class="nav-link"> --}}
                                    <i class="nav-icon fas fa-plus-circle orange"></i>
                                    <p>
                                        Data Kirim Masuk
                                    </p>
                                    {{-- </a> --}}
                                </router-link>
                            </li>


                            <li class="nav-item">
                                <a href="/show-mhs" class="nav-link">

                                    <i class="nav-icon fab fa-android green"></i>
                                    <p>
                                        Mahasiswa
                                    </p>

                                </a>
                            </li>

                        </div>
                    </ul>
                </li>




                <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
                <li class="nav-item">
                    <a href="{{route('logOut')}}" class="nav-link">
                        <i class="nav-icon fas fa-power-off red"></i>
                        <p>
                            <b>Logout</b>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('master/dist/img/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-10"
            style="width: 35px">
        <span class="brand-text font-weight-light">POLIKLINIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('polyclinics.index') }}" class="nav-link">
                        <i class="fa-light fas fa-stethoscope"></i>
                        <p>
                            Poliklinik
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('doctors.index') }}" class="nav-link">
                        <i class="fa-regular fas fa-hospital-user"></i>
                        <p>
                            Doctor
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('patients.index') }}" class="nav-link">
                        <i class="fa-regular fas fa-user"></i>
                        <p>
                            Pasien
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

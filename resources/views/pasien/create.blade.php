<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pasien</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="col-md-8 offset-md-2">

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div><br>
            @endif

            <div class="card my-3">
                <div class="card-header">
                    Form Tambah Pasien
                </div>
                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="code">No. Registrasi</label>
                            <input type="text" class="form-control" name="registration_code">
                        </div>
                        <div class="form-group mt-2">
                            <label for="name">Nama Pasien</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mt-2">
                            <label for="name">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="birthdate">
                        </div>
                        <div class="form-group mt-2">
                            <label for="name">Jenis Kelamin</label>
                            <select class="form-control" name="gender">
                                <option> Pria </option>
                                <option> Wanita </option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="name">Poli</label>
                            <select class="form-control" name="polyclinic_id">
                                @foreach ($polyclinics as $polyclinic)
                                    <option value="{{ $polyclinic->id }}"> {{ $polyclinic->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="name">Dokter</label>
                            <select class="form-control" name="doctor_id">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>

        </div>

        <!-- Main Footer -->
        @include('layout.footer')
    </div>

    <!-- REQUIRED SCRIPTS -->
    @include('layout.script')
</body>

</html>

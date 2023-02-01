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
                            <h1 class="m-0">Beranda</h1>
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

            {{-- menampilkan error inputan --}}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        {{-- Menampilkan Pesan --}}
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card my-3">
                <div class="card-header">
                    Form Edit Doctor
                </div>
                <div class="card-body">
                    <form action="{{ route('doctors.update', $doctors->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">No. Registrasi</label>
                            <input type="text" class="form-control" name="registration_code"
                                value="{{ $doctors->registration_code }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $doctors->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Poliklinik</label>
                            <select name="polyclinics_id" value="{{ $doctor->polyclinics_id }}" class="form-control">
                                @foreach ($polyclinics as $polyclinic)
                                    <option value="{{ $polyclinic->id }}"> {{ $polyclinic->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="simpan" class="btn btn-success">
                        </div>
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

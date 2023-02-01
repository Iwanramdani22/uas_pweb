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

            <a href="{{ route('patients.create') }}" class="btn btn-success mt-3">Tambah Data</a>
            <div class="col-sm-12">
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <div class="card my-3">
                <div class="card-header">
                    Data Pasien
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>No. Registrasi</th>
                            <th>Nama Pasien</th>
                            <th>Tgl Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Poli</th>
                            <th>Nama Dokter</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $patient->registration_code }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->birthdate }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{ $patient->polyclinics->name }}</td>
                                <td>{{ $patient->doctors->name }}</td>
                                <td>
                                    <a href="{{ route('patients.edit', $patient->id) }}"
                                        class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </table>
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

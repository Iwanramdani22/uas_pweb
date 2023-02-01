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
                                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                                <li class="breadcrumb-item active">doctor</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            {{-- menampilkan error inputan --}}

            <a href="{{ route('doctors.create') }}" class="btn btn-success mt-3">Tambah Data</a>
            <div class="col-sm-12">
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <div class="card my-3">
                <div class="card-header">
                    Data Doctor
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>No. Registrasi</th>
                            <th>Nama Dokter</th>
                            <th>Nama Poliklinik</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $doctor->registration_code }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->polyclinics->name }}</td>
                                <td>
                                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST">
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

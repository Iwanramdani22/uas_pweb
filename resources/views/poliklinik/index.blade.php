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
                            <h1 class="m-0">Poliklinik</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                                <li class="breadcrumb-item active">Poliklinik</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <a href="{{ route('polyclinics.create') }}" class="btn btn-success mt-3">Tambah Data</a>
            <div class="col-sm-12">
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <div class="card my-3">
                <div class="card-header">
                    Data Poliklinik
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama Poli</th>
                            <th>Jumlah Dokter</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($polyclinics as $polyclinic)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $polyclinic->name }}</td>
                                <td>
                                    <a href="{{ route('polyclinics.show', $polyclinic->id) }}"
                                        title="Lihat Data Dokter">
                                        {{ count($polyclinic->doctors) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('polyclinics.edit', $polyclinic->id) }}"
                                        class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('polyclinics.destroy', $polyclinic->id) }}" method="POST">
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

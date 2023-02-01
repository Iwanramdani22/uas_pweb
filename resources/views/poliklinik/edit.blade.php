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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">poliklinik</li>
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
                    Form Edit Poliklinik
                </div>
                <div class="card-body">
                    <form action="{{ route('polyclinics.update', $polyclinic->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="name">Nama Poliklinik</label>
                            <input type="text" class="form-control" name="name" value="{{ $polyclinic->name }}">
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

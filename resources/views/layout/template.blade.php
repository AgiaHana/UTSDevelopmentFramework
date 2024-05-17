<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f8ff;
        }

        .sidebar {
            background-color: #7F27FF;
            padding-top: 20px;
            height: 100vh;
        }

        .sidebar .nav-link {
            color: #f0f8ff;
            margin: 5px 0;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        .container-main {
            padding: 20px;
        }

        .navbar {
            background-color: #FFAF45;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #f0f8ff;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyStuffMayapala</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Main layout -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 bg-purple sidebar">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">Dashboard</a>
                    </li>
                    <li>
                        <a href='{{ route('peralatan.index') }}' class="nav-link">List Peralatan</a>
                    </li>
                    <li>
                        <a href='{{ route('peminjaman.index') }}' class="nav-link">Peminjaman alat</a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.recap') }}" class="nav-link">Recap Data</a>
                    </li>
                    <li>
                        <a href='{{ route('profile.index') }}' class="nav-link">Profile Pengguna</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">Logout</a>
                    </li>
                </ul>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 container-main">
                @include('komponen.pesan')
                @yield('konten')
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>

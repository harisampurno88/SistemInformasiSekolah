<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
        <div class="container d-flex flex-column flex-md-row align-items-center pb-2 mb-2 gap-3">
            <a href="/siswa" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4">Data Siswa</span>
            </a>
            <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4">Data Guru</span>
            </a>
            <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4">Data Kelas</span>
            </a>
            <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4">Data Mata Pelajaran</span>
            </a>
        </div>
    </nav>

    <main class="container">
        @include('komponen.pesan')
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>

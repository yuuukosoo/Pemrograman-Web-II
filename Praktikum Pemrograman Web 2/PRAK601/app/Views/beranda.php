<!DOCTYPE html>
<html lang="id">
<head>
    <title>Beranda - PRAK601</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .full-img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url(); ?>">PRAK601</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="<?= base_url(); ?>">Beranda</a>
                <a class="nav-link" href="<?= base_url('profil'); ?>">Profil</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row align-items-stretch bg-primary text-white rounded-3 shadow overflow-hidden">
            
            <div class="col-md-7 p-5">
                <h1 class="display-4 fw-bold mb-3">Selamat Datang!</h1>
                <p class="lead">Website ini menggunakan framework CodeIgniter 4 dengan konsep Model-View-Controller.</p>
                <hr class="my-4 border-white">
                
                <h3 class="fw-normal"><?= $mhs['nama']; ?></h3>
                <h4 class="fw-light opacity-75"><?= $mhs['nim']; ?></h4>
                
                <a href="<?= base_url('profil'); ?>" class="btn btn-outline-light mt-4">Lihat Profil Lengkap</a>
            </div>

            <div class="col-md-5 p-0 d-none d-md-block">
                <img src="<?= base_url('ilustrasi.jpg'); ?>" alt="Foto" class="full-img">
            </div>

        </div>
    </div>
    
</body>
</html>
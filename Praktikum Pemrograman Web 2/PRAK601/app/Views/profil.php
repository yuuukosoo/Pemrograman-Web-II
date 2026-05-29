<!DOCTYPE html>
<html lang="id">
<head>
    <title>Profil - PRAK601</title>
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url(); ?>">PRAK601</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?= base_url(); ?>">Beranda</a>
                <a class="nav-link active" href="<?= base_url('profil'); ?>">Profil</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row align-items-stretch bg-white  rounded-3 overflow-hidden mx-auto" style="max-width: 900px;">
            
            <div class="col-md-5 p-0 d-none d-md-block">
                <img src="<?= base_url('ilustrasi.jpg'); ?>" alt="Profil" class="full-img">
            </div>

            <div class="col-md-7 p-5">
                <h2 class="fw-bold mb-4 text-primary">Profil Praktikan</h2>
                <hr>
                <table class="table table-borderless mt-3">

                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?= $detail['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?= $detail['nim']; ?></td>
                    </tr>
                    <tr>
                        <td>Asal Prodi</td>
                        <td>:</td>
                        <td><?= $detail['prodi']; ?></td>
                    </tr>
                    <tr>
                        <td>Hobi</td>
                        <td>:</td>
                        <td><?= $detail['hobi']; ?></td>
                    </tr>
                    <tr>
                        <td>Skill</td>
                        <td>:</td>
                        <td><span><?= $detail['skill']; ?></span></td>
                    </tr>
                </table>
                <div class="mt-4 d-grid">
                    <a href="<?= base_url(); ?>" class="btn btn-primary rounded-pill py-2 w-100">Kembali ke Beranda</a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
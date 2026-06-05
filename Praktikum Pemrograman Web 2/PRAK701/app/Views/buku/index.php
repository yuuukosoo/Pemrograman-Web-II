<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<nav class="navbar-duo">
    <div class="navbar-brand-duo">yuuukosoo <span style="color: #3c3c3c; font-weight: 700;">books</span></div>
    <div>
        <span class="navbar-user-duo">Halo, <?= session()->get('username') ?>!</span>
        <a href="/logout" class="btn-duo btn-duo-red btn-sm" style="margin-left: 12px;">Logout</a>
    </div>
</nav>

<div class="container-duo">
    <div class="header-section">
        <h2>Daftar Buku</h2>
        <a href="/buku/create" class="btn-duo btn-duo-green">+ Tambah Buku</a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-duo alert-duo-success">
            🎉 <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="table-container-duo">
        <table class="table-duo">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($buku)) : ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: #afafaf;">Belum ada data buku tersedia.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($buku as $row) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= esc($row['judul']) ?></td>
                            <td><?= esc($row['penulis']) ?></td>
                            <td><?= esc($row['penerbit']) ?></td>
                            <td><?= esc($row['tahun_terbit']) ?></td>
                            <td>
                                <div class="action-group">
                                    <a href="/buku/edit/<?= $row['id'] ?>" class="btn-duo btn-duo-orange btn-sm">Edit</a>
                                    <a href="/buku/delete/<?= $row['id'] ?>" class="btn-duo btn-duo-red btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
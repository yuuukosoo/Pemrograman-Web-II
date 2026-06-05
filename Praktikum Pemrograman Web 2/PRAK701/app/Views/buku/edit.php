<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<div class="container-duo" style="max-width: 600px;">
    <div class="card-duo">
        <h4 style="margin-bottom: 24px;">Edit Buku</h4>

        <?php $validation = session()->getFlashdata('validation'); ?>

        <?php if (isset($validation) && $validation->hasError('tahun_terbit')) : ?>
            <div class="alert-duo alert-duo-warning">
                ⚠️ <?= $validation->getError('tahun_terbit') ?>
            </div>
        <?php endif; ?>

        <form action="/buku/update/<?= $buku['id'] ?>" method="post">
            <div class="form-group-duo">
                <label class="form-label-duo">Judul Buku</label>
                <input type="text" name="judul" class="input-duo <?= (isset($validation) && $validation->hasError('judul')) ? 'is-invalid' : '' ?>" value="<?= old('judul', $buku['judul']) ?>">
                <?php if (isset($validation) && $validation->hasError('judul')) : ?>
                    <div class="invalid-feedback-duo"><?= $validation->getError('judul') ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group-duo">
                <label class="form-label-duo">Penulis</label>
                <input type="text" name="penulis" class="input-duo <?= (isset($validation) && $validation->hasError('penulis')) ? 'is-invalid' : '' ?>" value="<?= old('penulis', $buku['penulis']) ?>">
                <?php if (isset($validation) && $validation->hasError('penulis')) : ?>
                    <div class="invalid-feedback-duo"><?= $validation->getError('penulis') ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group-duo">
                <label class="form-label-duo">Penerbit</label>
                <input type="text" name="penerbit" class="input-duo <?= (isset($validation) && $validation->hasError('penerbit')) ? 'is-invalid' : '' ?>" value="<?= old('penerbit', $buku['penerbit']) ?>">
                <?php if (isset($validation) && $validation->hasError('penerbit')) : ?>
                    <div class="invalid-feedback-duo"><?= $validation->getError('penerbit') ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group-duo">
                <label class="form-label-duo">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" min="1801" max="2023" class="input-duo <?= (isset($validation) && $validation->hasError('tahun_terbit')) ? 'is-invalid' : '' ?>" value="<?= old('tahun_terbit', $buku['tahun_terbit']) ?>">
                <div class="form-text-duo">Tahun harus di antara 1801 sampai 2023.</div>
                <?php if (isset($validation) && $validation->hasError('tahun_terbit')) : ?>
                    <div class="invalid-feedback-duo"><?= $validation->getError('tahun_terbit') ?></div>
                <?php endif; ?>
            </div>

            <div class="action-group" style="justify-content: space-between; margin-top: 32px;">
                <a href="/buku" class="btn-duo btn-duo-secondary">Kembali</a>
                <button type="submit" class="btn-duo btn-duo-orange">Perbarui</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<?php
date_default_timezone_set('Asia/Makassar');

require_once 'Model.php';

$id = '';
$id_member = '';
$id_buku = '';
$tgl_pinjam = '';
$tgl_kembali = '';
$is_edit = false;

$members = get_all_member();
$books = get_all_buku();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $borrow = get_peminjaman_by_id($id);
    if ($borrow) {
        $id_member = $borrow['id_member'];
        $id_buku = $borrow['id_buku'];
        $tgl_pinjam = date('Y-m-d', strtotime($borrow['tgl_pinjam']));
        $tgl_kembali = date('Y-m-d', strtotime($borrow['tgl_kembali']));
        $is_edit = true;
    }
}


if (isset($_POST['submit'])) {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if ($is_edit) {
        if (update_peminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali)) {
            header("Location: Peminjaman.php");
            exit;
        }
    } else {
        if (insert_peminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali)) {
            header("Location: Peminjaman.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? 'Edit' : 'Tambah' ?> Transaksi - Perpustakaan Minimalis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pastelgreen: {
                            50: '#f4fbf7',
                            100: '#e6f7ed',
                            200: '#cfe9db',
                            500: '#5ab081',
                            600: '#469368',
                            800: '#2c5e42'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-pastelgreen-50 min-h-screen text-gray-800">

    <header class="bg-white border-b border-pastelgreen-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex flex-col sm:flex-row justify-between items-center gap-4">
            <span class="text-xl font-semibold text-pastelgreen-800 tracking-tight flex items-center gap-2">
                <span class="text-2xl">🌱</span> Perpus PRAK501
            </span>
            <nav class="flex gap-1 bg-gray-100 p-1 rounded-lg">
                <a href="Member.php" class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-600 hover:text-pastelgreen-800">Member</a>
                <a href="Buku.php" class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-600 hover:text-pastelgreen-800">Buku</a>
                <a href="Peminjaman.php" class="px-4 py-1.5 text-sm font-medium rounded-md bg-white text-pastelgreen-800 shadow-sm">Peminjaman</a>
            </nav>
        </div>
    </header>

    <main class="max-w-xl mx-auto px-4 py-10">
        <div class="bg-white border border-pastelgreen-100 rounded-2xl shadow-sm p-6 sm:p-8">
            <div class="mb-6">
                <a href="Peminjaman.php" class="text-pastelgreen-600 hover:text-pastelgreen-800 text-sm font-medium inline-flex items-center gap-1 mb-2">
                    ← Kembali ke Daftar
                </a>
                <h1 class="text-2xl font-bold text-gray-900"><?= $is_edit ? 'Ubah Transaksi' : 'Catat Transaksi' ?> Peminjaman</h1>
                <p class="text-sm text-gray-500 mt-1">Gunakan dropdown untuk menghubungkan data member dan buku.</p>
            </div>

            <form action="" method="post" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Pilih Member / Anggota</label>
                    <select name="id_member" required class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-3 text-sm focus:outline-none transition-all bg-white">
                        <option value="">-- Silakan Pilih Anggota --</option>
                        <?php foreach ($members as $m): ?>
                        <option value="<?= $m['id_member'] ?>" <?= $id_member == $m['id_member'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($m['nama_member']) ?> (<?= htmlspecialchars($m['nomor_member']) ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Pilih Buku yang Dipinjam</label>
                    <select name="id_buku" required class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-3 text-sm focus:outline-none transition-all bg-white">
                        <option value="">-- Silakan Pilih Buku --</option>
                        <?php foreach ($books as $b): ?>
                        <option value="<?= $b['id_buku'] ?>" <?= $id_buku == $b['id_buku'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($b['judul_buku']) ?> - <?= htmlspecialchars($b['penulis']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Tanggal Peminjaman</label>
                        <input type="date" name="tgl_pinjam" value="<?= htmlspecialchars($tgl_pinjam) ?>" required class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Tanggal Kembali (Estimasi/Batas)</label>
                        <input type="date" name="tgl_kembali" value="<?= htmlspecialchars($tgl_kembali) ?>" required class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-all">
                    </div>
                </div>

                <div class="flex gap-3 justify-end pt-6 border-t border-gray-100 mt-6">
                    <a href="Peminjaman.php" class="border border-gray-200 hover:bg-gray-50/80 text-gray-500 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors">
                        Batal
                    </a>
                    <button type="submit" name="submit" class="bg-pastelgreen-500 hover:bg-pastelgreen-600 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition-colors shadow-sm">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
<?php
date_default_timezone_set('Asia/Makassar');

require_once 'Model.php';

$id = '';
$nama = '';
$nomor = '';
$alamat = '';
$tgl_daftar = '';
$tgl_bayar = '';
$is_edit = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $member = get_member_by_id($id);
    if ($member) {
        $nama = $member['nama_member'];
        $nomor = $member['nomor_member'];
        $alamat = $member['alamat'];

        $tgl_daftar = date('Y-m-dTH:i', strtotime($member['tgl_mendaftar']));
        $tgl_bayar = date('Y-m-d', strtotime($member['tgl_terakhir_bayar']));
        $is_edit = true;
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_member'];
    $nomor = $_POST['nomor_member'];
    $alamat = $_POST['alamat'];
    
    $tgl_daftar = str_replace('T', ' ', $_POST['tgl_mendaftar']);
    $tgl_bayar = $_POST['tgl_terakhir_bayar'];

    if ($is_edit) {
        if (update_member($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar)) {
            header("Location: Member.php");
            exit;
        }
    } else {
        if (insert_member($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar)) {
            header("Location: Member.php");
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
    <title><?= $is_edit ? 'Edit' : 'Tambah' ?> Member - Perpustakaan Minimalis</title>
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
                <a href="Member.php" class="px-4 py-1.5 text-sm font-medium rounded-md bg-white text-pastelgreen-800 shadow-sm">Member</a>
                <a href="Buku.php" class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-600 hover:text-pastelgreen-800">Buku</a>
                <a href="Peminjaman.php" class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-600 hover:text-pastelgreen-800">Peminjaman</a>
            </nav>
        </div>
    </header>

    <main class="max-w-xl mx-auto px-4 py-10">
        <div class="bg-white border border-pastelgreen-100 rounded-2xl shadow-sm p-6 sm:p-8">
            <div class="mb-6">
                <a href="Member.php" class="text-pastelgreen-600 hover:text-pastelgreen-800 text-sm font-medium inline-flex items-center gap-1 mb-2">
                    ← Kembali ke Daftar
                </a>
                <h1 class="text-2xl font-bold text-gray-900"><?= $is_edit ? 'Ubah Data' : 'Tambah Data' ?> Member</h1>
                <p class="text-sm text-gray-500 mt-1">Isi formulir berikut dengan teliti.</p>
            </div>

            <form action="" method="post" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                    <input type="text" name="nama_member" value="<?= htmlspecialchars($nama) ?>" required class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Nomor Member</label>
                    <input type="text" name="nomor_member" value="<?= htmlspecialchars($nomor) ?>" required class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-all font-mono" placeholder="Contoh: MB001">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Alamat Domisili</label>
                    <textarea name="alamat" required rows="3" class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-all" placeholder="Tulis alamat lengkap Anda..."><?= htmlspecialchars($alamat) ?></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Tanggal Mendaftar</label>
                        <input type="datetime-local" name="tgl_mendaftar" value="<?= htmlspecialchars($tgl_daftar) ?>" required class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Tgl. Terakhir Bayar</label>
                        <input type="date" name="tgl_terakhir_bayar" value="<?= htmlspecialchars($tgl_bayar) ?>" required class="w-full border border-gray-200 hover:border-pastelgreen-200 focus:border-pastelgreen-500 hover:bg-gray-50/50 focus:bg-white rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-all">
                    </div>
                </div>

                <div class="flex gap-3 justify-end pt-6 border-t border-gray-100 mt-6">
                    <a href="Member.php" class="border border-gray-200 hover:bg-gray-50/80 text-gray-500 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors">
                        Batal
                    </a>
                    <button type="submit" name="submit" class="bg-pastelgreen-500 hover:bg-pastelgreen-600 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition-colors shadow-sm">
                        Simpan Member
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
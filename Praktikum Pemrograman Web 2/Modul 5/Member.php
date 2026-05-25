<?php
date_default_timezone_set('Asia/Makassar');

require_once 'Model.php';

if (isset($_GET['id_member'])) {
    $id = $_GET['id_member'];
    if (delete_member($id)) {
        header("Location: Member.php");
        exit;
    }
}

$members = get_all_member();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member - Perpustakaan Minimalis</title>

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
                    <span class="text-2xl"></span> Perpus yuuukosoo
                </span>
            <nav class="flex gap-1 bg-gray-100 p-1 rounded-lg">
                <a href="Member.php" class="px-4 py-1.5 text-sm font-medium rounded-md bg-white text-pastelgreen-800 shadow-sm">Member</a>
                <a href="Buku.php" class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-600 hover:text-pastelgreen-800">Buku</a>
                <a href="Peminjaman.php" class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-600 hover:text-pastelgreen-800">Peminjaman</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Data Member</h1>
                <p class="text-sm text-gray-500 mt-1">Daftar anggota aktif perpustakaan Modul 5</p>
            </div>
            <a href="FormMember.php" class="bg-pastelgreen-500 hover:bg-pastelgreen-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm inline-flex items-center gap-1.5 self-start sm:self-auto">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Tambah Member
            </a>
        </div>

        <div class="bg-white border border-pastelgreen-100 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-pastelgreen-100/50 border-b border-pastelgreen-200/60 text-pastelgreen-800 font-semibold text-sm">
                            <th class="p-4 w-16 text-center">ID</th>
                            <th class="p-4">Nama Lengkap</th>
                            <th class="p-4">No. Member</th>
                            <th class="p-4">Alamat</th>
                            <th class="p-4">Tanggal Daftar</th>
                            <th class="p-4">Terakhir Bayar</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        <?php if (empty($members)): ?>
                        <tr>
                            <td colspan="7" class="p-12 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <span class="text-3xl">📭</span>
                                    <span>Belum ada data member. Silakan tambah data terlebih dahulu.</span>
                                </div>
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($members as $m): ?>
                        <tr class="hover:bg-pastelgreen-50/40 transition-colors">
                            <td class="p-4 text-center font-mono text-gray-400"><?= htmlspecialchars($m['id_member']) ?></td>
                            <td class="p-4 font-semibold text-gray-900"><?= htmlspecialchars($m['nama_member']) ?></td>
                            <td class="p-4 font-mono text-gray-650 font-medium"><?= htmlspecialchars($m['nomor_member']) ?></td>
                            <td class="p-4 text-gray-600 max-w-xs truncate" title="<?= htmlspecialchars($m['alamat']) ?>"><?= htmlspecialchars($m['alamat']) ?></td>
                            <td class="p-4 text-gray-550"><?= date('d M Y H:i', strtotime($m['tgl_mendaftar'])) ?></td>
                            <td class="p-4 text-gray-550"><?= date('d M Y', strtotime($m['tgl_terakhir_bayar'])) ?></td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="FormMember.php?id=<?= $m['id_member'] ?>" class="text-pastelgreen-600 hover:text-pastelgreen-800 font-medium transition-colors">Edit</a>
                                    <span class="text-gray-200">|</span>
                                    <a href="Member.php?id_member=<?= $m['id_member'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data member ini?')" class="text-red-500 hover:text-red-700 font-medium transition-colors">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
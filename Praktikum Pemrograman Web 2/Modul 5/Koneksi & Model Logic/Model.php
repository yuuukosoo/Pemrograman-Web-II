<?php
date_default_timezone_set('Asia/Makassar');

require_once 'Koneksi.php';


function get_all_member() {
    $conn = koneksi();
    $sql = "SELECT * FROM member";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function get_member_by_id($id) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM member WHERE id_member = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insert_member($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $conn = koneksi();
    $nama = mysqli_real_escape_string($conn, $nama);
    $nomor = mysqli_real_escape_string($conn, $nomor);
    $alamat = mysqli_real_escape_string($conn, $alamat);
    $tgl_mendaftar = mysqli_real_escape_string($conn, $tgl_mendaftar);
    $tgl_terakhir_bayar = mysqli_real_escape_string($conn, $tgl_terakhir_bayar);
    
    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) 
            VALUES ('$nama', '$nomor', '$alamat', '$tgl_mendaftar', '$tgl_terakhir_bayar')";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}

function update_member($id, $nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $nama = mysqli_real_escape_string($conn, $nama);
    $nomor = mysqli_real_escape_string($conn, $nomor);
    $alamat = mysqli_real_escape_string($conn, $alamat);
    $tgl_mendaftar = mysqli_real_escape_string($conn, $tgl_mendaftar);
    $tgl_terakhir_bayar = mysqli_real_escape_string($conn, $tgl_terakhir_bayar);
    
    $sql = "UPDATE member SET 
            nama_member = '$nama', 
            nomor_member = '$nomor', 
            alamat = '$alamat', 
            tgl_mendaftar = '$tgl_mendaftar', 
            tgl_terakhir_bayar = '$tgl_terakhir_bayar' 
            WHERE id_member = '$id'";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}

function delete_member($id) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM member WHERE id_member = '$id'";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}





function get_all_buku() {
    $conn = koneksi();
    $sql = "SELECT * FROM buku";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function get_buku_by_id($id) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM buku WHERE id_buku = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insert_buku($judul, $penulis, $penerbit, $tahun) {
    $conn = koneksi();
    $judul = mysqli_real_escape_string($conn, $judul);
    $penulis = mysqli_real_escape_string($conn, $penulis);
    $penerbit = mysqli_real_escape_string($conn, $penerbit);
    $tahun = mysqli_real_escape_string($conn, $tahun);
    
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) 
            VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}

function update_buku($id, $judul, $penulis, $penerbit, $tahun) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $judul = mysqli_real_escape_string($conn, $judul);
    $penulis = mysqli_real_escape_string($conn, $penulis);
    $penerbit = mysqli_real_escape_string($conn, $penerbit);
    $tahun = mysqli_real_escape_string($conn, $tahun);
    
    $sql = "UPDATE buku SET 
            judul_buku = '$judul', 
            penulis = '$penulis', 
            penerbit = '$penerbit', 
            tahun_terbit = '$tahun' 
            WHERE id_buku = '$id'";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}

function delete_buku($id) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM buku WHERE id_buku = '$id'";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}






function get_all_peminjaman() {
    $conn = koneksi();
    $sql = "SELECT p.*, m.nama_member, b.judul_buku 
            FROM peminjaman p
            LEFT JOIN member m ON p.id_member = m.id_member
            LEFT JOIN buku b ON p.id_buku = b.id_buku";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function get_peminjaman_by_id($id) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insert_peminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksi();
    $id_member = mysqli_real_escape_string($conn, $id_member);
    $id_buku = mysqli_real_escape_string($conn, $id_buku);
    $tgl_pinjam = mysqli_real_escape_string($conn, $tgl_pinjam);
    $tgl_kembali = mysqli_real_escape_string($conn, $tgl_kembali);
    
    $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) 
            VALUES ('$id_member', '$id_buku', '$tgl_pinjam', '$tgl_kembali')";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}

function update_peminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $id_member = mysqli_real_escape_string($conn, $id_member);
    $id_buku = mysqli_real_escape_string($conn, $id_buku);
    $tgl_pinjam = mysqli_real_escape_string($conn, $tgl_pinjam);
    $tgl_kembali = mysqli_real_escape_string($conn, $tgl_kembali);
    
    $sql = "UPDATE peminjaman SET 
            id_member = '$id_member', 
            id_buku = '$id_buku', 
            tgl_pinjam = '$tgl_pinjam', 
            tgl_kembali = '$tgl_kembali' 
            WHERE id_peminjaman = '$id'";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}

function delete_peminjaman($id) {
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM peminjaman WHERE id_peminjaman = '$id'";
    $exec = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $exec;
}
?>
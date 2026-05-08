<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Soal 4</title>
</head>
<body>

<?php

$url_gambar = "https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png";

$jumlah_bintang = penentuJumlahBintang();

if ($jumlah_bintang === NULL) {
    tampilFormAwal();
} else {
    tampilBintang($jumlah_bintang, $url_gambar);
}


function penentuJumlahBintang() {

    if (isset($_POST['submit_awal'])) {
        return $_POST['input_jumlah'];

    } elseif (isset($_POST['tambah'])) {
        return $_POST['jumlah_sekarang'] + 1;

    } elseif (isset($_POST['kurang'])) {
        $jumlah = $_POST['jumlah_sekarang'] - 1;
        return ($jumlah < 0) ? 0 : $jumlah; 

    }
    return NULL;
}


function tampilFormAwal() {
    echo '
    <form action="" method="POST">
        Jumlah bintang <input type="number" name="input_jumlah" min="0" required><br>
        <button type="submit" name="submit_awal">Submit</button>
    </form>
    ';
}

function tampilBintang($jumlah, $url_gambar) {
    echo "Jumlah bintang $jumlah <br><br>";
    
    for ($i = 0; $i < $jumlah; $i++) {
        echo "<img src='$url_gambar' width='50' height='50' alt='bintang'> ";
    }
    
    echo '
    <br>
    <form action="" method="POST" style="margin-top: 10px;">
        <input type="hidden" name="jumlah_sekarang" value="' . $jumlah . '">
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
    </form>
    ';
}

?>

</body>
</html>
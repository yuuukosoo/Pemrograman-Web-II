<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

        <title>Soal 3</title>

    <style>
        img {
            width: 20px; 
        }
    </style>

</head>

<body>
    
<form method="post">

    Batas Bawah : <input type="number" name="batas_bawah" value="<?= isset($_POST['batas_bawah']) ? $_POST['batas_bawah'] : '' ?>" required> <br>

    Batas Atas : <input type="number" name="batas_atas" value="<?= isset($_POST['batas_atas']) ? $_POST['batas_atas'] : '' ?>" required> <br>

    <button type="submit" name="cetak">Cetak</button>

</form>

<br>

<?php
if (isset($_POST['cetak'])) {
    $batas_bawah = $_POST['batas_bawah'];
    $batas_atas = $_POST['batas_atas'];

    $i = $batas_bawah;
    $url_bintang = "https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png";

    if($batas_bawah <= $batas_atas) {
        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src='$url_bintang' alt='star'> ";
            } else {
                echo $i . " ";
            }
            $i++;
        } while ($i <= $batas_atas);
    } else {
        echo "Batas bawah harus lebih kecil atau sama dengan batas atas.";
    }

}
?>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>PRAK 401</title>
    <style>
        table, td 
        { 
            border: 1px solid black; 
            border-collapse: collapse; 
            padding: 5px; 
        }

    </style>
</head>
<body>

<form method="post">
    Panjang : <input type="text" name="panjang"><br>
    Lebar : <input type="text" name="lebar"><br>
    Nilai : <input type="text" name="nilai"><br>
    <button type="submit" name="cetak">Cetak</button>
</form>

<?php
if (isset($_POST['cetak'])) {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $input_nilai = $_POST['nilai'];


    $array_nilai = explode(" ", $input_nilai);
    

    if (count($array_nilai) != ($panjang * $lebar)) {
        echo "<br>Panjang nilai tidak sesuai dengan ukuran matriks";
    } else {
        echo "<br><table>";
        $index = 0;
        for ($i = 0; $i < $panjang; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $lebar; $j++) {
                echo "<td>" . $array_nilai[$index] . "</td>";
                $index++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

</body>
</html>
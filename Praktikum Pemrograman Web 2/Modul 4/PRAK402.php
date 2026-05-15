<?php

$data = [
    ["Nama" => "Andi",
     "NIM" => 2101001,
     "Nilai_UTS" => 87,
     "Nilai_UAS" => 65
    ],

    ["Nama" => "Budi",
     "NIM" => 2101002,
     "Nilai_UTS" => 76,
     "Nilai_UAS" => 79
    ],

    ["Nama" => "Tono",
     "NIM" => 2101003,
     "Nilai_UTS" => 50,
     "Nilai_UAS" => 41
    ],

    ["Nama" => "Jessica",
     "NIM" => 2101004,
     "Nilai_UTS" => 60,
     "Nilai_UAS" => 75
    ],
];

foreach ($data as &$mhs) {
    $mhs["Nilai_Akhir"] = ($mhs["Nilai_UTS"] * 0.4) + ($mhs["Nilai_UAS"] * 0.6);
    
    $nilai_akhir = $mhs["Nilai_Akhir"];

    if($nilai_akhir >= 80){
        $mhs["huruf"] = "A";
    }

    elseif($nilai_akhir >= 70){
        $mhs["huruf"] = "B";
    }

    elseif($nilai_akhir >= 60){
        $mhs["huruf"] = "C";
    }

    elseif($nilai_akhir >= 50){
        $mhs["huruf"] = "D";
    }

    else{
        $mhs["huruf"] = "E";
    }

}
unset($mhs);
?>


<!DOCTYPE html>
<html>
<head>
    <title>PRAK 402</title>
    <style>
      table {
        border-collapse: collapse; 
        margin: 20px 0; 
    }

    th, td {
        border: 1px solid black;
      
        padding: 5px 10px; 
        text-align: left; 
    }

    th {
        background-color: #d3d3d3; 
    }
    </style>
</head>

<body>

<table>
    <tr>
        <th>Nama</th>
        <th>NIM</th>        
        <th>Nilai_UTS</th>
        <th>Nilai_UAS</th>
        <th>Nilai_Akhir</th>
        <th>Huruf</th>
    </tr>

<?php foreach ($data as $mhs): ?>
    <tr>
        <td><?php echo $mhs["Nama"]; ?></td>
        <td><?php echo $mhs["NIM"]; ?></td>
        <td><?php echo $mhs["Nilai_UTS"]; ?></td>
        <td><?php echo $mhs["Nilai_UAS"]; ?></td>
        <td><?php echo $mhs["Nilai_Akhir"]; ?></td>
        <td><?php echo $mhs["huruf"]; ?></td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>

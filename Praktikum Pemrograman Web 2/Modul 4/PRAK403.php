<?php

$data = [
[
    "No" => 1,
    "Nama" => "Ridho",
    "Matkul" => 
    [
        [
            "nama" => "Pemrograman I",
            "sks" => 2
        ],

        [
             "nama" => "Praktikum Pemrograman I",
            "sks" => 1
        ],

        [
             "nama" => "Pengantar Lingkungan Lahan Basah",
            "sks" => 2
        ],

        [
             "nama" => "Arsitektur Komputer",
            "sks" => 3
            ]
    ]
],

[
    "No" => 2,
    "Nama" => "Ratna",
    "Matkul" => 
    [
        [
            "nama" => "Basis Data I",
            "sks" => 2
        ],

        [
             "nama" => "Praktikum Basis Data I",
            "sks" => 1
        ],

        [
             "nama" => "Kalkulus",
            "sks" => 3
        ]

    ]
],

[
    "No" => 3,
    "Nama" => "Tono",
    "Matkul" => 
    [
        [
            "nama" => "Rekayasa Perangkat Lunak",
            "sks" => 3
        ],

        [
             "nama" => "Analisis dan Perancangan Sistem",
            "sks" => 3
        ],

        [
             "nama" => "Komputasi Awan",
            "sks" => 3
        ],

        [
             "nama" => "Kecerdasan Bisnis",
            "sks" => 3
        ]



    ]
],

];


foreach ($data as &$mhs) {
    $total_sks = 0;
    foreach ($mhs["Matkul"] as $matkul) {
        $total_sks += $matkul["sks"];
    }

    $mhs["Total_SKS"] = $total_sks;
    $mhs["Keterangan"] = ($total_sks < 7) ? "Revisi KRS" : "Tidak Revisi";
}

unset($mhs);
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>PRAK 403</title>
        <style>
             table 
        { 
            border-collapse: collapse; 
        }

             th, td 
        { 
            border: 1px solid black; 
            padding: 8px; 
            text-align: left; 
            vertical-align: top; 
        }

            th{
                background-color: #d3d3d3;
            }

            .revisi {
                background-color: #ff4d4d;
            }

            .aman {
                background-color: #2ecc71;
            }
        </style>

    </head>

<body>

 <table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>




    <?php foreach ($data as $mhs): ?>
        <?php 
            $keterangan_class = ($mhs["Total_SKS"] < 7) ? "revisi" : "aman";
        ?>
        
        <?php foreach ($mhs["Matkul"] as $index => $matkul): ?>
            <tr>
             
                <td><?= ($index == 0) ? $mhs["No"] : "" ?></td>
                <td><?= ($index == 0) ? $mhs["Nama"] : "" ?></td>
                
                <td><?= $matkul["nama"] ?></td>
                <td><?= $matkul["sks"] ?></td>
                
                <td><?= ($index == 0) ? $mhs["Total_SKS"] : "" ?></td>
                <td class="<?= ($index == 0) ? $keterangan_class : "" ?>">
                    <?= ($index == 0) ? $mhs["Keterangan"] : "" ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>



        </table>
    </body>

</html>
 

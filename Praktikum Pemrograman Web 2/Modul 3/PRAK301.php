<html>

<head>
    <style>
    .ganjil{
        color: red;
        font-weight: bold;
    }

    .genap{
        color: green;
        font-weight: bold;
    }
    </style>
    <title>Praktikum 3</title>
    
</head>

    <body>
        
        <form method="post">
        Jumlah Peserta <input type="text" name="jumlah"><br> 
        <button type="submit" name="submit">Cetak</button>   
        </form>

    <?php
    if (isset($_POST['submit'])) {
        $jumlah = $_POST['jumlah'];
        for ($i = 1; $i <= $jumlah; $i++) {
            if ($i % 2 == 0) { ?>

                <span class="genap">
                    Peserta ke-<?= $i ?> <br> 
                </span> <br>

            <?php }

            else { ?>

                <span class="ganjil">
                    Peserta ke-<?= $i ?> <br> 
                </span><br>

            <?php } 
        }
    }
    ?>

    </body>
</html>
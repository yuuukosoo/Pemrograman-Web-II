<html>
    <body>
        <form method="post">
            Nilai : <input type="text" name="nilai"> <br>
            <input type="submit" name="submit" value="Konversi">
        </form>

        <?php
        function ejaanBilangan($nilai){
            
            if(!is_numeric($nilai)){
                return "Inputan harus berupa angka";
            }

            $a = (int)$nilai;

            if ($a == 0){
                return "Nol";
            }

            elseif ($a > 0 && $a < 10){
                return "Satuan";
            }

            elseif($a >10 && $a < 20){
                return "Belasan";
            }

            elseif ($a == 10 || ($a >= 20 && $a < 100)){
                return "Puluhan";
            }

            elseif($a >= 100 && $a < 1000){
                return "Ratusan";
            }

            else {
                return "Anda Menginput Melebihi Limit Bilangan";
            }
    
        }

        if (isset($_POST['submit'])){
            $hasil = ejaanBilangan($_POST['nilai']);
            echo "<h1>Hasil : $hasil</h1>";
        }
        
        ?>

    </body>
</html>
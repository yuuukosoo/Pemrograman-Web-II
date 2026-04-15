<html>
    <body>
        <form method="post">

        Nama: 1 <input type="text" name="nama1"><br>
        Nama: 2 <input type="text" name="nama2"><br>
        Nama: 3 <input type="text" name="nama3"><br>
        <button type="submit" name="submit"> Urutkan </button>

        </form>

    <?php
    if (isset($_POST['submit'])) {
        $a = $_POST['nama1'];
        $b = $_POST['nama2'];
        $c = $_POST['nama3'];

        if ($a <= $b && $a <= $c){
            if ($b <= $c){
                $nama1 = $a;
                $nama2 = $b;
                $nama3 = $c;
            }

            else{
                $nama1 = $a;
                $nama2 = $c;
                $nama3 = $b;
            }
        }

        else if ($b <= $a && $b <= $c){
            if ($a <= $c){
                $nama1 = $b;
                $nama2 = $a;
                $nama3 = $c;
            }

            else{
                $nama1 = $b;
                $nama2 = $c;
                $nama3 = $a;
            }
        }

        else {
            if ($a <= $b){
                $nama1 = $c;
                $nama2 = $a;
                $nama3 = $b;
            }

            else{
                $nama1 = $c;
                $nama2 = $b;
                $nama3 = $a;
            }
        }
    }

    ?>

    <?php if (isset($_POST['submit'])){

        echo $nama1 . "<br>";
                    echo $nama2 . "<br>";
                    echo $nama3 . "<br>";
    }

    ?>

    </body>
</html>


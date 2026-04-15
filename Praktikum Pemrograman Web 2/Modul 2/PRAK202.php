        <?php

        $errorName = $errorNim = $errorGender = "";
        $nama = $nim = $gender= "";

        if(isset($_POST['submit'])){

            if(empty($_POST['nama'])){
                $errorName = "Nama tidak boleh kosong";
            }

            else {
                $nama = $_POST['nama'];
            }

            if(empty($_POST['nim'])){
                $errorNim = "Nim tidak boleh kosong";
            }

            else{
                $nim = $_POST['nim'];
            }

            if (empty($_POST['gender'])) {
                 $errorGender = "Jenis kelamin tidak boleh kosong";

             } else {
                $gender = $_POST['gender'];
            }
        }
        ?>

<html>
    <body>

    <form method="post">



    Nama : <input type="text" name="nama"> 
    <span style="color: red;">* <?php echo $errorName; ?> </span>
    <br>



    Nim : <input type="text" name="nim">
    <span style="color: red;">* <?php echo $errorNim; ?></span>
    <br>


    Jenis Kelamin : 
    <span style="color: red;">* <?php echo $errorGender; ?></span><br>
    <input type="radio" name="gender" value="Laki-Laki" <?php if($gender=="Laki-Laki") echo "checked";?>> Laki-Laki <br>
    <input type="radio" name="gender" value="Perempuan" <?php if($gender=="Perempuan") echo "checked";?>> Perempuan <br>

    <button type="submit" name="submit"> Submit </button>

    </form>

    <?php
    
    if(!empty($nama) && !empty($nim) && !empty($gender)){
        echo "<h2>Output:</h2>";
        echo $nama . "<br>";
        echo $nim . "<br>";
        echo $gender . "<br>";
    }

    ?>

    </body>
</html>
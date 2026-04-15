<html>
    <body>
        <form method="post">
            Nilai: <input type="text" name="nilai"> <br>
            Dari : <br>
            <input type="radio" name="dari" value="celcius"> Celcius <br>
            <input type="radio" name="dari" value="fahrenheit"> Fahrenheit <br>
            <input type="radio" name="dari" value="rheamur"> Rheamur <br>
            <input type="radio" name="dari" value="kelvin"> Kelvin <br>

            Ke : <br>
            <input type="radio" name="ke" value="celcius"> Celcius <br>
            <input type="radio" name="ke" value="fahrenheit"> Fahrenheit <br>
            <input type="radio" name="ke" value="rheamur"> Rheamur <br>
            <input type="radio" name="ke" value="kelvin"> Kelvin <br>

            <input type="submit" name="submit" value="Konversi">

        </form>
            <?php

function konversiSuhu($nilai, $dari, $ke){
$tempSuhu = 0;

    if($dari == "celcius"){
        $tempSuhu = $nilai;
    } 
    
    elseif($dari == "fahrenheit"){
        $tempSuhu = ($nilai - 32) * 5/9;
    } 
    
    elseif($dari == "rheamur"){
        $tempSuhu = $nilai * 5/4;
    } 
    
    elseif($dari == "kelvin"){
        $tempSuhu = $nilai - 273.15;
    }

    if($ke == "celcius"){
        return [$tempSuhu, "°C"];
    }
    elseif($ke == "fahrenheit"){
        return [($tempSuhu * 9/5) + 32, "°F"];
    }
    elseif($ke == "rheamur"){
        return [$tempSuhu * 4/5, "°R"];
    }
    elseif($ke == "kelvin"){
        return [$tempSuhu + 273.15, "K"];
    }

}

if(isset($_POST['submit'])){
    
if (isset($_POST['dari']) && isset($_POST['ke']) && $_POST['nilai'] !== ""){
    
    $hasil = konversiSuhu($_POST['nilai'], $_POST['dari'], $_POST['ke']);

    $nilai = $hasil[0];
    $satuan = $hasil[1];

    echo "<h1> Hasil Konversi: " . number_format($nilai, 1) . " " . $satuan . "</h1>";
    }

else{
    echo "<h1> Hasil Konversi: - </h1>";
    }

}
            ?>

    </body>
</html>
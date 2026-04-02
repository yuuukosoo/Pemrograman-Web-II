<?php
$celcius = 37.841 ;
$fahrenheit = number_format(($celcius * 9/5) + 32, 4);
$reamur = number_format($celcius * 4/5, 4);
$kelvin = number_format($celcius + 273.15, 3);

echo "Fahrenheit (F) = $fahrenheit" . "<br>"; 
echo "Reamur (R) = $reamur" . "<br>";
echo "Kelvin (K) = $kelvin" . "<br>";
?>

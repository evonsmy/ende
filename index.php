<?php

require "lib.class/class.ende.php";

$ende = new ENDE();
$hecho = $ende->encode("It's Encode by team evonsmy");
echo "<b>Encode ---- : </b>" . $hecho . "<br>";
echo "<b>Text -------- : </b>" . $ende->decode($hecho) . "<br>";
?>
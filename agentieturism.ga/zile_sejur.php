
<?php
session_start();
if(isset($_POST["adulti"]) && isset($_POST["de_la"]) && isset($_POST["pana_la"])){
    $adulti = $_POST["adulti"];
    $de_la = $_POST["de_la"];
    $pana_la = $_POST["pana_la"];
    $suma='';
    
    $de_la = date_create($de_la);
    $pana_la = date_create($pana_la);
    $interval = date_diff($pana_la,$de_la);
    
   
    echo "Sejur de ". $interval->format("%d") ." nopti";
    $_SESSION["interval"] = $interval->format("%d");
    
}
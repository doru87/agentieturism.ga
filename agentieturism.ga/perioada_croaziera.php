<?php
session_start();
if(isset($_POST["de_la"]) && isset($_POST["pana_la"])){
    $de_la = $_POST["de_la"];
    $pana_la = $_POST["pana_la"];
    
    $_SESSION["de_la"]=$de_la;
    $_SESSION["pana_la"]=$pana_la;
}
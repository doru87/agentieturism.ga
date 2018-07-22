<?php
    if(isset($_POST["nr_camere"]) && isset($_POST["pret_perioada"])){
    $nr_camere = $_POST["nr_camere"];
    $pret_perioada = $_POST["pret_perioada"];

    $pret_total = $nr_camere * $pret_perioada;
    echo $pret_total. " lei";
}


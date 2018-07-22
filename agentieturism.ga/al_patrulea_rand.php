<?php
include("db.php");
if(isset($_POST["adulti"]) && isset($_POST["de_la"]) && isset($_POST["pana_la"]) && isset($_POST["id_articol"])){
    
    global $conexiune;
    $id_articol = $_POST["id_articol"];
    $interogare = "SELECT * FROM destinatie_vacanta WHERE id_articol=$id_articol";
    $rezultat = mysqli_query($conexiune, $interogare);
    
    while($row = mysqli_fetch_array($rezultat)) {
        
        $pret_cazare4 = $row["pret_cazare4"];
    }  
    $adulti = $_POST["adulti"];
    $de_la = $_POST["de_la"];
    $pana_la = $_POST["pana_la"];
    $suma='';
    $date1 = new DateTime($de_la);
    $date2 = new DateTime($pana_la);
    $interval = $date1->diff($date2);
    
    $de_la = date_create($de_la);
    $pana_la = date_create($pana_la);
    $interval = date_diff($pana_la,$de_la);
    
    
    for ($i=1; $i<30; $i++){
        if ($adulti == "1" && $interval->format("%d") == $i){
            $suma = $interval->format("%d") * $pret_cazare4 ." lei";
        }
    }
    echo $suma;
    
}

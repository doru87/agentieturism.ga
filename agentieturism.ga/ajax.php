<?php
include ("db.php");


if(isset($_POST['continent'])){
$continent = $_POST['continent'];
    
    $query = "select * from destinatii_tari where continent='$continent'";
    $ruleaza= mysqli_query($conexiune,$query);
    
    while($lista_tari=mysqli_fetch_array($ruleaza)){
            $id = $lista_tari["id"];
            $lista = $lista_tari["tara"];
            echo '<option>'.$lista.'</option>';
 
        }
}

if(isset($_POST['tara'])){
    $tara = $_POST['tara'];
    
    $query = "select * from destinatii_orase where tara='$tara'";
    $ruleaza= mysqli_query($conexiune,$query);
    
    while($lista_orase=mysqli_fetch_array($ruleaza)){
        $id = $lista_orase["id"];
        $lista = $lista_orase["oras"];
        echo '<option>'.$lista.'</option>';
        
    }
}
?>
<?php
include 'db.php';

$output = '';
if(isset($_POST["query"]))
{
    $cautare = mysqli_real_escape_string($conexiune, $_POST["query"]);
    $interogare = "SELECT * FROM destinatie_croaziera WHERE titlu LIKE '%".$cautare."%'";
}
else
{
    $interogare = "SELECT * FROM destinatie_croaziera ORDER BY data_publicarii";
}

    $rezultat = mysqli_query($conexiune, $interogare);
    
    while($row = mysqli_fetch_array($rezultat)) {
        
        $id = $row["id_articol"];
        $titlu = $row["titlu"];
        $continent = $row["continent"];
        $tara = $row["tara"];
        $continut = $row["continut"];
        $data = array("poza" => $row["poza"]);
        
        $poza = array_values($data);
        
        $image = implode(" ",$poza);
        
        $imagine = explode(",",$image);
        
        
        $output .= '<div id="box">
                      <figure>
                              <img src="/croaziere'.'/'.$tara.'/'.$imagine[1].'">
                             <div class="continent"><span>'.$continent.'</span></div>
                        <figcaption>
                            <h4>'.$titlu.'</h4>
                            <p>'.$continut.'</p>
                            <a href="afisare_croaziera.php?id_articol='.$id.'">View more ...</a>
                        </figcaption>
                      </figure>
                           
                    </div>';
    }
    echo $output;


?>
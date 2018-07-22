<?php
include 'db.php';

$output = '';
if(isset($_POST["query"]))
{
    $cautare = mysqli_real_escape_string($conexiune, $_POST["query"]);
    $interogare = "SELECT * FROM destinatie_vacanta WHERE hotel LIKE '%".$cautare."%'";
}
else
{
    $interogare = "SELECT * FROM destinatie_vacanta ORDER BY data_publicarii";
}

$rezultat = mysqli_query($conexiune, $interogare);

while($row = mysqli_fetch_array($rezultat))
{
    $id = $row["id_articol"];
    $hotel = $row["hotel"];
    $tara = $row["tara"];
 
     $data = array("poza" => $row["poza"]);
      //print_r($data);//Array ( [poza] => 1.jpg,2.jpg,3.jpg,4.jpg,5.jpg )
      $poza = array_values($data);
      //print_r($poza);
      $poza = implode(" ", $data);
       //print_r($poza);//1.jpg,2.jpg,3.jpg,4.jpg,5.jpg - returns a string from the elements of an array.
            
       $imagine = explode(",",$poza);
    
    
    $output .= '<figure class="snip1082 blue hover">
                      <a href="afisare_vacanta.php?id_articol='.$id.'&hotel='.$hotel.'">
                        <img src="vacante'.'/'.$tara.'/'.$hotel.'/'.$imagine[1].'">
                            
                        <h3>'.$hotel.'</h3>
                        <div></div>
                       </a>
                    </figure>';
}
echo $output;

?>
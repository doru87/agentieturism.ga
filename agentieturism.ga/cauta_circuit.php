<?php
include 'db.php';

$output = '';
if(isset($_POST["query"]))
{
    $cautare = mysqli_real_escape_string($conexiune, $_POST["query"]);
    $interogare = "SELECT * FROM destinatie_circuit WHERE titlu LIKE '%".$cautare."%'";
}
else
{
    $interogare = "SELECT * FROM destinatie_circuit ORDER BY data_publicarii";
}

$rezultat = mysqli_query($conexiune, $interogare);

    while($row = mysqli_fetch_array($rezultat)) {
        $titlu = $row["titlu"];
        
        $id_articol = $row["id_articol"];
        $continut = $row["continut"];
        $data_publicarii = $row["data_publicarii"];
        $tara= $row["tara"];
        
        $perioada = $row["perioada"];
        
        //var_dump($perioada);
        $data = json_encode($perioada);
        //var_dump($data);
        $tablou = array();
        $substr = substr($data, 1, 10);
        $array_perioada = explode(" ",$substr);
      
        //var_dump($array_perioada);
        
        $data = array("poza" => $row["poza"]);
        //print_r($data);//Array ( [poza] => 1.jpg,2.jpg,3.jpg,4.jpg,5.jpg )
        $poza = array_values($data);
        //print_r($poza);
        $poza = implode(" ", $data);
        //print_r($poza);//1.jpg,2.jpg,3.jpg,4.jpg,5.jpg - returns a string from the elements of an array.
        
        $imagine = explode(",",$poza);
        //print_r($imagine);//Array ( [0] => 1.jpg [1] => 2.jpg [2] => 3.jpg [3] => 4.jpg [4] => 5.jpg ) - breaks a string into an array
        $output .= '<div class="post-module">
                        <div class="thumbnail">
                           <a href="#modal'.$id_articol.'"><img src="/circuite'.'/'.$tara.'/'.$imagine[2].'"></a>             
                        </div>
                               
                            <div id="modal'.$id_articol.'">
                                <div class="modal">
                                    <img src="/circuite'.'/'.$tara.'/'.$imagine[2].'">
                                    <a class="closes" href="">X</a>
                                </div>
                            </div>
                                        
                     <div class="post-content">
                          <div class="category">Photos</div>
                        <a href="afisare_circuit.php?id_articol='.$id_articol.'">
                            <h1 class="title">'.$titlu.'</h1>
                            <div class="description">'.$continut.'</div>
                            </a>
                            <div class="timestamp"><i class="fa fa-clock-o"></i>'.$data_publicarii.'</div>
                            <div class="sortare_data">'.$substr.'</div> 
                          </div>
                                
                    </div>';
    }
    
    echo $output;


?>
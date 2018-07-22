<?php
include 'db.php';
session_start(); 

//setcookie("PHPSESSID","",time()-3600,"/"); // delete session cookie


function obtine_circuit(){
    
    $output='';
    global $conexiune;
    
    if (isset($_GET['continent'])){
        $interogare = "SELECT * FROM destinatie_circuit WHERE continent='".$_GET['continent']."'";

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
    }else if (isset($_POST['submit_range'])){
        $interogare = "SELECT * FROM destinatie_circuit WHERE pret BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."'";
        
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
   }else if (isset($_GET['continent'],$_POST['minimum_range'],$_POST['maximum_range'])){
        $continent = $_GET['continent'];
        $min = $_POST['minimum_range'];
        $max = $_POST['maximum_range'];
        $interogare = "SELECT * FROM destinatie_circuit WHERE pret BETWEEN $min AND $max";
         
        $rezultat = mysqli_query($conexiune, $interogare);
        print_r($rezultat);
        if (!mysqli_query($conexiune, $interogare))
        {
            print_r ("Error description: " . mysqli_error($conexiune));
        }
        

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
    }else {
    $interogare = "SELECT * FROM destinatie_circuit";
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
}
}

function afiseaza_circuit(){
    
    $output='';
    global $conexiune;
    
    if (isset($_GET['id_articol'])){
        $id = $_GET['id_articol'];
        
        $interogare = "SELECT * FROM destinatie_circuit where id_articol=$id";
        $rezultat = mysqli_query($conexiune, $interogare);
        $myArray = array();
        while($row = mysqli_fetch_array($rezultat)) {
            $titlu = $row["titlu"];
            $poza = $row["poza"];
            $id_articol = $row["id_articol"];
            $continut = $row["continut"];
         
            $perioada = $row["perioada"];
            
            //var_dump($perioada);
            $data = json_encode($perioada);
            //var_dump($data);
            $tablou = array();
            $substr = substr($data, 1, 10);
            $array_perioada = explode(" ",$substr);
            
            
            $itinerar = $row["itinerar"];
            $tarife_cazare = $row["tarife_cazare"];
            $servicii_incluse = $row["servicii_incluse"];
            $atractii_turistice = $row["atractii_turistice"];
            $data_publicarii = $row["data_publicarii"];
            
            $output.='  <div class = "tabs">
                        <input type="radio" name="nav" id="one" checked="checked"/>
                        <label for="one">Itinerar</label>

                        <input type="radio" name="nav" id="two"/>
                        <label for="two">Tarife cazare</label>

                        <input type="radio" name="nav" id="three"/>
                        <label for="three">Servicii incluse</label>

                        <input type="radio" name="nav" id="four"/>
                        <label for="four">Atractii turistice</label>

                        <article class="content one">
                        '.$itinerar.'
                        </article>

                        <article class="content two">
                        '.$tarife_cazare.'
                        </article>

                        <article class="content three">
                        '.$servicii_incluse.'
                        </article>

                        <article class="content four">
                        '.$atractii_turistice.'
                        </article>
                        </div>';
            
        }
        echo $output;
    }
}

function obtine_vacanta(){
    $output='';
    global $conexiune;
    
    $interogare = "SELECT * FROM destinatie_vacanta";
    $rezultat = mysqli_query($conexiune, $interogare);
    
    while($row = mysqli_fetch_array($rezultat)) {
        
        $id = $row["id_articol"];
        $hotel = $row["hotel"];
        $tara = $row["tara"];
      
    $data = array("poza" => $row["poza"]);
       //print_r($data);//Array ( [poza] => 6.jpg,7.jpg,8.jpg,9.jpg,10.jpg ) 
   
       $poza = implode(" ", $data);
       //print_r($poza);//6.jpg,7.jpg,8.jpg,9.jpg,10.jpg - returns a string from the elements of an array.
            
       $imagine = explode(",",$poza);
       //print_r($imagine);//Array ( [0] => 6.jpg [1] => 7.jpg [2] => 8.jpg [3] => 9.jpg [4] => 10.jpg ) - breaks a string into an array
        
        
        $output .= '<figure class="snip1082 blue hover">

                     
                        <i class="fa fa-heart fa-2x"></i>
                        <img src="vacante'.'/'.$tara.'/'.$hotel.'/'.$imagine[1].'">
                       <a href="afisare_vacanta.php?id_articol='.$id.'&hotel='.$hotel.'">
                        <h3>'.$hotel.'</h3>
                         </a>
                      
                    </figure>';
    }
    echo $output;
}

function afiseaza_vacanta() {
    $output='';
    global $conexiune;
    
    if (isset($_GET['id_articol'])){
        $id = $_GET['id_articol'];
    
    $interogare = "SELECT * FROM destinatie_vacanta where id_articol='".$_GET['id_articol']."'";
    $rezultat = mysqli_query($conexiune, $interogare);
    
    while($row = mysqli_fetch_array($rezultat)) {

        $hotel = $row["hotel"];
        $oferta =  $row["oferta"];
        $descriere_hotel =  $row["descriere_hotel"];
        $servicii =  $row["servicii"];
        $poza =  $row["poza"];
        
$output .= '
 
    <div class="descriere">
    <input type="radio" name="oferta" id="oferta" checked="checked"/> 
    <label for="oferta">Oferta</label>
        <article>'.$oferta.'</article>
    </div>

    <div class="descriere">
    <input type="radio" name="descriere_hotel" id="descriere_hotel" checked="checked"/>     
    <label for="descriere_hotel">Hotel</label>
        <article>'.$descriere_hotel.'</article>    
    </div>

    <div class="descriere">
    <input type="radio" name="servicii" id="servicii" checked="checked"/>     
    <label for="servicii">Servicii</label>
        <article>'.$servicii.'</article>
    </div>
   ';
    }
    echo $output;
    }
}

function afiseaza_slide(){
    global $conexiune;
    if (isset($_GET['id_articol'])){
        $id = $_GET['id_articol'];
        
        $query = "SELECT * FROM destinatie_vacanta where id_articol=$id";
 
  
        $ruleaza = mysqli_query($conexiune, $query);
    while ($row = mysqli_fetch_assoc($ruleaza)){

        $hotel = $row["hotel"];
        $tara = $row["tara"];

       $data = array("poza" => $row["poza"]);
       //print_r($data);//Array ( [poza] => 6.jpg,7.jpg,8.jpg,9.jpg,10.jpg ) 
   
       $poza = implode(" ", $data);
       //print_r($poza);//6.jpg,7.jpg,8.jpg,9.jpg,10.jpg - returns a string from the elements of an array.
            
       $imagine = explode(",",$poza);
       //print_r($imagine);//Array ( [0] => 6.jpg [1] => 7.jpg [2] => 8.jpg [3] => 9.jpg [4] => 10.jpg ) - breaks a string into an array
    }
    echo "     <div class='slide'>
                         <div id='slider'>
                            <div class='box' id='box1'> <img src='vacante/$tara/$hotel/$imagine[0]' class='resize'></div>
                            <div class='box' id='box2'> <img src='vacante/$tara/$hotel/$imagine[1]' class='resize'></div>
                            <div class='box' id='box3'> <img src='vacante/$tara/$hotel/$imagine[2]' class='resize'></div>
                            <div class='box' id='box4'> <img src='vacante/$tara/$hotel/$imagine[3]' class='resize'></div>
                            <div class='box' id='box5'> <img src='vacante/$tara/$hotel/$imagine[4]' class='resize'></div>
                           
                         </div>
                         
                         
                          <nav class='navslider'>
                            <a href='#box1'>1</a>
                            <a href='#box2'>2</a>
                            <a href='#box3'>3</a>
                            <a href='#box4'>4</a>
                            <a href='#box5'>5</a>
                          </nav>
                 </div>
                            ";
    

}
}

function obtine_croaziera(){
    $output='';
    global $conexiune;
    
    $interogare = "SELECT * FROM destinatie_croaziera";
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
}
function afiseaza_croaziera(){
    $output='';
    global $conexiune;
    if (isset($_GET['id_articol'])){
        $id = $_GET['id_articol'];
        
        $interogare = "SELECT * FROM destinatie_croaziera where id_articol=$id";
        
    $rezultat = mysqli_query($conexiune, $interogare);
    
    while($row = mysqli_fetch_array($rezultat)) {
        
        $titlu = $row["titlu"];
        $continent = $row["continent"];
        $tara = $row["tara"];
        $continut =  $row["continut"];
        $itinerar =  $row["itinerar"];
        $tarife_cazare =  $row["tarife_cazare"];
        $servicii_incluse =  $row["servicii_incluse"];
        $atractii_turistice = $row["atractii_turistice"];
        $poza = $row["poza"];
        
        $data = array("poza" => $row["poza"]);
        
        $poza = array_values($data);
        
        $imagine = implode(" ",$poza);
        
        $imagine = explode(",",$imagine);
        
        $output .= '
                       <div id="slide">
                           <img src="/croaziere'.'/'.$tara.'/'.$imagine[0].'">
                           <img src="/croaziere'.'/'.$tara.'/'.$imagine[1].'">
                           <img src="/croaziere'.'/'.$tara.'/'.$imagine[2].'">
                           <img src="/croaziere'.'/'.$tara.'/'.$imagine[3].'">
                           <img src="/croaziere'.'/'.$tara.'/'.$imagine[4].'">
                       </div>
                        
                       <div id="descriere">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1">Itinerar</label>
    
                        <input id="tab2" type="radio" name="tabs">
                        <label for="tab2">Tarife cazare</label>
    
                        <input id="tab3" type="radio" name="tabs">
                        <label for="tab3">Servicii incluse</label>
    
                        <input id="tab4" type="radio" name="tabs">
                        <label for="tab4">Atractii turistice</label>"
                        
                        <section id="itinerar">
                        '.$itinerar.'
                        </section>

                        <section id="tarife_cazare">
                        '.$tarife_cazare.'
                        </section>

                         <section id="servicii_incluse">
                        '.$servicii_incluse.'
                         </section>

                         <section id="atractii_turistice">
                        '.$atractii_turistice.'
                         </section>
                       </div>';
    }
    echo $output;
    }
}

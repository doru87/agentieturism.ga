<?php
include("db.php");

if(isset($_POST["de_la"]) && isset($_POST["pana_la"]) && isset($_POST["id_articol"]) && isset($_POST["hotel"])){
        
    global $conexiune;
    $interogare = "SELECT date.nume_hotel,date.tip_cazare,date.pret_cazare,date.facilitati_cazare,date.capacitate_cazare FROM date_tabel date WHERE date.nume_hotel = '". $_POST["hotel"]."'";
    $rezultat = mysqli_query($conexiune, $interogare);
    echo 
    '<tr>
    <th width="25%">Tipul camerei</th>
    <th width="15%">Capacitate</th>
    <th width="10%">Pretul zilei</th>
    <th width="15%">Pretul perioadei selectate/camera</th>
    <th width="15%">Optiunile dumneavoastra</th>
    <th width="10%">Selectati camere</th>
    </tr>';

    while($row = mysqli_fetch_array($rezultat)) {
        
        $nume_hotel=$row['nume_hotel'];
        $tip_cazare=$row['tip_cazare'];
        $pret_cazare=$row['pret_cazare'];
        $facilitati_cazare=$row['facilitati_cazare'];
        $capacitate_cazare=$row['capacitate_cazare'];
        
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

        $suma = $interval->format("%d") * $pret_cazare;
    
        
        echo '

                <tr class="primul_rand">
  
                	<td>'.$tip_cazare.'<div class="facilitati"></br>'.$facilitati_cazare.'</div></td>
                	<td><i class="material-icons">'.$capacitate_cazare.'</i></td>
                	<td>'.$pret_cazare.'</td>
                    <td>'.$suma.'</td>
                	<td><i class="material-icons">free_breakfast</i>Mic dejun inclus </br><i class="material-icons">payment</i>Plătiți la proprietate - Nu se solicită plata în avans</td>
                    <td>
                    	<select id = "nr_camere">
                            <option value = "'.$tip_cazare.'">1</option>
                    		<option value = "'.$tip_cazare.'">2</option>
                    	
                    	</select>
                    </td>
                   
                </tr>';
    }
    }
  

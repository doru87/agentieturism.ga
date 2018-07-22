<?php
include("db.php");
session_start(); // initialize session
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Inserting Product</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
    <style>
      body {
        font-family: sans-serif;
        background-color: skyblue;
      }
    </style>
  </head>
  <body>

        <form action="adauga_croaziera.php" method="post" enctype="multipart/form-data">
          <table align="center" width="700px" bgcolor="orange" border="2">
              <tr align="center">
                  <td colspan="7"><h2>Adauga un articol nou</h2></td>
              </tr>

              <tr>
                  <td align="right"><b>Titlul articolului:</b></td>
                  <td><input type="text" name="titlu_articol" size="60"/></td>
              </tr>
              <tr>
                  <td align="right"><b>Destinatia croazierei (continent):</b></td>
                  <td>
                      <select name="continent" id="continent">
              
                        <?php
                          $continente = "select * from destinatii_continente";
                          $ruleaza = mysqli_query($conexiune, $continente);
                          while ($lista_continente = mysqli_fetch_array($ruleaza)) {
                              $id = $lista_continente["id"];
                              $lista = $lista_continente["continent"];
                              echo "<option>$lista</option>";
                          }
                        ?>
                      </select>
                  </td>
              </tr>

               <tr>
                  <td align="right"><b>Destinatia croazierei (tara):</b></td>
                  <td>
                      <select name="tara" id="tara">
              
                        <?php
                          $tari= "select * from destinatii_tari";
                          $ruleaza = mysqli_query($conexiune, $tari);
                          while ($lista_tari = mysqli_fetch_array($ruleaza)) {
                              
                              $lista = $lista_tari ["tara"];
                              echo "<option>$lista</option>";
                          }
                        ?>
                      </select>
                  </td>
              </tr>
            
                <tr>
                  <td align="right"><b>Perioada:</b></td>
                  <td>
                     <input type="text" class ="perioada" name="de_la" id ="de_la" size="20"/>
                     <input type="text" class ="perioada" name="pana_la" id ="pana_la"  size="20"/>
                  </td>
              </tr>

              <tr>
                  <td align="right"><b>Poze articol:</b></td>
                  <td><input type="file" name="poza_articol[]" multiple/></td>
              </tr>

              <tr>
                  <td align="right"><b>Continutul articolului:</b></td>
                  <td>
                    <textarea name="continut_articol" rows="10" cols="20"></textarea>
                  </td>
              </tr>
              
              <tr>
                  <td align="right"><b>Itinerar:</b></td>
                  <td>
                    <textarea name="itinerar" rows="10" cols="20"></textarea>
                  </td>
              </tr>
              <tr>
                  <td align="right"><b>Tarife & cazare:</b></td>
                  <td>
                    <textarea name="tarife_cazare" rows="10" cols="20"></textarea>
                  </td>
              </tr>
              <tr>
                  <td align="right"><b>Servicii incluse:</b></td>
                  <td>
                    <textarea name="servicii_incluse" rows="10" cols="20"></textarea>
                  </td>
              </tr>
			  
	      <tr>
                  <td align="right"><b>Atractii turistice:</b></td>
                  <td>
                    <textarea name="atractii_turistice" rows="10" cols="20"></textarea>
                  </td>
              </tr>
               <tr>
                  <td colspan="7"><input type="submit" name="adauga_croaziera" value="Adauga Croaziera" /></td>
               </tr>
               
          </table>
        </form>
  </body>
  <script type="text/javascript">
  $(document).ready(function(){


	   	 $.datepicker.setDefaults({  
	            dateFormat: 'dd-mm-yy'   
	       });  
	       $(function(){  
	            $("#de_la").datepicker();  
	            $("#pana_la").datepicker();  
	       });  
	       $('.perioada').change(function(){  
	            var de_la = $('#de_la').val();  
	            var pana_la = $('#pana_la').val();

	            if(de_la != '' && pana_la != '')  
	            {  
	                 $.ajax({  
	                      url:"perioada_croaziera.php",  
	                      method:"POST",  
	                      data:{de_la:de_la, pana_la:pana_la},  
	                      success:function(data)  
	                      {  
	                   	 
	                   	 
	                      }  
	                 });  
	            }
	   	});

		   	

	});
  

		
  </script>
</html>
<?php


  if(isset($_POST['adauga_croaziera'])) {
      
      if(isset($_SESSION['de_la'])) {
          $de_la = $_SESSION["de_la"];
      }
      if(isset($_SESSION['pana_la'])) {
          $pana_la = $_SESSION["pana_la"];
      }
      $perioada_croaziera = $de_la.'-'.$pana_la;

    $titlu_articol = $_POST['titlu_articol'];
    $continent = $_POST['continent'];
    $tara = $_POST['tara'];
    $continut_articol = $_POST['continut_articol'];
    
    $itinerar = $_POST['itinerar'];
    $tarife_cazare = $_POST['tarife_cazare'];
    $servicii_incluse = $_POST['servicii_incluse'];
    $atractii_turistice = $_POST['atractii_turistice'];
    
    $data_actuala = new DateTime();
    $data_publicarii = $data_actuala->format('Y-m-d H:i:s');

       if (!file_exists($_SERVER["DOCUMENT_ROOT"]."/".croaziere."/".$tara)) {
        mkdir($_SERVER["DOCUMENT_ROOT"]."/".croaziere."/".$tara, 0777, true);
    
}
// 	$folder_poze = "/xampp/htdocs/WebsiteNou/";
// 	$poza_articol = "$oras/".$_FILES['poza_articol']['name'];
//  $poza_articol_tmp = $_FILES['poza_articol']['tmp_name'];
    	
// 	if(move_uploaded_file($poza_articol_tmp,"$folder_poze/$poza_articol")) {
//       echo "Pozele au fost incarcate cu succes!";
//     } else {
//       echo "Incarcarea pozelor a esuat.";
//     }
    for($i=0;$i<count($_FILES["poza_articol"]["name"]);$i++)
    {

        $document_root=$_SERVER["DOCUMENT_ROOT"];
         move_uploaded_file($_FILES["poza_articol"]["tmp_name"][$i], "$document_root"."/croaziere"."/"."$tara/".$_FILES["poza_articol"]["name"][$i]);
        $poza_articol = implode(",",$_FILES['poza_articol']['name']);
    }
   
            $insereaza_articol = "insert into destinatie_croaziera (titlu, continent, tara, perioada, continut, itinerar, tarife_cazare, servicii_incluse, atractii_turistice, data_publicarii,poza) values
            ('$titlu_articol','$continent','$tara','$perioada_croaziera','$continut_articol','$itinerar','$tarife_cazare','$servicii_incluse','$atractii_turistice','$data_publicarii','$poza_articol')";
    
    $inserare = mysqli_query($conexiune, $insereaza_articol);
        
    if($inserare) {
      echo "<script>alert('Articolul a fost adaugat pe site!')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
 ?>
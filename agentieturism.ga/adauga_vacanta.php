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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
       <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <style>
      body {
        font-family: sans-serif;
        background-color: #4d5d77;
      }
    </style>
  </head>
  <body>

        <form action="adauga_vacanta.php" method="post" enctype="multipart/form-data">
          <table id="mytable" align="center" width="1200px" bgcolor="" border="2">
              <tr align="center">
                  <td colspan="7"><h2>Adauga un articol nou</h2></td>
              </tr>

              <tr>
                  <td align="right"><b>Denumirea hotelului:</b></td>
                  <td><input type="text" name="denumire_hotel" size="60"/></td>
              </tr>
              <tr>
                  <td align="right"><b>Categoria destinatiei:</b></td>
                  <td>
                      <select name="categorie_destinatie">
                        <option>Selecteaza o categorie</option>
                        <?php
                          $categorii = "select * from categorii_destinatii";
                          $ruleaza = mysqli_query($conexiune, $categorii);
                          while ($lista_categorii = mysqli_fetch_field($ruleaza)) {
                         
                            echo "<option>$lista_categorii->name</option>";
                          }
                        ?>
                      </select>
                  </td>
              </tr>

              <tr>
                  <td align="right"><b>Tara:</b></td>
                  <td>
                    <select name="tara" id="tara">
                        <option>Selecteaza tara</option>
                         <?php
                          $tari = "select * from destinatii_tari";
                          $ruleaza = mysqli_query($conexiune, $tari);
                          while ($lista_tari = mysqli_fetch_array($ruleaza)) {
                                $tari = $lista_tari["tara"];
                                echo "<option>$tari</option>";
                          }
                        ?>
                      </select>
                  </td>
              </tr> 
              
              <tr>
                  <td align="right"><b>Poza articol:</b></td>
                  <td><input type="file" name="poza_articol[]" multiple/></td>
              </tr>

              <tr>
                  <td align="right"><b>Oferta cazare:</b></td>
                  <td>
                    <textarea name="oferta_cazare" rows="5" cols="40"></textarea>
                  </td>
              </tr>
              <tr>
                  <td align="right"><b>Descriere hotel:</b></td>
                  <td>
                    <textarea name="descriere_hotel" rows="5" cols="40"></textarea>
                  </td>
              </tr>
              <tr>
                  <td align="right"><b>Servicii:</b></td>
                  <td>
                    <textarea name="servicii" rows="5" cols="40"></textarea>
                  </td>
              </tr>
               <tr>
                  <td align="right"><b>Tip cazare:</b></td>
                    <td> 
                    
                            <label for="">Hotel:</label>
    			    <input type="text" id="hotel" name="nume_hotel">
    			     
                            <label for="">Tip cazare:</label>
    			    <input type="text" id="tip" name="tip_cazare">
    			    
    			    <label for="">Pret:</label>
    			    <input type="text" id="pret" name="pret_cazare">
    			    
    			    <label for="">Facilitati:</label>
    			    <input type="text" id="facilitati" name="facilitati_cazare">
    			     
    			   <input type="submit" id="adauga_date" name="adauga_date" value="Adauga date" />
    			<fieldset>
    			
  				<legend>Capacitate cazare </legend>
    			   <input type="radio" id="capacitate" name="capacitate" value ="person"> 
                   		<label for=""><i class="material-icons">person</i></label>
                   	<input type="radio" id="capacitate" name="capacitate" value ="personperson"> 
                   		<label for=""><i class="material-icons">personperson</i></label>	
                   	<input type="radio" id="capacitate" name="capacitate" value ="personpersonperson"> 
                   		<label for=""><i class="material-icons">personpersonperson</i></label> 
                   	<input type="radio" id="capacitate" name="capacitate" value ="personpersonpersonperson"> 
                   		<label for=""><i class="material-icons">personpersonpersonperson</i></label>   
                   	<input type="radio" id="capacitate" name="capacitate" value ="personperson+person_outline"> 
                   		<label for=""><i class="material-icons">personperson + person_outline</i></label>  
                    <input type="radio" id="capacitate" name="capacitate" value ="personperson+person_outline+person_outline"> 
                   		<label for=""><i class="material-icons">personperson+person_outline+person_outline</i></label> 
                    <input type="radio" id="" name="capacitate" value ="personpersonperson+person_outline"> 
                   		<label for=""><i class="material-icons">personpersonperson+person_outline</i></label>  
                </fieldset>
                  </td>
              </tr>
     
	       <tr>
                  <td colspan="7"><input type="submit" name="adauga_vacanta" value="Adauga vacanta" /></td>
              </tr>
              
          </table>

        </form>
  </body>
  <script type="text/javascript">
  $(document).ready(function() {

	    $("input[type='radio']:checked").each(function() {
	        var idVal = $(this).attr("id");
	        var capacitate = $("label[for='"+idVal+"']").text();
	        
	  	  $.ajax
		  ({
		    type: 'post',
		    data: 
		    {
		    	capacitate:capacitate,
		    },
		    success: function (response) 
		    {
			
		    }
		  });

	  });
  });

//   $("#add").click(function() {

//       $('#mytable tbody>tr:nth-child(9)').clone(true).insertAfter('#mytable tbody>tr:nth-child(9)');
//   });

  $("#adauga_date").click(function() {

  var nume_hotel = $('#hotel').val();
  
  var tip_cazare = $('#tip').val();

  var pret_cazare = $('#pret').val();

  var facilitati_cazare = $('#facilitati').val();
  var capacitate_cazare = $("input[type='radio']:checked").val();

  if(nume_hotel !="" && tip_cazare!="" && pret_cazare!="" && facilitati_cazare!="" && capacitate_cazare !="")
	{
	  $.ajax
	  ({
	    type: 'post',
	    url: 'afisare_vacanta.php',
	    data: 
	    {
	    	nume_hotel:nume_hotel,
	    	tip_cazare:tip_cazare,
	    	pret_cazare:pret_cazare,
	        facilitati_cazare:facilitati_cazare,
	        capacitate_cazare:capacitate_cazare,
	    },
	    success: function (response) 
	    {
		
	    }
	  });
	}

	return false;
  });
	
  </script>
</html>
<?php

if(isset($_POST['adauga_vacanta'])) {

    $denumire_hotel = $_POST['denumire_hotel'];
    $categorie_destinatie = $_POST['categorie_destinatie'];
    $tara = $_POST['tara'];
    $oferta_cazare = $_POST['oferta_cazare'];
    $descriere_hotel = $_POST['descriere_hotel'];
    $servicii = $_POST['servicii'];

    $data_actuala = new DateTime();
    $data_publicarii = $data_actuala->format('Y-m-d H:i:s');
    
    //$path = ''.$tara.'/'.''.$denumire_hotel.'';
    //if (!file_exists('xampp/htdocs/WebsiteNou')) {
        //mkdir(''.$path.'', 0777, true);
    //}

       if (!file_exists($_SERVER["DOCUMENT_ROOT"]."/".vacante."/".$tara."/".$denumire_hotel)) {
        mkdir($_SERVER["DOCUMENT_ROOT"]."/".vacante."/".$tara."/".$denumire_hotel, 0777, true);
    
}
	for($i=0;$i<count($_FILES["poza_articol"]["name"]);$i++)
	{
	    $uploadfile="$tara/".$_FILES["poza_articol"]["tmp_name"][$i];
	    $document_root=$_SERVER["DOCUMENT_ROOT"];
	        move_uploaded_file($_FILES["poza_articol"]["tmp_name"][$i], "$document_root"."/vacante"."/".$tara."/".$denumire_hotel."/".$_FILES["poza_articol"]["name"][$i]);
	    $poza_articol = implode(",",$_FILES['poza_articol']['name']);
	}
	
    $insereaza_articol = "insert into destinatie_vacanta
    (hotel, categorie_destinatie,tara, oferta, data_publicarii, descriere_hotel, servicii, poza) values
    ('$denumire_hotel','$categorie_destinatie','$tara','$oferta_cazare','$data_publicarii','$descriere_hotel','$servicii','$poza_articol')";
    
    $inserare = mysqli_query($conexiune, $insereaza_articol);
    
    if($inserare) {
        echo "<script>alert('Articolul a fost adaugat pe site!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    }
  
 ?>
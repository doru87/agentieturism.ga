<?php
include 'functii.php';
include 'db.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 

<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  

<style type="text/css">

#box {
border-radius: 2px;
padding: 60px;
margin: 50px auto 0;
font-family: 'Open Sans', Arial, sans-serif;
position:relative;
font-size: 100%;
}

#slide{
width:840px;
position:relative;
margin:0 auto;
}

#slide img {
position: absolute;
left: 0;
right: 0;
opacity: 0;
animation-name: fade; 
animation-duration: 30s; 
animation-iteration-count: infinite; 
}

#slide img:nth-child(1){
animation-delay: 0s;     
}

#slide img:nth-child(2){
animation-delay: 3s;
}

#slide img:nth-child(3){
animation-delay: 6s;
}

#slide img:nth-child(4){
animation-delay: 9s;
}

#slide img:nth-child(5){
animation-delay: 12s;
}

@keyframes fade {
0%   { opacity: 0; }
11%   { opacity: 1; }
33%  { opacity: 1; }
55%  { opacity: 1; }
77%  { opacity: 1; }
88%  { opacity: 1; }
100% {  opacity: 0; }
}

#descriere {
min-width: 320px;
max-width: 800px;
padding: 50px;
margin: 0 auto;
margin-top:400px;
background: #3d557c;
}

section {
display: none;
padding: 20px 0 0;
border-top: 1px solid #ddd;
color: #bbb;
}

#descriere input {
display: none;
}

#descriere label {
display: inline-block;
margin-left:15px;
padding: 15px 25px;
font-weight: 600;
text-align: center;
color: #bbb;
border: 1px solid transparent;
}

#descriere label:hover {
color: #888;
cursor: pointer;
}

#tab1:checked ~ #itinerar,
#tab2:checked ~ #tarife_cazare,
#tab3:checked ~ #servicii_incluse,
#tab4:checked ~ #atractii_turistice {
display: block;
}

.container {
width:1000px;
height:600px;
background:#5f6977;
top:100px;
position: relative;
margin:0 auto;
}

.container .perioada {
position: absolute;
top:30px;
left:220px;
}

.container  p {
position: absolute;
top:10px;
left:50px;
}

.container div {
position: relative;
top:10px;
}

.container .calatorie {
position: absolute;
top:50px;
left:50px;
}

.container .interes_serviciu {
position: absolute;
top:100px;
left:50px;
}

.container .titlu {
position: absolute;
top:120px;
left:50px;
}

.container .titlu_persoana {
position: absolute;
top:140px;
left:100px;
}

.container .nume_prenume {
position: absolute;
top:180px;
left:50px;
}

.container .email {
position: absolute;
top:220px;
left:50px;
}

.container .confirmare_email{
position: absolute;
top:260px;
left:50px;
}

.container .telefon {
position: absolute;
top:300px;
left:50px;
}

.container input[type="submit"]{
position: absolute;
top:380px;
left:50px;
}

.form-control {
width: 50%;
height: 34px;
padding: 6px 12px;
display: table;
margin: 0 auto;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;
border: 1px solid #ccc;
border-radius: 4px;
}

textarea.form-control {
height: auto;
}

.form-group {
margin-bottom: 25px;
}

.form{
display: table;
margin: 0 auto;
width:1200px;
position:relative;
top: 100px;
}

.btn {
position:relative;
margin-left:300px;
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: 400;
line-height: 1.42857143;
text-align: center;
white-space: nowrap;
vertical-align: middle;
}

.panel {
 margin-bottom: 20px;
 background-color: #fff;
 border: 3px solid transparent;
 border-radius: 4px;
}

</style>
</head>
<body>
<nav id="main-menu">
     <ul class="nav-bar">
     <li class="acasa"><a href="index.php">Acasa</a></li>
     <li class="vacante"><a href="toate_vacantele.php">Vacante</a></li>
     <li class="circuite"><a href="toate_circuitele.php">Circuite</a></li>
     <li class="croaziere"><a href="toate_croazierele.php">Croaziere</a></li>  
     </ul>
</nav>
<div id="box">
<?php echo afiseaza_croaziera();?>

<div class="container">

	
	     <form action="afisare_croaziera.php?id_articol=<?php echo $_GET["id_articol"];?>" method="POST">
	<input type="hidden" name="id_articol" value="<?php echo $_GET["id_articol"]; ?>" /> 
	
	<p>Perioada croazierei:</p>
	<select name="perioada" class="perioada">
	<?php $query = "select * from destinatie_croaziera where id_articol='".$_GET["id_articol"]."'";
	      $rezultat = mysqli_query($conexiune, $query);
	      while($row = mysqli_fetch_assoc($rezultat)){
	          $perioada_croaziera = $row["perioada"];
	          echo "<option>$perioada_croaziera</option>";
	      }
	?>
	</select>
		<p class="calatorie">Călătoriți în interes de serviciu?</p>
		<div class="interes_serviciu">
			<input type="radio" name="interes_serviciu" value="nu">Nu
			<input type="radio" name="interes_serviciu" value="da">Da
		</div>
		<p class="titlu">Titlu:</p>
			<select class="titlu_persoana" name="titlu_persoana">
				<option value="dl">Dl</option>
				<option value="dna">Dna</option>
			</select>
		<div class="nume_prenume">	
			<label for="prenume">Prenume:</label>
			<input type="text" name="prenume" size="20">
			
			<label for="nume">Nume:</label>
			<input type="text" name="nume" size="20">
		</div>
		<div class="email">
	 		<label for="email">Adresă de e-mail:</label>
			<input type="text" name="email" size="30">
    	</div>
    	<div class="telefon">
	 		<label for="telefon">Număr de telefon:</label>
			<input type="text" name="telefon" size="20">
    	</div>
		<div class="confirmare_email">
			<label for="email">Confirmați adresa de e-mail:</label>
	    	<input type="text" name="confirmare_email" size="30">
		</div>
		<input type="submit" name="confirmare_rezervare_croaziera" value="Confirmați rezervarea">
		</form>
</div>
<?php  if(isset($_POST['confirmare_rezervare_croaziera'])) {
    
            if(isset($_GET["id_articol"])){
                 $id_articol = $_GET["id_articol"];
            }

	    $interes_serviciu = $_POST["interes_serviciu"];
	    $titlu_persoana = $_POST["titlu_persoana"];
	    $prenume = $_POST["prenume"];
	    $nume = $_POST["nume"];
	    $email = $_POST["email"];
	    $telefon = $_POST["telefon"];
	    $perioada = $_POST["perioada"];
	   

	    $query ="insert into rezervari_croaziera(id_articol, interes_serviciu, titlu_persoana, prenume, nume, email, numar_telefon, perioada_rezervare) 
                values ('$id_articol', '$interes_serviciu', '$titlu_persoana', '$prenume', '$nume', '$email', '$telefon', '$perioada')";
	    $rezervare = mysqli_query($conexiune, $query);
	    echo mysqli_error($conexiune);
	 
	    }
?>
</div>


<div class="form">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
      <input type="hidden" name="id_articol" id="id_articol" value="<?php echo $_GET["id_articol"];?>" />
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
</div>
<div id="site-footer">Footer</div>

</body>
<script type="text/javascript">
$(document).ready(function() {
            $('#comment_form').on('submit', function(event){
            	  event.preventDefault();
            	  var form_data = $(this).serialize();
            	  $.ajax({
            	   url:"adauga_comentariu.php",
            	   method:"POST",
            	   data:form_data,
            	   dataType:"JSON",
            	   success:function(data)
            	   {
            	    if(data.error != '')
            	    {
            	     $('#comment_form')[0].reset();
            	     $('#comment_message').html(data.error);
            	     $('#comment_id').val('0');
            	     incarca_comentariu();
            	    }
            	   }
            	  })
			});
            incarca_comentariu();
            function incarca_comentariu()
            {
             var form_data = $('#comment_form').serialize();
             $.ajax({
              url:"obtine_comentariu.php",
              method:"POST",
              data:form_data,
              success:function(data)
              {
               $('#display_comment').html(data);
              }
             })
            

            $(document).on('click', '.reply', function(){
             var comment_id = $(this).attr("id");
             $('#comment_id').val(comment_id);
             $('#comment_name').focus();
            });
            
       }
});
</script>
</html>
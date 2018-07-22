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
<link rel="stylesheet" type="text/css" href="style.css">

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<style type="text/css">
@import src(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700);

#site-content {
min-height: 1800px;
z-index: 1;
text-align:center;
font-size:20px;
margin:100px auto;
}

.tabs {
position:relative;
margin-top:150px;
}

.tabs input, .content {
display: none;
background: #5e5757;
line-height: 25px;
padding: 5px 25px;
color: #fff;
font: Sans-Serif;
font-size: 16px;
max-width: 900px;
margin:0 auto;
margin-top: 50px;
}

#one:checked ~ .one,
#two:checked ~ .two,
#three:checked ~ .three,
#four:checked ~ .four {display: block;}

.tabs label {
cursor: pointer;
background: #999;
height: 25px;
padding: 5px 10px;
display: inline-block;
text-align: center;
color: #fff;
font: normal 1em/150% Sans-Serif;
margin-right: -3px;
transition: background .25s linear;  
}

.tabs label:hover, input:checked + label {background: #ba2020;}

.tabs h3, .tabs p {
text-indent: 25px;
text-align: justify;
}

.slider{
width: 840px; 
position: relative;
padding-top: 350px; 
margin: 0 auto;
box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.75);
}

.slider>img{
position: absolute;
left: 0; top: 0;
transition: all 0.5s;
width: 840px;
height:350px;
}

.slider input[name='slide_switch'] {
display: none;
}

.slider label {
margin: 28px 0 0 28px;
border: 3px solid #999;
float: left;
cursor: pointer;
transition: all 0.5s;
opacity: 0.6;
}

.slider label img{
display: block;
}

.slider input[name='slide_switch']:checked+label {
border-color: #666;
opacity: 1;
}

.slider input[name='slide_switch']:checked ~ img {
opacity: 0;
transform: scale(1.1);
}

.slider input[name='slide_switch']:checked+label+img {
opacity: 1;
transform: scale(1);
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

<aside class="aside">
<ul>
<li><div class="icons"><i class="fa fa-heart"></div></i><div class="linktitle"><a href="#content1">Favorite</a></div></li>
<li><div class="icons"><i class="fa fa-align-justify"></i></div><div class="linktitle">Channels</div></li>
<li><div class="icons"><i class="fa fa-group"></i></div><div class="linktitle">My Group</div></li>
<li><div class="icons"><i class="fa fa-user"></i></div><div class="linktitle">My Profile</div></li>
</ul>
</aside>
<a class="afiseaza"><i class="fa fa-arrow-circle-right"></i></a>
<a class="ascunde"><i class="fa fa-arrow-circle-left"></i></a>

<div class="content" >
<div id="content1">
<a class="close" href=''><i class="fa fa-close"></i>
</a>
</div>
<div id="content2">
</div>
</div>

<div id="site-content">

<?php global $conexiune;

if (isset($_GET['id_articol'])){
    $id = $_GET['id_articol'];

    $interogare = "SELECT * FROM destinatie_circuit where id_articol=$id";
    $rezultat = mysqli_query($conexiune, $interogare);
    
    echo '<div class="slider">';
    while($row = mysqli_fetch_assoc($rezultat)) {
        
     $tara= $row["tara"];
     
     $imagesDirectory = 'circuite/'.$tara.'/';
     
     if(is_dir($imagesDirectory))
     {
         $opendirectory = opendir($imagesDirectory);
         
         while (($image = readdir($opendirectory)) !== false)
         {
             if(($image == '.') || ($image == '..'))
             {
                 continue;
             }
             
             $imgFileType = pathinfo($image,PATHINFO_EXTENSION);
            
             if(($imgFileType == 'jpeg') || ($imgFileType == 'jpg'))
             {
               
                 for ($i=0; $i < count($image); $i++){
                    
                 echo '<input type="radio" name="slide_switch" id="'.$image[$i].'"/>
                     <label for="'.$image[$i].'">
                     <img src="'.$imagesDirectory.$image[$i].'.'.$imgFileType.'" width="130"/>
                     </label>
                     <img src="'.$imagesDirectory.$image[$i].'.'.$imgFileType.'"/>';
                 }
             }
         }
         
         closedir($opendirectory);
   
}
    }
    echo '</div>';
}
?>



<?php afiseaza_circuit();?>	

<div class="container">

	
	     <form action="afisare_circuit.php?id_articol=<?php echo $_GET["id_articol"];?>" method="POST">
	<input type="hidden" name="id_articol" value="<?php echo $_GET["id_articol"]; ?>" /> 
	
	<p>Perioada circuitului:</p>
	<select name="perioada" class="perioada">
	<?php $query = "select * from destinatie_circuit where id_articol='".$_GET["id_articol"]."'";
	      $rezultat = mysqli_query($conexiune, $query);
	      while($row = mysqli_fetch_assoc($rezultat)){
	          $perioada_circuit = $row["perioada"];
	          echo "<option>$perioada_circuit</option>";
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
		<input type="submit" name="confirmare_rezervare_circuit" value="Confirmați rezervarea">
		</form>
</div>
<?php  if(isset($_POST['confirmare_rezervare_circuit'])) {
    
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
	   

	    $query ="insert into rezervari_circuite(id_articol, interes_serviciu, titlu_persoana, prenume, nume, email, numar_telefon, perioada_rezervare) 
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
		$(".ascunde").click(function(){

		 $(this).prev().prev('.aside').css({'left': '-260px'});
		 $(this).css({'display':'none'});
		 $(this).prev('.afiseaza').css({'display':'block','left': '0px'});
		 
		});
	$(".afiseaza").click(function(){

		 $(this).prev('.aside').css({'left': '10px'});
		 $(this).css({'display':'none'});
		 $(this).next('.ascunde').css({'display':'block','left': '271px'});
		 
		});
	

	$("#content1").draggable();
    
    $(".close").click(function(){
        if ($("#content1").hasClass("invisible")){
            
            $(this).parent().removeClass("invisible").addClass("visible");
        }else{
            $(this).parent().removeClass("visible").addClass("invisible");
            
        }
    });

        siteFooter();
 
        $(window).resize(function() {
            siteFooter();
        });
            
            function siteFooter() {
                var siteContent = $('#site-content');
                
                var siteFooter = $('#site-footer');
                var siteFooterHeight = siteFooter.height();
                var siteFooterWidth = siteFooter.width();
                
                
                
                siteContent.css({
                    "margin-bottom" : siteFooterHeight + 200
                });
            };

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
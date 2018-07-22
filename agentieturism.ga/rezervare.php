<?php
include 'functii.php';
include("db.php");
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

.descriere{ 
margin:0 auto;
background: -webkit-linear-gradient(bottom,#eaeaea, #fafafa);
padding: 10px;
box-shadow: 0 1px 1px rgba(0,0,0,.65);
border-radius: 3px;
border: solid 1px #ddd;
width: 850px; 
height: 355px;
}

.descriere input { 
display: none; 
}

.descriere input:checked + label { 
background: #8492a8;
border: solid 1px rgba(0,0,0,.15);
color: white; 
box-shadow: 0 1px 1px rgba(0,0,0,.65), 0 1px 0 rgba(255,255,255,.1) inset;
text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}

.descriere label { 
font-family: helvetica;
display: block; 
border: solid 1px transparent;
width: 850px; 
height: 40px; 
text-align: center; 
line-height: 40px; 
border-radius: 3px; 
margin-bottom: 10px;
border: solid 1px rgba(0,0,0,.15); 
}

.descriere label:last-child { margin-right: 0; }

.descriere label:hover {     
background: rgba(77, 144, 254, .5); 
border: solid 1px rgba(0,0,0,.15); 
}

.descriere article { 
height: 0; 
overflow: hidden; 
transition: .3s ease-out;
position: relative; 
top: 5px;
margin-bottom: 0;
padding: 0 10px;
color: #333;
font-family: helvetica;
font-size: 12px;
line-height: 18px;
display:inline;
}

.slide {
width:800px;
position:relative;
margin: 0 auto;
}

.navslider {
display: table;
margin: 0 auto;
}

.navslider  a { 
 background: #e74c3c;
 border-radius: 20px; 
 color: white;
 display: block;
 float: left;
 font-family: sans-serif;
 font-size: 12px;
 height: 30px;
 line-height: 30px;
 margin: 5px;
 text-align: center;
 text-decoration: none;
 width: 30px;
}

.navslider a:active {
  background: #c0392b;
}

#slider {
background: #ecf0f1;
height: 450px;
position:relative;
overflow: hidden; 
width: 85%;
margin: 0 auto;
}

.box {
color: rgba(255,255,255,.6);
font-family: sans-serif;
font-size: 48px;
height: 100%;
line-height: 300px;
position: absolute;
text-align: center;
width: 100%;
}

:target {
 z-index: 10;
 opacity: 1;
}

.resize {
 height: auto; 
width: auto; 
max-width: 700px; 
max-height: 600px;
}

.container {
width:1000px;
height:600px;
background:#5f6977;
top:100px;
position: relative;
margin:0 auto;
}

.container div {
position: relative;
top:10px;
}

.container .calatorie {
position: absolute;
top:30px;
left:50px;
}

.container .interes_serviciu {
position: absolute;
top:90px;
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
top:280px;
left:50px;
}

.container .telefon {
position: absolute;
top:320px;
left:50px;
}

.container input[type="submit"]{
position: absolute;
top:380px;
left:50px;
}

 .tabel{
 position: relative;
top:180px;
}

th{
font-weight: bold;
color: #fff;
background-color: #224F5E;
border-left: 1px solid #5bbaff;
}

td {
background-color: #FAFCFC;
font-size: 16px;
}
</style>
</head>
<body>

<nav id="main-menu">
     <ul class="nav-bar">
     <li class="acasa"><a href="">Acasa</a></li>
     <li class="vacante"><a href="toate_vacantele.php">Vacante</a></li>
     <li class="circuite"><a href="toate_circuitele.php">Circuite</a></li>
     <li class="croaziere"><a href="">Croaziere</a></li>
     <li class="romania"><a href="">Romania</a></li>
       
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
	
<?php  afiseaza_slide();
afiseaza_vacanta();?>

	<div class="container">
		<div>
			<?php if(isset($_GET["tip_camera"])){
	            $tip_camera = $_GET["tip_camera"];
	               echo $tip_camera;
	               
			}     
	         ?>
	     </div>
	     <form action="rezervare.php?id_articol=<?php echo $_GET["id_articol"];?>&tip_camera=<?php echo $_GET["tip_camera"];?>&de_la=<?php echo $_GET["de_la"];?>&pana_la=<?php echo $_GET["pana_la"];?>&pret_total=<?php echo $_GET["pret_total"];?>" method="post">

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
	 		<label for="telefon">Numar de telefon:</label>
			<input type="text" name="telefon" size="20">
    	</div>
		<div class="confirmare_email">
			<label for="email">Confirmați adresa de e-mail:</label>
	    	<input type="text" name="confirmare_email" size="30">
		</div>
		<input type="submit" name="confirmare_rezervare_vacanta" value="Confirmați rezervarea">
		</form>
	
	</div> 

	<?php  if(isset($_POST['confirmare_rezervare_vacanta'])) {
	    
	    if(isset($_GET["id_articol"])){
	        $id_articol = $_GET["id_articol"];
	    }
	    if(isset($_GET["tip_camera"])){
	        $tip_camera = $_GET["tip_camera"];
	    }
	    if(isset($_GET["de_la"]) && isset($_GET["pana_la"])){
	        $de_la = $_GET["de_la"];
	        $pana_la = $_GET["pana_la"];
	        $data1 = strtotime( $de_la );
	        $data2 = strtotime( $pana_la );
	        $mysqldate1 = date( 'Y-m-d', $data1 );
	        $mysqldate2 = date( 'Y-m-d', $data2 );
	        $perioada_circuit = $de_la.'-'.$pana_la;
	        
	    }
	    if(isset($_GET["pret_total"])){
	        $pret_total = $_GET["pret_total"];
	    }
	
	    $interes_serviciu = $_POST["interes_serviciu"];
	    $titlu_persoana = $_POST["titlu_persoana"];
	    $prenume = $_POST["prenume"];
	    $nume = $_POST["nume"];
	    $email = $_POST["email"];
	    $telefon = $_POST["telefon"];
	   
        $query1 ="select * from rezervari_vacante";
        $interogare = mysqli_query($conexiune, $query1);
        if (mysqli_num_rows($interogare) > 0){
            while ($row = mysqli_fetch_array($interogare)){
                $inceput_vacanta = $row['data_inceput_vancata'];
                if ($mysqldate1 == $inceput_vacanta){
                    echo "Data exista deja.";
                }
            }
        }
	    $query2 ="insert into rezervari_vacante(id_articol, interes_serviciu, titlu_persoana, prenume, nume, email, numar_telefon, tip_camera, perioada_rezervare, pret_total) 
                values ('$id_articol', '$interes_serviciu', '$titlu_persoana', '$prenume', '$nume', '$email', '$telefon','$tip_camera', '$perioada_circuit', '$pret_total')";
	    $rezervare = mysqli_query($conexiune, $query2);
	    echo mysqli_error($conexiune);
	 
	    }
	?>
	
</div>


<div id="site-footer">Footer</div>

</body>
<script type="text/javascript">
$(document).ready(function() {

	$("input[type=radio]").change(function(){
		$(this).next().next("article").css({'display': 'inline'});
		$(this).next().next("article").slideDown();

	});
	$(".ascunde").click(function(){
	
		$(this).css({'left': '0px'});

		 $(this).prev().prev('.aside').css({'left': '-160px'});
		 $(this).css({'display':'none'});
		 $(this).prev('.afiseaza').css({'display':'block','left': '0px'});
		 
		});
	$(".afiseaza").click(function(){
		
		$(this).css({'left': '200px'});

		 $(this).prev('.aside').css({'left': '40px'});
		 $(this).css({'display':'none'});
		 $(this).next('.ascunde').css({'display':'block','left': '200px'});
		 
		});
	

	$("#content1").draggable();
    
    $(".close").click(function(){
        if ($("#content1").hasClass("invisible")){
            
            $(this).parent().removeClass("invisible").addClass("visible");
        }else{
            $(this).parent().removeClass("visible").addClass("invisible");
            
        }
    });
        // INITIATE THE FOOTER
        siteFooter();
        // COULD BE SIMPLIFIED FOR THIS PEN BUT I WANT TO MAKE IT AS EASY TO PUT INTO YOUR SITE AS POSSIBLE
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
});

    </script>
</html>
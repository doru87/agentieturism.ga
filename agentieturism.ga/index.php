<?php
include 'functii.php';
include 'db.php';

session_start();
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

.site-content {
min-height: 1800px;
z-index: 1;
text-align: center;
font-size: 20px;
margin: 100px auto;
}

figure.snip1082 {
 font-family: 'Raleway', Arial, sans-serif;
position: relative;
float: left;
overflow: hidden;
width: 420px;
height: 340px;
background: #000000;
}

figure.snip1082 * {
box-sizing: border-box;
transition: all 0.3s ease-in-out;
}

figure.snip1082 img {
width: 420px;
height: 340px;
display:block;
margin:auto;
}

figure.snip1082 h3 {
position: absolute;
left: 15px;
color: #ffffff;
bottom: 10px;
margin: 0;
text-transform: uppercase;
font-weight: 400;
}

figure.snip1082 h3 span {
font-weight: 800;
}

figure.snip1082.blue > div {
background-color: #0a212f;
}

figure.snip1082:hover h3 {
bottom: 56px;
}

figure.snip1082:hover > div {
background-color: #0a212f;
bottom: 0;
}

.field_container {
display: inline-block;
margin-top:10px;
color: #ffffff;
background: #282727;
padding:20px;
}

input[type="submit"]{
background:#d1d2d3;
color:#2f353a;
padding:3px;
border-radius: 5px;
}

.cauta {
margin-left:10px;
}

#text_cautat {
width:130px;
}

.snip1082  .fa-heart{
font-size: 40px;
color: #4f1217;
position:absolute;
left:370px;
}

.snip1082  .fa-heart:hover {
cursor:pointer;
}
.utilizator{
width:100px;
display: block;
margin-left:80px;
top: -22px;
position: relative;
}

.parola{
width:100px;
margin-top:10px;
display: block;
margin-left:80px;
top: -32px;
position: relative;
}

.detalii_utilizator{
width: 200px;
margin: 0 auto;
}

.log_in input[type="submit"]{
top: -20px;
position: relative;
}

.poza_profil {
margin-left: -56px;
margin-top: 30px;
}

.log_out {
left: 70px;
position: relative;
}

</style>
</head>
<body>

<nav id="main-menu">
     <ul class="nav-bar">
     <li class="acasa"><a href="">Acasa</a></li>
     <li class="vacante"><a href="toate_vacantele.php">Vacante</a></li>
     <li class="circuite"><a href="toate_circuitele.php">Circuite</a></li>
     <li class="croaziere"><a href="toate_croazierele.php">Croaziere</a></li>       
     </ul>
</nav>



<aside class="aside">
<ul>
<li><div class="icons"><i class="fa fa-heart"></div></i><div class="linktitle"><a href="#content1">Favorite</a></div></li>
<li><div class="icons"><i class="fa fa-align-justify"></i></div>   <input type="text" name="search_text" id="text_cautat" placeholder="Cauta Vacanta" /><input type="submit" class="cauta" value="Cauta"/></li>
<li><div class="icons"><i class="fa fa-group"></i></div><div class="linktitle">My Group</div></li>
<li>
		<form method='post' class='log_in'> 
			<label for="utilizator" >Utilizator:</label>
	     	<input type='text' name='utilizator' class='utilizator'/> 
	     <label for="parola">Parola:</label>
	    <input type='password' name='parola' class='parola'/> 
	      <input type='submit' name='logare' value='Log in'/> 
		</form>

<?php 
		
		if (isset($_POST['logare'])) {
		    global $conexiune;
		    $utilizator = mysqli_real_escape_string($conexiune,$_POST['utilizator']);
		    $parola = mysqli_real_escape_string($conexiune,$_POST['parola']);
		    
		    
		    $sql = "SELECT * FROM utilizatori_inscrisi WHERE nume_utilizator ='".$_POST['utilizator']."' AND parola_utilizator='".$_POST['parola']."'";
		    $rezultat = mysqli_query($conexiune,$sql);
		    
		    if (mysqli_num_rows($rezultat) == 1) {
		        $row = mysqli_fetch_assoc($rezultat);
		        $_SESSION['utilizator'] = $row['nume_utilizator'];
		        $_SESSION['id_utilizator'] = $row['id_utilizator'];
		       
		        //header("Location:toate_vacantele.php");
		        echo "<script>location='toate_vacantele.php'</script>";	
		        exit();
		    } 		    
		}
?>
		
</li>
<li><div class="icons"><i class="fa fa-user"></i></div><div class="linktitle">Profilul Meu</div>

<div class="log_out">
     <?php if(isset($_SESSION['utilizator'])){
	 	echo '<b><a href="logout.php">Log out</a></b>';
	 	
	 	}
	 	?>
</div>
<div class="detalii_utilizator">
<?php  if(isset($_SESSION['utilizator'])){
    
    $utilizator = $_SESSION['utilizator'];
    $query = "select * from utilizatori_inscrisi where nume_utilizator='$utilizator'";
    $rezultat = mysqli_query($conexiune, $query);
    while($row = mysqli_fetch_array($rezultat)){
        $nume_prenume = $row["nume_prenume_utilizator"];
        $poza_profil = $row["poza_profil"];
    }
    echo '
            <div class="nume">'.$nume_prenume.'</div>
            <div class="poza_profil"><img src="data:image/jpeg;base64,'.base64_encode($poza_profil).'" width="128"/></div>';
}

?>
</div>
</li>
</ul>
</aside>
<a class="afiseaza"><i class="fa fa-arrow-circle-right"></i></a>
<a class="ascunde"><i class="fa fa-arrow-circle-left"></i></a>

<div class="site-content" >
<div id="content1">
<a class="close" href=''><i class="fa fa-close"></i>
</a>
</div>
<div id="content2">
</div>
</div>

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


        
    </script>
</html>
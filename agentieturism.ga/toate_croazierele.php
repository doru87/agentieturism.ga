<?php 
include 'db.php';
include 'functii.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<style type="text/css">

* {
margin: 0;
padding: 0;
box-sizing: border-box;
transition: all .4s;
}

#box {
position:relative;
display: block;
width: 350px;
height:500px;
background: #fff;
border-radius: 2px;
padding: 20px;
margin: 50px auto 0;
font-family: 'Open Sans', Arial, sans-serif;
box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
font-size: 100%;
}

#box h4 {
font-size: 80%;
}

#box p,
#box a {
font-size: 75%;
}

#box a {
text-decoration: none;
color: #7d9823;
font-weight: bold;
}

#box a:hover {
text-decoration: underline;
}

#box figure {
width: 300px;
margin: 0 auto;
background: #fff;
border-radius: 6px;
overflow: hidden;
border: 1px solid #91BED4;
position: relative;
}

#box figure .continent {
display: inline-block;
position: absolute;
padding: 5px;
background: #26A6D1;
top: 130px;
right: 10px;
border-radius: 3px;
color: #fff;
font-size: 70%;
border: 1px solid #fff;
}

#box figure .continent span {
text-transform: uppercase;
font-weight: bold;
}

#box figure img {
max-height: 220px;
background: #ccc;
}

#box figure h4 {
color: #003354;
margin: 10px auto;
text-align: center;
}

#box figure p {
color: #003354;
border-bottom: 1px solid #91BED4;
padding-bottom: 10px;
}

#box figure a {
float: right;
margin-top: 10px;
}

#box figure figcaption {
padding: 10px;
overflow: hidden;
}

body > p {
position: absolute;
right: 0;
bottom: 0;
padding: 10px;
color: #fff;
font-family: Helvetica, Arial, sans-serif;
}

#site-content {
min-height: 1800px;
z-index: 1;
text-align: center;
font-size: 20px;
margin: 100px auto;
}

.panou_croaziera{
width: 1200px;
border-radius: 3px;
display: flex;
justify-content: space-around;
flex-direction: row;
flex-wrap: wrap;
margin:0 auto;
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

.log_in input[type="submit"]{
top: -20px;
position: relative;
}

.poza_profil {
margin-left:30px;
margin-top:30px;
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
<li><div class="icons"><i class="fa fa-align-justify"></i></div><input type="text" name="search_text" id="text_cautat" placeholder="Cauta Croaziera" /><input type="submit" class="cauta" value="Cauta"/></li>
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
		       
		        //header("Location:toate_croazierele.php");
		        echo "<script>location='toate_croazierele.php'</script>";	
		        exit();
		    } 		    
		}
?>
		
</li>
<li><div class="icons"><i class="fa fa-user"></i></div><div class="linktitle">Profilul Meu</div>


     <?php if(isset($_SESSION['utilizator'])){
	 	echo '<b><a href="logout.php">Log out</a></b>';
	 	
	 	}
	 	?>
<?php  if(isset($_SESSION['utilizator'])){
    
    $utilizator = $_SESSION['utilizator'];
    $query = "select * from utilizatori_inscrisi where nume_utilizator='$utilizator'";
    $rezultat = mysqli_query($conexiune, $query);
    while($row = mysqli_fetch_array($rezultat)){
        $nume_prenume = $row["nume_prenume_utilizator"];
        $poza_profil = $row["poza_profil"];
    }
    echo '<div class="detalii_utilizator">
            <div class="nume">'.$nume_prenume.'</div>
            <div class="poza_profil"><img src="data:image/jpeg;base64,'.base64_encode($poza_profil).'" width="128"/></div>
         </div>';
}
?>

</li>
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
<div class="panou_croaziera">

<?php echo obtine_croaziera();?>

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

 function load_data(query) {
      	 		$.ajax({
      	    	url:"cauta_croaziera.php",
      	   		method:"POST",
      	    	data:{query:query},
      	    	success:function(data) {
      	     		$('.panou_croaziera').html(data);
      	    	}
      	   		});
      	  	}

        	$("input[type='submit']").on("click", function(){
      	   		var text = $(this).parent().find("#text_cautat").val();
      	   		if(text != '') {
      	    		load_data(text);
      	   		}
      	   		else {
      	    		load_data();
      	   		}
      	  });

      	  $(".fa-heart").click(function() {
          	  
           });
    });
</script>
</html>
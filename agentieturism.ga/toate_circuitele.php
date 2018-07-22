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
}

#site-content {
min-height: 1800px;
z-index: 1;
text-align:center;
font-size:20px;
margin:100px auto;
}

.panou_circuit{
width: 1200px;
border-radius: 3px;
display: flex;
justify-content: space-around;
flex-direction: row;
flex-wrap: wrap;
margin: 0 auto;
}
.post-module {
position:relative;
display: block;
background: #FFFFFF;
width: 350px;
height: 500px;
box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
transition: all 0.3s linear 0s;
}

.post-module:hover{
box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
}

.post-module:hover .thumbnail img {
position:relative;
transform: scale(0.9);
opacity: .8; 
}

.post-module .thumbnail {
background: #000000;
height: 200px; 
}
.post-module .thumbnail img {
position:relative;
top:20px;
width: 90%;
transition: all 0.3s linear 0s;
margin:0 auto;
}

.post-module .post-content {
position:relative;
top:40px;
background: #FFFFFF;
width: 100%;
padding: 20px;
}

.post-module:hover .post-content {
top:0;
}
.post-module:hover .post-content .description  {
display: block;
}

.post-module .post-content .category {
position: absolute;
bottom:0;
left: 0;
background: #282727;
padding: 10px 15px;
color: #FFFFFF;
font-size: 16px;
text-transform: uppercase;
}

.post-module .post-content  .title {
margin: 0 auto;
color: #333333;
font-size: 26px;
}

.post-module .post-content .description {
display: none;
color: #666666;
font-size: 18px;
line-height: 1em;
white-space: pre;

}
.post-module .post-content .timestamp {
margin-top:50px;
margin-left:50px;
}
.post_content a {
text-decoration: none;
}

[id^="modal"] {
position: fixed;
top: 0;
right: 0;
bottom: 0;
left: 0;
z-index: -1;
background: rgba(0, 0, 0, 0.7);
display:none;
}

.modal img {
margin: auto;
position: absolute;
top: 0;
left:0;
right:0;
bottom: 0;
max-height: 100%;
max-width: 100%;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
box-sizing: border-box;
transition: .5s ease-in-out;
}

[id^="modal"]:target,
[id^="modal"]:target > .modal {
display:block;
z-index: 2;
}

.modal .closes {
position: absolute;
width:30px;
height:30px;
background: white;
color: black;
text-decoration: none;
border-radius:20px;
top: 350px;
right:470px;
}

#navigation{
width: 200px;
position: absolute;
right: 70px;
background: #282727;
}

#navigation ul{
font-size: 1.3rem;
line-height: 1.6;
padding:0px;
margin:0px;
}

#navigation ul li{
list-style-type:none;
color:#5a5b5b;
padding:10px;
border-bottom: 2px solid #da5547;
cursor:pointer;
}

#navigation ul li a {
text-decoration: none;
color:#fff;
}

.price-filter {
text-align: center;
width: 550px;
margin:0 auto;
}

#filters {
height: 5em;
text-align: center;
margin-bottom: 1.5em;
width: 550px;
margin: 0px auto;
}

button {
font: bold 1.2em Arial, sans-serif;
display: inline-block;
height: 2em;
line-height: 2;
text-align: center;
padding: 0 1em;
margin-left: 1em;
border: 2px solid #ccc;
color: #000;
text-decoration: none;
}

button.selected {
color: #08c;
border-color: #08c;
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
<li><div class="icons"><i class="fa fa-align-justify"></i></div>   <input type="text" name="text_cautat" id="text_cautat" placeholder="Cauta Circuit" /><input type="submit" class="cauta" value="Cauta"/></li>
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
		       
		        //header("Location:toate_circuitele.php");
		        echo "<script>location='toate_circuitele.php'</script>";	
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
<?php 
$minimum_range = 3000;
$maximum_range = 5000;
?>

<div id="site-content">
<div class="price-filter">
 
   <form method="post" action="">
        <div>
            Pret de la <span id="pret1"><?php echo $minimum_range?></span>
            la <span id="pret2"><?php echo $maximum_range?></span>
           <input type="hidden" name="minimum_range" id="minimum_range"  value="" />
            <div id="price_range"></div>
            <input type="hidden" name="maximum_range" id="maximum_range"  value="" />
            <?php if (isset($_GET['continent'])){?>
            <input type="hidden" name="cont" id="cont" value="<?php echo htmlspecialchars($_GET['continent'], ENT_QUOTES); ?>">
            <?php } ?>
            <input type="submit" name="submit_range" value="Submit">
        </div>
    </form>
</div>
	<div id="filters">
	  <select id='list'>
		<option value='asc'>Data plecarii in ordine ascendenta</option>
		<option value='desc'>Data plecarii in ordine descendenta</option>
      </select>
	</div>
<div id="navigation">
	<ul>
<?php 
      $output = '';
      $destinatii ="select * from destinatii_continente";
      $ruleaza = mysqli_query($conexiune, $destinatii);
        while ($lista_destinatii = mysqli_fetch_array($ruleaza)) {
            $continent = $lista_destinatii["continent"];
            $output .= ' <li><a href="toate_circuitele.php?continent='.$continent.'">'.$continent.'</a></li>';
      }
        echo $output;
        
      ?>
	</ul>	
</div>
<div class="panou_circuit">
   
      <?php echo obtine_circuit();?>

</div>
<div id="site-footer"></div>
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




	$("#price_range").slider({
		range: true,
		min: 1000,
		max: 10000,
		values: [ <?php echo $minimum_range; ?>, <?php echo $maximum_range; ?> ],
		slide:function(event, ui){
			$("#minimum_range").val(ui.values[0]);
			$("#maximum_range").val(ui.values[1]);

			$("#pret1").html(ui.values[0]);
			$("#pret2").html(ui.values[1]);
		/* 	var minimum_range = ui.values[0];
			var maximum_range= ui.values[1];

			$.ajax({
				url:"getData.php",
				method:"POST",
				data:{minimum_range:minimum_range, maximum_range:maximum_range},
				success:function(data)
				{
					$('#site-content').html(data); 
				}
			});*/
		}
	});

	 $('#list').change(function() {
		 if ($(this).val() === 'asc') {
	 $("#site-content .post-module").sort(function (a, b) {
		 var date1 = $(a).find(".sortare_data").text();
		    date1 = date1.split('-');
		    date1 = new Date(date1[2], date1[1] - 1, date1[0]);
		    var date2 = $(b).find(".sortare_data").text();
		    date2 = date2.split('-');
		    date2 = new Date(date2[2], date2[1] - 1, date2[0]);
		
		    return date1 > date2;
		}).appendTo("#site-content .panou_circuit");
		 } else if ($(this).val() === 'desc') {
			 $("#site-content .post-module").sort(function (a, b) {
				 var date1 = $(a).find(".sortare_data").text();
				    date1 = date1.split('-');
				    date1 = new Date(date1[2], date1[1] - 1, date1[0]);
				    var date2 = $(b).find(".sortare_data").text();
				    date2 = date2.split('-');
				    date2 = new Date(date2[2], date2[1] - 1, date2[0]);
				
				    return date1 < date2;
				}).appendTo("#site-content .panou_circuit");
		 }
		});

    function load_data(query) {
      	 		$.ajax({
      	    	url:"cauta_circuit.php",
      	   		method:"POST",
      	    	data:{query:query},
      	    	success:function(data) {
      	     		$('.panou_circuit').html(data);
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
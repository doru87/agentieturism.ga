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

#site-content {
    min-height: 1800px;
    z-index: 1;
    text-align: center;
    font-size: 20px;
    margin: 100px auto;
}
.descriere{ 

    margin:0 auto;
    background: -webkit-linear-gradient(bottom,#eaeaea, #fafafa);
    padding: 10px;
    display: block;
    box-shadow: 0 1px 1px rgba(0,0,0,.65);
    border-radius: 3px;
    border: solid 1px #ddd;
    width: 850px; 
    height: 355px;
    margin-top:30px;
}
.descriere input { 
    display: none; 
}
.descriere input:checked + label { 

    color: black; 

    text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}
.descriere label { 
     background: #8492a8;
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
width:1200px;
height:1300px;

top:100px;
position: relative;
margin:0 auto;
}
.tabel {

}
.container input[type="text"]{
 position: relative;
top:30px;
}
.container input[type="button"]{
 position: relative;
top:30px;
}
.nr_camere {
 position: relative;
top:60px;
left:80px;
float:left;
}
#camere {
 position: relative;
top:80px;
left:100px;
float:left;
}
.nr_adulti {
 position: relative;
top:60px;
left:120px;
float:left;
}
#adulti {
 position: relative;
top:80px;
left:140px;
float:left;
}
.nr_copii {
 position: relative;
top:60px;
left:160px;
float:left;
}
#copii {
 position: relative;
top:80px;
left:180px;
float:left;
}
.panou_tabel .tabel{
 position: absolute;
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
.rezervare {
position:relative;
float:right;
right:-200px;
top:155px;
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
	
<?php  afiseaza_slide();
afiseaza_vacanta();?>

	<div class="container">
	<form action="rezervare.php" method="GET">
	<div>
	
        <input type="text" name="de_la" id="de_la" value ="" placeholder="Data Check-in:" />
        <input type="text" name="pana_la" id="pana_la" value ="" placeholder="Data Check-out:" />  
        <input type="button" name="filter" id="filter" value="OK" />
    </div>
    
    <div>    
        <p class="nr_camere">Camere</p>
      		<select id='camere'>
      	<?php for ($x = 1; $x < 31; $x++) {
		  echo '<option value='.$x.'>'.$x.'</option>';
		} ?>
	  		</select>
	  		
	    <p class="nr_adulti">Adulti</p>
      		<select id='adulti'>
      	<?php for ($x = 1; $x < 31; $x++) {
		  echo '<option value='.$x.'>'.$x.'</option>';
		} ?>
	  		</select>
	  		
	  	<p class="nr_copii">Copii</p>
      		<select id='copii'>
      	<?php for ($x = 1; $x < 11; $x++) {
		  echo '<option value='.$x.'>'.$x.'</option>';
		} ?>
	  		</select>
     </div>
       
        
        
        
        <div class="panou_tabel">
		
		<input type="hidden" name="id_articol" id="id_articol" value="<?php echo $_GET["id_articol"]; ?>" /> 
		<input type="hidden" name="hotel" id="hotel" value="<?php echo $_GET["hotel"]; ?>" /> 
           <table class="tabel">  
                <tr>
    				<th width="25%">Tipul camerei</th>
   					<th width="15%">Capacitate</th>
    				<th width="10%">Pretul zilei</th>
    				<th width="10%">Pretul perioadei selectate/camera</th>
    				<th width="15%">Optiunile dumneavoastra</th>
    				<th width="10%">Selectati camere</th>
 
    				 
   
    </tr>

  
                
             
           </table>
           
           <table class="rezervare" width="200px">
           <tr>
           		<th>Rezervati</th>
           </tr>
           
           <tr>
           		<td height="100px">
                        <span class="zile_sejur"></span>
                		<div class="pret_final"></div>
                		<input type="hidden" name="tip_camera" class="tip_camera" value=""/>
                	    <input type="hidden" name="pret_total" class="pret_total" value=""/>
                		<button class ="buton_rezervare" type="submit">Rezervați</button>
                </td>
           </tr>
           
           </table>
          
    </div>
</form>
	</div> 

</div>
	
  `		<?php if(isset($_POST['nume_hotel']) && isset($_POST['tip_cazare']) && isset($_POST['pret_cazare']) && isset($_POST['facilitati_cazare']) && isset($_POST['capacitate_cazare'])) { 
	       
            $nume_hotel=$_POST['nume_hotel'];
            $tip_cazare=$_POST['tip_cazare'];
            $pret_cazare=$_POST['pret_cazare'];
            $facilitati_cazare=$_POST['facilitati_cazare'];
            $capacitate_cazare=$_POST['capacitate_cazare'];
            
            
            $query = "INSERT INTO date_tabel (nume_hotel,tip_cazare,pret_cazare,facilitati_cazare,capacitate_cazare) VALUES ('$nume_hotel','$tip_cazare','$pret_cazare','$facilitati_cazare','$capacitate_cazare')";
            
            $insereaza=mysqli_query($conexiune,$query);
            
        }
        
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
        ?>

</body>
<script type="text/javascript">
$(document).ready(function() {

	 $.datepicker.setDefaults({  
         dateFormat: 'yy-mm-dd'   
    });  
    $(function(){  
         $("#de_la").datepicker();  
         $("#pana_la").datepicker();  
    });  

    $('#de_la').datepicker({
        inline: true,
        altField: '.de_la',
        onSelect: function () {
            //alert($(this).val());
            localStorage.setItem("de_la_data_selectata", $(this).val());
            //document.getElementById("de_la").value = localStorage.getItem("de_la_data_selectata");
            //$('#de_la').val(localStorage.getItem("de_la_data_selectata"));
        }
    });

    if (localStorage.getItem("de_la_data_selectata") != null) {
        $('#de_la').datepicker("setDate",localStorage.getItem("de_la_data_selectata"));
        $('#de_la').val(localStorage.getItem("de_la_data_selectata"));
    }

    $('#pana_la').datepicker({
        inline: true,
        altField: '.pana_la',
        onSelect: function () {
            //alert($(this).val());
            localStorage.setItem("pana_la_data_selectata", $(this).val());
            //$('#formscelta').submit();
        }
    });

    if (localStorage.getItem("pana_la_data_selectata") != null) {
        $('#pana_la').datepicker("setDate", localStorage.getItem("pana_la_data_selectata"));
    }

    
    $('#filter').click(function(){  
         var de_la = $('#de_la').val();  
         var pana_la = $('#pana_la').val();
         var nr_adulti = $('#adulti'); 
         var id_articol = $('#id_articol').val();
         var hotel =$('#hotel').val();
         
         var adulti = $(this).parent().parent().find(nr_adulti).find('option:selected').text();
         if(de_la != '' && pana_la != '' && adulti != '' && id_articol != '')  
         {  
              $.ajax({  
                   url:"primul_rand.php",  
                   method:"POST",  
                   data:{de_la:de_la, pana_la:pana_la, id_articol:id_articol, hotel:hotel},  
                   success:function(data)  
                   {  
                	   $(".panou_tabel .tabel").html(data);  
                	 
                   }  
              });  
         }  
         else  
         {  
              alert("Please Select Date");  
         } 

         
         if(de_la != '' && pana_la != '')  
         {  
              $.ajax({  
                   url:"zile_sejur.php",  
                   method:"POST",  
                   data:{de_la:de_la, pana_la:pana_la, adulti:adulti},  
                   success:function(data)  
                   {  
                	   
                	   $(".zile_sejur").html(data);
                   }  
              });  
         }  
         else  
         {  
              alert("Please Select Date");  
         }   

      
         
    });  


	$(function(){
		$(document).on("change",".panou_tabel .tabel .primul_rand #nr_camere",function () {
			
        var nr_camere = $(this).find('option:selected').text();
        var pret_perioada = $(this).parent().parent().find("td:nth-child(4)").text();
        var tip_camera = $("option:selected", this).val();
     
        $.ajax({
            url: "nr_camere.php",
            type: "POST",
            data: {nr_camere:nr_camere, pret_perioada:pret_perioada},
            success: function (data) {
              
               $(".panou_tabel .rezervare tr:nth-child(2) td .pret_final").html(data);
               $(".panou_tabel .rezervare tr:nth-child(2) td .pret_total").val(data);


                $.ajax({
                    url: "tip_camera.php",
                    type: "POST",
                    data: {tip_camera},
                    success: function (data) {
                    	  $(".panou_tabel .rezervare tr:nth-child(2) td .tip_camera").val(data);
                    	 
                    }
                });
                
            }
        });
    }); 
	});

   
	  $('.buton_rezervare').click(function(){  
		  
	  });
    
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
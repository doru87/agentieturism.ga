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

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<style type="text/css">
@import src(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700);

html, body {
padding: 0;
margin: 0;
background-color: #c6c6c6;
}

#site-content {
width:1100px;
min-height: 1800px;
padding-top: 100px;
position: relative;
z-index: 1;
text-align:center;
font-size:20px;
box-shadow: #000 0 7px 25px 0;
margin:100px auto;
background:#a3b4cc;
}

#site-footer {
height:200px;
width:1100px;
margin:0 auto;
padding: 5px 0;
font-size: 85%;
background-color: #2A2A2A;
position: fixed;
z-index: -1;
left: 0;
right: 0;
bottom: 0;
text-align:center;
font-size:60px;
}

aside{
position:fixed;
top:200px;
left:-160px;
height:600px;
width:160px;
background:#222527;
transition: left .1s;
}

.ascunde {
position:fixed;
top:200px;
left:0px;
font-size: 50px;
display:none;
}

.afiseaza {
position:fixed;
top:200px;
left:0px;
font-size: 50px;
}

ul {
padding:0px;
margin:0px;
border-bottom:1px solid #1c1f21;
}

ul li {
list-style-type:none;
color:#5a5b5b;
padding:10px;
border-bottom:1px solid #afc0cc;
overflow:hidden;
cursor:pointer;
}

ul li a {
text-decoration: none;
color:#5a5b5b;
}

.fa {
color:#18a3fc;
display:block;
}

ul li a:hover {
color:#638db7;
}

ul li div {
float:left;
}

.icons {
padding:10px;
}

#content1 {
height:400px;
width:800px;
background:#222527;
position: fixed;
top:20px;
margin-left:300px;
opacity: 0;
margin-top:300px;
cursor: pointer;
}

#content1:target {
z-index: 10;
opacity: 1;
transform: translateX(50px);
transition: all 1s;
}

.invisible{
display:none;
}

.visible {
display:block;
}

#content1 .close {
background: #606061;
color: #FFFFFF;
cursor: pointer;
position: absolute;
top: 10px;
right: 20px;
padding: 7px;
opacity: 1.4;
text-decoration: none;
}

.post-module {
z-index: 1;
display: block;
background: #FFFFFF;
width: 350px;
height: 200px;
box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
transition: all 0.3s linear 0s;
float:left;
margin-left:80px;
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
overflow: hidden;
}

.post-module .thumbnail img {
position:relative;
top:20px;
display: block;
width: 90%;
transition: all 0.3s linear 0s;
margin:0 auto;
}

.post-module .post-content {
position:relative;
background: #FFFFFF;
width: 100%;
padding: 20px;
box-sizing: border-box;
}

.post-module:hover .post-content {
top:-20px;
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
line-height: 1.8em;
white-space: pre;
}

.post-module .post-content .timestamp {
margin-left:50px;
}

.post_content a {
text-decoration: none;
}

#modal {
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

#modal:target,
#modal:target > .modal {
display:block;
z-index: 2;
}

.modal .close {
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

#main-menu .nav-bar {
width:1000px;
margin:0 auto;
margin-top: 40px;
}

#main-menu .nav-bar li {
display:inline;
padding:0 0 0 80px; 
}

#main-menu .nav-bar li a {
text-decoration: none;
padding-left: 20px;
text-transform: uppercase;
color: #39404c;
text-shadow: 1px 1px 1px #ccc;
}

.tabel{
position: relative;
top:0;
margin:0 auto;
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
     <li class="romani"><a href="">Romania</a></li>
       
     </ul>
</nav>

<aside class="aside">
<ul>
<li><div class="icons"><i class="fa fa-heart"></div></i><div class="linktitle"><a href="#content1">Favorite</a></div></li>
<li><div class="icons"><i class="fa fa-align-justify"></i></div><div class="linktitle">Channels</div></li>
<li><div class="icons"><i class="fa fa-group"></i></div><div class="linktitle">My Group</div></li>
<li><div class="icons"><i class="fa fa-user"></i></div><div class="linktitle">Profilul meu</div></li>
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
		<table class="tabel">  
                <tr>  
                     <th width="10%">Numele</th>  
                     <th width="10%">Prenumele</th>  
                     <th width="15%">E-mail</th>  
                     <th width="10%">Numar telefon</th>  
                     <th width="20%">Perioada rezervarii</th>     
                </tr>
				
		  <?php $interogare = "SELECT * FROM rezervari_circuite";
                      $rezultat = mysqli_query($conexiune, $interogare);
    
                            while($row = mysqli_fetch_array($rezultat)) {
        
                                $id = $row["id_articol"];
                                $interes_serviciu = $row["interes_serviciu"];
                                $titlu_persoana = $row["titlu_persoana"];
                                $prenume = $row["prenume"];
                                $nume = $row["nume"];
                                $email = $row["email"];
                                $telefon = $row["numar_telefon"];
                                $perioada_rezervare =$row["perioada_rezervare"];
    
				 echo '<tr>
			
                	        <td>'.$nume.'</td>
                                <td>'.$prenume.'</td>
                                <td>'.$email.'</td>
                                <td>'.$telefon.'</td>
                                <td>'.$perioada_rezervare.'</td>
                                </tr>';
                            }
                  ?>
	        </table>

</div>
	

<div id="site-footer">Footer</div>

</body>

    </html>
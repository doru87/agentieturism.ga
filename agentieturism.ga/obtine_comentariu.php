<?php
include("db.php");

$id_articol = $_POST["id_articol"];
$query = "SELECT * FROM comentarii_utilizatori WHERE id_comentariu_parinte = '0' AND id_articol = '$id_articol' ORDER BY id_comentariu DESC";

$rezultat = mysqli_query($conexiune, $query);

if (!$rezultat) {
    printf("Error: %s\n", mysqli_error($conexiune));
    exit();
}
$output = '';
mysqli_fetch_all($rezultat,MYSQLI_ASSOC);
foreach($rezultat as $row)
{
    $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>'.$row["nume_expeditor"].'</b> on <i>'.$row["data"].'</i></div>
  <div class="panel-body">'.$row["comentariu"].'</div>
  <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["id_comentariu"].'">Reply</button></div>
 </div>
 ';  
    $output .= get_reply_comment($conexiune, $row["id_comentariu"]);
}

echo $output;

function get_reply_comment($conexiune, $id_parinte = 0, $marginleft = 0) {
    $query = " SELECT * FROM comentarii_utilizatori WHERE id_comentariu_parinte = '".$id_parinte."'";
    $output = '';
    $rezultat = mysqli_query($conexiune, $query);
    
    $count=mysqli_num_rows($rezultat);
    
    if (!$rezultat) {
        printf("Error: %s\n", mysqli_error($conexiune));
        exit();
    }
    if($id_parinte == 0)
    {
        $marginleft = 0;
    }
    else
    {
        $marginleft = $marginleft + 48;
    }
    if($count > 0)
    {
        foreach($rezultat as $row)
        {
            $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading">By <b>'.$row["nume_expeditor"].'</b> on <i>'.$row["data"].'</i></div>
    <div class="panel-body">'.$row["comentariu"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["id_comentariu"].'">Reply</button></div>
   </div>
   ';
            $output .= get_reply_comment($conexiune, $row["id_comentariu"], $marginleft);
        }
    }
    return $output;
}

?>
    
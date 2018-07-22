<?php
include("db.php");
$error = '';
$comment_name = '';
$comment_content = '';

if(empty($_POST["comment_name"]))
{
    $error .= '<p class="text-danger">Numele este Necesar</p>';
}
else
{
    $comment_name = $_POST["comment_name"];
}

if(empty($_POST["comment_content"]))
{
    $error .= '<p class="text-danger">Comentariul este necesar</p>';
}
else
{
    $comment_content = $_POST["comment_content"];
}

if($error == '')
{
    $comment_id = $_POST["comment_id"];
 
    $id_articol = $_POST["id_articol"];
    
    $data_actuala = new DateTime();
    $data_publicarii = $data_actuala->format('Y-m-d H:i:s');
    
    $query = "INSERT INTO comentarii_utilizatori (id_comentariu_parinte, id_articol, comentariu, nume_expeditor,data)
VALUES ('$comment_id','$id_articol','$comment_content','$comment_name','$data_publicarii')";

    $inserare = mysqli_query($conexiune, $query);


$error = '<label class="text-success">Comment Added</label>';
}
$data = array(
    'error'  => $error
);

echo json_encode($data);
?>

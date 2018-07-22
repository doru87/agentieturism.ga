<?php
session_start();
if (isset($_POST["tip_camera"])){
    $tip_camera = $_POST["tip_camera"];
    $_SESSION["tip_camera"] = $tip_camera;
    echo $tip_camera;
}
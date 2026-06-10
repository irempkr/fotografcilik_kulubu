<?php

session_start();

if(!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}

include("config.php");

$id = $_GET["id"];

$user_id = $_SESSION["user_id"];

$sql = "DELETE FROM events
        WHERE id='$id'
        AND user_id='$user_id'";
        
mysqli_query($conn,$sql);

header("Location:list_events.php");

?>
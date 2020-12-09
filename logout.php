<?php

session_start();
$_SESSION = array();
session_destroy();
if(session_destroy())
    {
    alert("Logged out!");
    }
header("location: login.php");

?>

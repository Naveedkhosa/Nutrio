<?php
session_start();
if(isset($_SESSION['logged_in_user'])){
    session_unset();
    session_destroy();
}

header("Location:index.php");
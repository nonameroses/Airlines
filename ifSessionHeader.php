<?php
session_start();
/*if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE || session_status() !== PHP_SESSION_ACTIVE) {
    include "header.php";
}else{
    include "session_header.php";
}*/
include (isset($_SESSION['email']) ) ? 'session_header.php' : 'header.php';
?>
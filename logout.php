<?php
session_start();
session_destroy();

header('Location: loginForm.php');
exit;


?>

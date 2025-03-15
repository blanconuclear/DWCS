<?php
session_start();    
$_SESSION=[];
session_destroy();  
$_COOKIE=[];

header('Location: login.php');
exit();
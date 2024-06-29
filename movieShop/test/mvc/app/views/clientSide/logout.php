<?php
session_start();
session_unset();
session_destroy(); 
header("Location: /test/mvc/public/home");
?>

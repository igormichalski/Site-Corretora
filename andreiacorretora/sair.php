<?php
session_start();
unset($_SESSION['nome']);
unset($_SESSION['senha']);
header("Location: index.php");
?>
<?php
session_start();
if(!$_SESSION['stu_login']) header("Location: student.php");
?>
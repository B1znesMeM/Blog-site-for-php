<?php
session_start();
include "../php-website/path.php";
include "./app/database/db.php";

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);

header('location: ' . BASE_URL . "log.php");
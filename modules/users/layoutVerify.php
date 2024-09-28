<?php
session_start();
$username = $_SESSION['username'];
if (isset($_COOKIE['username']) or isset(($_SESSION['username']))) {
    echo $username;
}else {
    echo false;
}

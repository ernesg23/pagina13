<?php
session_start();
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo $username;
} else if (isset(($_SESSION['username']))) {
    $username = $_SESSION['username'];
    echo $username;
}else {
    echo false;
}

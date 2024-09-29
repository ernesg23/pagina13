<?php
session_start();
session_unset();
setcookie('username', '', time() - 3600);
setcookie('email', '', time() - 3600);
session_destroy();
echo true;

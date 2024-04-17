<?php

session_start();
session_destroy();
header('Location: http://localhost/ttdf_booking/login.php');

?>
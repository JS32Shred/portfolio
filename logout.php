<?php

session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["first_name"]);
unset($_SESSION["last_name"]);
unset($_SESSION["email"]);
unset($_SESSION["address"]);
unset($_SESSION["city"]);
unset($_SESSION["phone"]);
unset($_SESSION["birth_date"]);
unset($_SESSION["image"]);
header("Location: index.php");
exit;

?>
<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["email"])){    
        $mysqli = require __DIR__ . "/includes/database.php";

        $sql = sprintf("SELECT * FROM users
                        WHERE email = '%s'",
                        $mysqli -> real_escape_string($_POST["email"]));

        $result = $mysqli -> query($sql);

        $user = $result -> fetch_assoc();

        if($user){
            if(password_verify($_POST["password"], $user["password"])){

                $_SESSION["user_id"] = $user["id"];
                $_SESSION["first_name"] = $user["first_name"];
                $_SESSION["last_name"] = $user["last_name"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["address"] = $user["address"];
                $_SESSION["city"] = $user["city"];
                $_SESSION["phone"] = $user["phone"];
                $_SESSION["birth_date"] = $user["birth_date"];
                $_SESSION["image"] = $user["image"];
                session_regenerate_id();
            }
        }

        else{
            $is_invalid = true;
        }
    }
}

?>
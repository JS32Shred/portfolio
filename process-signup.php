<?php

if(empty($_POST["fname"])){
    die("Name is required");
}

if( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

if(! preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter");
}

if(! preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain at least one number");
}

if($_POST["password"] !== $_POST["password_repeat"]){
    die("Passwords dont match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/includes/database.php";

$sql = "INSERT INTO users (first_name, last_name, email, address, city, birth_date, phone, image, password)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli -> stmt_init();

if(! $stmt -> prepare($sql)){
    die("SQL error: " . $mysqli -> error);
}

$year = $_POST["year"];
$month = $_POST["month"];
$day = $_POST["day"];

if(!empty($year) && !empty($month) && !empty($day)){
    $date = $year . "-" . $month . "-" . $day;
}

else{
    $date = NULL;
}

if(!empty($_POST["phone"])){
    $phone = $_POST["phone"];
}

else{
    $phone = NULL;
}

if(!empty($_FILES["image"]["name"])){
    $filename = $_FILES["image"]["name"];
}

$stmt -> bind_param("sssssssss",
                    $_POST["fname"],
                    $_POST["lname"],
                    $_POST["email"],
                    $_POST["address"],
                    $_POST["city"],
                    $date,
                    $phone,
                    $filename,
                    $password_hash);

if($stmt -> execute()){
    if(!empty($_FILES["image"]["name"])){
        $destination = __DIR__ . "/images/user_content/" . $filename;
        move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
    }
    header("Location: index.php");
    session_start();
    $_SESSION["account_created"] = true;
    exit;
}

else{
    if($mysqli -> errno === 1062){
        die("Email already taken");
    }

    else{
        die($mysqli -> error . " " . $mysqli -> errno);
    }
}

?>
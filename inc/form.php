<?php

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];


$errors = [
    "firstNameError" => "",
    "lastNameError" => "",
    "emailError" => "",

];

if (isset($_POST['submit'])) {

    

    if(empty($firstName)){
        $errors["firstNameError"] = "enter first name";
    }
    if(empty($lastName)){
        $errors["lastNameError"] = "enter last name";
    }
    if(empty($email)){
        $errors["emailError"] = "enter email";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors["emailError"] = "enter proper email";
    }

    if(!array_filter($errors)){
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);



        $sql = "INSERT INTO users(firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";

        mysqli_query($conn, $sql);
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
}
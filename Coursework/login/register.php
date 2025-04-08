<?php 
session_start();
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunction.php';

$error = '';

if (isset($_POST['Register'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = 'user';// Default role is 'user' if not provided
    
    
    //Kiếm tra dữ liệu đầu vào
    if (empty($email) || empty($username) || empty($password)) {
        $error = "Please enter your information";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email format";
    } elseif (strlen($password) < 1) {
        $error = "Please enter your password";
    } else {
    //Check account exist
        try {
            $checkUsername = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $checkUsername->bindParam(':username', $username, PDO::PARAM_STR);
            $checkUsername->execute();

    //check email exist
            $checkEmail = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $checkEmail->bindParam(':email', $email, PDO::PARAM_STR);   
            $checkEmail->execute();

            if ($checkUsername->rowCount() > 0) {
                $error = "Username Already Exists !";
            } elseif ($checkEmail->rowCount() > 0) {
                $error = "Email Address Already Exists !";
            } elseif ($password !== $confirm_password) { //check confirm password
                $error = "Password and Confirm Password do not match !";
            } else {
                $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
                // Insert new user
                insertUser($pdo, $username, $email, $password, $role);
                // include '../includes/DatabaseFunction.php';
                header("location: ../user/index.php");
                exit();
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    // ob_start();
    // include 'register.html.php';
    // $output = ob_get_clean();
} 
  
?>
<?php
session_start();
require '../includes/DatabaseConnection.php';

//Nêus đã đăng nhập thì chuyển hướng đến trang chính
if (isset($_SESSION['user_id'])) {
    header("Location: ../user/index.php");
    exit;
}

// $error = '';


// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    //Kiem tra username và mật khẩu trong db
    $stmt = $pdo->prepare("SELECT id, username, email, password, role FROM users WHERE  username = :username LIMIT 1");
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Kiểm tra người dùng tồn tại
        if ($user && password_verify($password, $user['password'])) {
            // Đăng nhập thành công
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            //Clear login error on successful login
            unset($_SESSION['login_error']);

            //Base om role
            if ($user['role'] == 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../user/index.php");
            }
            exit();
        } else {
            $_SESSION['login_error'] = "Username or Password incorrect";
            header("Location: login.html.php");
            exit();

        //     // Chuyển hướng đến trang chính
        //     header("Location: ../user/index.php");
        //     exit;
        // } else {
        //     // $error = "Username or Password incorrect";
        //     echo "Username or Password incorrect";
        // }
        // ob_start();
        // include 'login.html.php';
        // $output = ob_get_clean();
    } 
}
// header("Location: login.html.php");    

?>

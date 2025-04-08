<?php
// if (isset($_POST['postContent'])){
//     try{
//         include 'includes/DatabaseConnection.php';
//         include 'includes/DatabaseFunction.php';
//         include 'includes/uploadfile.php';


//         insertPosts($pdo, $_POST['postContent'], $_POST['user_id'], $_POST['module_id'], $_POST['image']);
//         header('location: post.php');
//     }catch (PDOException $e) {
//         $title = 'An error has occurred';
//         $output = 'Database error: ' . $e->getMessage();
//     }
// }else{
    if (isset($_POST['postContent'])) {
        try {
            include '../includes/DatabaseConnection.php';
            include '../includes/DatabaseFunction.php';

    
            // // Handle file upload
            // $uploadedFile = null;
            // if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            //     $uploadedFile = uploadFile($_FILES['file']); // Assuming uploadFile handles the file upload and returns the file path
            // }
    
            insertPosts($pdo, $_POST['postContent'], $_POST['user_id'], $_POST['module_id'], $_FILES['image']['name']);
            include '../includes/uploadFile.php';
            header('location: post.php');
        } catch (PDOException $e) {
            $title = 'An error has occurred';
            $output = 'Database error: ' . $e->getMessage();
        }
    } else {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunction.php';

    $users = allUsers($pdo);
    $modules = allModules($pdo);
    ob_start();
    include '../templates/addpost.html.php';
    $output = ob_get_clean();
}
include '../templates/layout.html.php';
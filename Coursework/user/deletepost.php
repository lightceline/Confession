<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunction.php';


    // $rows = getPosts($pdo, $_POST['id']);
    // unlink('../uploads/.$rows[image]');
    deletePosts($pdo, $_POST['id']);
    header('location: post.php');
}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete post: '. $e->getMessage();
}
include '../templates/layout.html.php';
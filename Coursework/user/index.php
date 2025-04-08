<?php
// Lấy dữ liệu
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

$posts = allPosts($pdo);
$totalPosts = totalPosts($pdo);

ob_start();
include '../templates/home.html.php';
$output = ob_get_clean();
include '../templates/layout.html.php';
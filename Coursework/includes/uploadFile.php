<?php
$target_dir = '../uploads/';
if (isset($_FILES["post_image"])) {
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
}

// $target_dir = '../uploads/';
// if (isset($_FILES["fileToUpload"])) {
// 	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// 	$uploadOk = 1;
// 	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// } else {
// 	$uploadOk = 0;
// 	echo "Error: No file uploaded or incorrect form field name.";
// }
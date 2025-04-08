<?php
function totalPosts($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM posts');
    $row = $query->fetch();
    return $row[0];
}

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function getPosts($pdo, $id){
    $parameters = [':id' => $id];
    $query= query($pdo, 'SELECT * FROM posts WHERE id = :id', $parameters);
    return $query->fetch();
}

function updatePosts($pdo, $postId, $postContent, $image){
    $query = 'UPDATE posts SET postContent = :postContent, image = :image WHERE id = :id';
    $parameters = [':postContent' => $postContent, ':image' => $image, ':id' => $postId];
    query($pdo, $query, $parameters);
}

function deletePosts($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM posts WHERE id = :id', $parameters);
}

function insertPosts($pdo, $postContent, $user_id, $module_id, $image){
    $query = 'INSERT INTO posts (postContent, created_at, user_id, module_id, image)
    VALUES (:postContent, CURDATE(), :user_id, :module_id, :image)';
    $parameters = [':postContent' => $postContent, ':user_id' => $user_id, ':module_id' => $module_id, ':image' => $image];
    query($pdo, $query, $parameters);
}

function allUsers($pdo){
    $users = query($pdo, 'SELECT * FROM users');
    return $users->fetchAll();
}

function allModules($pdo){
    $modules = query($pdo, 'SELECT * FROM modules');
    return $modules->fetchAll();
}

function allPosts($pdo){
    $posts = query($pdo, 'SELECT posts.id, postContent, image, `username`, email, moduleName FROM posts
    INNER JOIN users ON user_id = users.id
    INNER JOIN modules ON module_id = modules.id');
    return $posts->fetchAll();
}

function insertUser($pdo, $username, $email, $password, $role){
    $query = 'INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)';
    $parameters = [':username' => $username, ':email' => $email, ':password' => $password, ':role' => $role];
    query($pdo, $query, $parameters);
}

function insertComments($pdo, $postId, $commentId, $commentContent){
    $query = 'INSERT INTO comments (post_id, user_id, commentContent) VALUES (:post_id, :user_id, :commentContent)';
    $parameters = [':post_id' => $postId, ':user_id' => $userId, ':commentContent' => $commentContent];
    query($pdo, $query, $parameters);
}

function allComments($pdo){
    $comments = query($pdo, 'SELECT * FROM comments');
    return $comments->fetchAll();
}

function getComment($pdo, $id){
    $parameters = [':id' => $id];
    $query= query($pdo, 'SELECT * FROM comments WHERE id = :id', $parameters);
    return $query->fetch();
}
function updateComment($pdo, $commentId, $commentContent){
    $query = 'UPDATE comments SET commentContent = :commentContent WHERE id = :id';
    $parameters = [':commentContent' => $commentContent, ':id' => $commentId];
    query($pdo, $query, $parameters);
}

function deleteComment($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM comments WHERE id = :id', $parameters);
}

function insertModules($pdo, $moduleName){
    $query = 'INSERT INTO modules (moduleName) VALUES (:moduleName)';
    $parameters = [':moduleName' => $moduleName];
    query($pdo, $query, $parameters);
}

function deleteModule($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM modules WHERE id = :id', $parameters);
}
?>



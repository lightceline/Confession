<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/home.css">
        <title>Light</title>
    </head>
    <body>
        <header>
            <div class="top-bar">
                <nav>
                    <a href="index.php">Light</a>
                    <a href="notification.php">Icon</a>
                    <a href="user.php">User</a>
                    <form action="../login/logout.php" method="post" style="display:inline;">
                        <button type="submit" style="background:none; border:none; color:blue; cursor:pointer;">Log Out</button>
                    </form>
                </nav>
            </div>
        </header>
        <div class ="leftbar">
            <h2>Menu</h2>
                <nav>
                    <a href="addpost.php">New Post</a>
                    <a href="mypost.php">My Post</a>
                </nav>
        </div>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; Light</footer>
    </body>
</html>
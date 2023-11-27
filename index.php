<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username">

        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <a href="signup.php" class="sign" >Don't have an account ?</a>
        <button type="submit">Login</button>
    </form>
</body>
</html>
<?php require_once("db_connect.php"); ?>

<?php
    session_start();
    include "db_connect.php";
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conf_pass = $_POST['conf_password'];
        $email= $_POST['email'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql= "select * from user where username='$username'";
        $result= mysqli_query($conn, $sql);
        $count_user= mysqli_num_rows($result);

        $sql= "select * from user where username='$email'";
        $result= mysqli_query($conn, $sql);
        $count_email= mysqli_num_rows($result);

        if ($count_user==0 && $count_email==0){
            if($password==$conf_pass){
                $sql= "insert into user values('NULL','$username','$email','$hashed_password');";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo "succesfully inserted data";
                }
            }
        }
        else{
            if ($count_user>0){
                echo "Username already exist";
            }
            if ($count_email>0){
                echo "Email already exist";
            }

        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="signup.php" method="post">
        <h2>SignUp</h2>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username">
        <label>Email</label>
        <input type="email" name="email" placeholder="Email">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <label>Re-Enter Password</label>
        <input type="password" name="conf_password" placeholder="Password">
        <a href="index.php" class="sign" >Already have an account ?</a>
        <button type="submit" name="submit">SignUp</button>
    </form>
</body>
</html>
<?php 
session_start();
include "db_connect.php";
    if (isset($_POST['username']) && isset($_POST['password'])) {
        # code 
        function validate($data){
            $data=trim($data);
            $data=stripcslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

        if (empty($username)){
            # code
            header("Location: index.php?error=Username is required");
            exit();
        }
        else if (empty($password)){
            # code
            header("Location: index.php?error=Password is required");
            exit();
        }
        else{
            #echo "valid input";
            $sql= "select * from user where username='$username' and password='$password'";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result)===1){
                $row = mysqli_fetch_assoc($result);
                #print_r($row);
                if ($row['username']===$username && $row['password']===$password){
                    #echo 'Logged in';
                    $_SESSION['username']=$row['username'];
                    $_SESSION['ID']=$row['ID'];
                    header("Location: home.php");
                    exit();
                }
            }
            else {
                header("Location: index.php?error=Incorrect username or password");
                exit();
            }

        }
    }
    else{
        header("Location: index.php");
        exit();
    } 
?>
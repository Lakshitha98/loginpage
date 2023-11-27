<?php

session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['username'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Hello <?php echo $_SESSION['username'] ?></h1>
    <a href="logout.php"><button>LOGOUT</button></a>
</body>
</html>

<?php
}else{
    header("Location: index.php");
}
?>
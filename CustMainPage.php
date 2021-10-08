<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Customer Main page</title>
</head>
<body class="bdy">
    <div class="container">
    <h1><?php echo $_SESSION['name'] ?>'s main page</h1>
    <div class="log">
        <a class="btn btn-danger" href="logout.php" style="margin-bottom:5px;">Logout</a> 
    </div>

    <div class="menu">
        <a class="btn btn-primary" href="displayMenuRest.php" style="margin-bottom:5px;">Menu</a>
    </div>

    <div>   
        <a class="btn btn-info" href="viewOrders.php">View orders</a>
    </div>
    </div>
</body>
</html>
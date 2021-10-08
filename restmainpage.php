<?php
    session_start();
    if(!isset($_SESSION['rname'])){
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Restaurent Main page</title>
</head>
<body class="bdy">
    <div class="container">
    <h1><?php echo $_SESSION['rname'] ?>'s main page</h1>
    <div class="log">
        <a class="btn btn-danger" style="margin-bottom:5px;" href="logout.php">Logout</a> 
    </div>

    <div class="add-menu-item">
        <a style="margin-bottom:5px;" class="btn btn-secondary" href="AddMenuItem.php">Add menu Item</a>
    </div>

    <div class="menu">
        <a class="btn btn-primary" style="margin-bottom:5px;" href="displayMenuRest.php">Menu</a>
    </div>

    <div>   
        <a class="btn btn-info" href="viewOrders.php" style="margin-bottom:5px;">View orders</a>
    </div>
    </div>
</body>
</html>
<?php

    session_start();
    if($_SESSION['status']!="Active")
    {
        header("location:index.php");
    }
    include 'dbcon.php';
    
    if ($_SESSION['iscust']=='true') {
        $cust_name = $_SESSION['name'];
        $view_query = mysqli_query($con,"select * from cart where cname='$cust_name'");
        $qcount = mysqli_num_rows($view_query);
        if ($qcount == 0) {
            ?>
            <script>
                alert("No current orders placed.");
                location.replace("custmainpage.php");
            </script>
            
        <?php 
        }

    }
    else{
        $rest_name = $_SESSION['rname'];
        $view_query = mysqli_query($con,"select * from cart where rname='$rest_name'");
        $qcount = mysqli_num_rows($view_query);
        if ($qcount == 0) {
            ?>
            <script>
                alert("No current order placed by customers, check back later");
                location.replace("restmainpage.php");
            </script>
            
        <?php 
        }
    }
    
    while ($vq=mysqli_fetch_assoc($view_query)) {
        $res[] = $vq;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>view orders</title>
</head>
<body class="bdy">
    <div class="container">
        <h1>Current orders</h1>
    <div>
        <a class="btn btn-danger" style="margin-bottom:5px;" href="logout.php">Logout</a>
        
    </div>
    <div>
            <?php
            if ($_SESSION['iscust'] == "true") {
                echo '<a class="btn btn-primary" href="custmainpage.php" style="margin-bottom:5px;">Return to Main page</a>';
            }
            else {
                echo '<a class="btn btn-primary" href="restmainpage.php" style="margin-bottom:5px;">Return to Main page</a>';
            }
        ?>
        </div>
    <div class="restmenuitems">
    <?php foreach($res as $vq){ ?>
    <?php  
            echo '<div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Food item Order
                    </div>
            <ul class="list-group list-group-flush">';
            if ($_SESSION['iscust']=='true') {
                echo '<li class="list-group-item"><strong>Dish: </strong>' . $vq['dish'] . '</li>';
                echo '<li class="list-group-item"><strong>Restaurent: </strong>' . $vq['rname'] . '</li>';
                echo '<li class="list-group-item"><strong>Quantity: </strong>' . $vq['quantity'] . '</li>';
                echo '<li class="list-group-item"><strong>Price: </strong>' . $vq['price'] . '</li>';
                echo '<li class="list-group-item"><strong>NonVeg/Veg: </strong>' . $vq['preference'] . '</li>';
            }
            else {
                echo '<li class="list-group-item"><strong>Dish: </strong>' . $vq['dish'] . '</li>';
                echo '<li class="list-group-item"><strong>Restaurent: </strong>' . $vq['rname'] . '</li>';
                echo '<li class="list-group-item"><strong>Customer: </strong>' . $vq['cname'] . '</li>';
                echo '<li class="list-group-item"><strong>Quantity: </strong>' . $vq['quantity'] . '</li>';
                echo '<li class="list-group-item"><strong>Price: </strong>' . $vq['price'] . '</li>';
                echo '<li class="list-group-item"><strong>NonVeg/Veg: </strong>' . $vq['preference'] . '</li>';
            }
            echo '</ul>';
            echo '</div>';
    }
        ?>   
    </div>
    </div>
</body>
</html>
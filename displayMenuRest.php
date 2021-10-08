<?php
    session_start();
 
    if($_SESSION['status']!="Active")
    {
        header("location:index.php");
    }
   
    include 'dbcon.php';
      
    if ($_SESSION['iscust'] == "true") {
        $squery= mysqli_query($con,"select * from menuitems");
    }

    else {
        $restname = $_SESSION['rname'];
        $squery= mysqli_query($con,"select * from menuitems where restname='$restname'");
        $qcount = mysqli_num_rows($squery);
        if ($qcount == 0) {
            ?>
            <script>
                alert("No menu items available, please add menu items");
                location.replace("restmainpage.php");
            </script>
            
        <?php 
        }

    }
    while ($sq=mysqli_fetch_assoc($squery)) {
        $res[] = $sq;
    }
    //print_r($res);
    //print_r($res[0]['id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Menu</title>
    
</head>

<body class="bdy">
    <div class="container">
        
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h1>
                                MENU
                            </h1>
                        </center>
                    </div>
                </div>

                <div class="card-body">
                    <nav class="nav">
                       <?php
                    if ($_SESSION['iscust'] == "true") {
                        echo '<a class="btn btn-primary" href="custmainpage.php">Return to Main page</a>';
                    }
                    else {
                        echo '<a class="btn btn-primary" href="restmainpage.php">Return to Main page</a>';
                    }
                    ?>
                      <a class="btn btn-danger" href="logout.php" style="margin-left:5px;">Logout</a>
                      
                    </nav>
                </div>
            </div>
        </div>
        

        

        <div class="row">

            <?php
                foreach($res as $sq){
            ?>
            

           <div class="col-md-4">

                <div class="card" style="margin-bottom: 20px">

                <div class="card-header">
                    Featured
                </div>

                <form method="post" action="order.php">
                    
            <input type="hidden" name="id" value="<?php echo $sq['id']; ?>">
                        <div class="card-body">
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Dish:</strong>
                                <?php echo $sq['name'] ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Restraunt:</strong>
                                <?php echo $sq['restname'] ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Quantity:</strong>
                                <?php echo $sq['quantity'] ?>
                            </li>

                            <li class="list-group-item">
                                <strong>Price:</strong>
                                <?php echo $sq['price'] ?>
                            </li>
                            <li class="list-group-item">
                                <strong>NonVeg/Veg:</strong>
                                <?php echo $sq['preference'] ?>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label>QTY:</label>
                                    <input type="number" name="quantity" class="form-control" required="true" value="1">
                                </div>
                            </li>

                            

                            
                        </ul>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success " style="width: 100%" name="add_cart<?php echo $sq['id']; ?>">
                                    Add to cart
                                </button>
                    </div>

                </form>
                </div>
           </div>
       



       <?php
                        
            }
            
            ?>
            
        </div>
        
    </div>
</body>

</html>
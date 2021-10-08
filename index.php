<?php
    session_start();

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FoodShala</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    
</head>

<body class="bdy">

    <h1 id="app-title">FoodShala</h1>
    <br>
    <h3>Welcome to foodshala ordering system</h3>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>For Restaurants</h2>
                <div id="restaurents">
                    <form action="reslogin.php" method="post">
                        <div class="form-group">
                            <label for="RInputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="RInputEmail"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="RInputPassword">Password</label>
                            <input type="password" name="pwd" class="form-control" id="RInputPassword" required>
                        </div>
                        <p>Don't have an account? <a href="restaurentSignup.php">signup</a> here!</p>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </form>

                </div>
            </div>

            <div class="col-lg-6">
                <h2>For Customers</h2>
                <div id="customers">
                    <form action="cuslogin.php" method="post">
                        <div class="form-group">
                            <label for="CInputEmail">Email address</label>
                            <input type="email" name="cemail" class="form-control" id="CInputEmail" aria-describedby="emailHelp"
                                required>

                        </div>
                        <div class="form-group">
                            <label for="CInputPassword">Password</label>
                            <input type="password" name="cpwd"class="form-control" id="CInputPassword" required>
                        </div>
                        <p>Don't have an account? <a href="customerSignup.php">signup</a> here!</p>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
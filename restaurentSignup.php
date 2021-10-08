<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Restaurant signup</title>
</head>
<body class="bdy">
    <?php
        include 'dbcon.php';
        if(isset($_POST['submit'])){
            $restname = mysqli_real_escape_string($con, $_POST['restname']);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            $confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);

            $pass = password_hash($password,PASSWORD_BCRYPT);
            $cpass = password_hash($confirmpassword,PASSWORD_BCRYPT);

            $emailquery = "select * from rregistration where email = '$email'";
            $query = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query);
            if($emailcount > 0){
                ?>
                <script>
                    alert('Email already exists');
                </script>
                
                <?php
                header('location:index.php');
            } else {
                if ($password === $confirmpassword) {
                    $insertquery = "insert into rregistration (rname,email,rpassword,cpassword) 
                                    values('$restname','$email','$pass','$cpass')";                    
                    $iquery = mysqli_query($con,$insertquery);
                    if($iquery){
                        ?>
                        <script>
                            alert('Registered successfully');
                        </script>
                        <?php
                        header('location:index.php');
                    }
                    else{
                        ?>
                        <script>
                            alert('Registeration failed');
                        </script>
                        
                        <?php
                        header('location:index.php');
                    }
                } else {
                    ?>
                        <script>
                            alert('Password not matching');
                        </script>
                        <?php

                }
            }
        }
    ?>


<div class="container">
            <div class="col-lg-6">
                <h2>Restaurants signup</h2>
                <div id="restaurents">
                    <form action="" method="post">
                    <div class="form-group">
                            <label for="rname">Restaurant Name</label>
                            <input type="text" name="restname" class="form-control" id="rname" required>
                        </div>
                        <div class="form-group">
                            <label for="RInputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="RInputEmail" aria-describedby="emailHelp" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="RInputPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="RInputPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="RInputPasswordC">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control" 
                            id="RInputPasswordC" required>
                        </div>
                        <p>Have an account? <a href="index.php">Login</a> here!</p>
                        <button type="submit" name="submit" class="btn btn-primary">Signup</button>
                    </form>

                </div>
            </div>
</div>
</body>
</html>
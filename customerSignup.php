<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Restaurant signup</title>
</head>

<body class="bdy">

<?php
        include 'dbcon.php';
        if(isset($_POST['submit'])){
            $custname = mysqli_real_escape_string($con, $_POST['custname']);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['pwd']);
            $confirmpassword = mysqli_real_escape_string($con,$_POST['cpwd']);
            $preference = mysqli_real_escape_string($con,$_POST['preference']);


            $pass = password_hash($password,PASSWORD_BCRYPT);
            $cpass = password_hash($confirmpassword,PASSWORD_BCRYPT);

            $emailquery = "select * from cregistration where email = '$email'";
            $query = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query);
            if($emailcount > 0){
                ?>
                <script>
                    alert('Email already exists');
                </script>
                <?php
            } else {
                if ($password === $confirmpassword) {
                    $insertquery = "insert into cregistration (name,email,password,cpassword,preference) 
                                    values('$custname','$email','$pass','$cpass','$preference')";                    
                    $iquery = mysqli_query($con,$insertquery);
                    if($iquery){
                        ?>
                        <script>
                            alert('Registered successfully');
                            location.replace("index.php");
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            alert('Registeration failed');
                        </script>
                        <?php
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
            <h2>Customer signup</h2>
            <div id="customers">
                <form action="" method="post">
                <div class="form-group">
                            <label for="cname">Customer Name</label>
                            <input type="text" name = "custname" class="form-control" id="cname" required>
                        </div>
                    <div class="form-group">
                        <label for="RInputEmail">Email address</label>
                        <input type="email" name="email" class="form-control" id="RInputEmail" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="RInputPassword">Password</label>
                        <input type="password" name = "pwd" class="form-control" id="RInputPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="RInputPasswordC">Confirm Password</label>
                        <input type="password" name="cpwd" class="form-control" id="RInputPasswordC" required>
                    </div>
                    <div class="form-group">
                        <div class="dropdown">
                        <label for="preference">Food Preference</label>
                    <select name="preference">
                        <option value="Vegetarian">Vegetarian</option>
                        <option value="Non-Vegetarian">Non-Vegetarian</option>
                    </select>
                    </div>
                    </div>
                    <p>Have an account? <a href="index.php">Login</a> here!</p>
                    <button type="submit" name="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
    session_start();

        include 'dbcon.php';
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['pwd']);
            
            $pass = password_hash($password,PASSWORD_BCRYPT);

            $emailquery = "select * from rregistration where email = '$email'";
            $query = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query);
            if($emailcount > 0){
                $email_pass = mysqli_fetch_assoc($query);
                $db_pass = $email_pass['rpassword'];
                $_SESSION['rname'] = $email_pass['rname'];
                $pass_decode = password_verify($password,$db_pass);
                if ($pass_decode) {
                    $_SESSION['status']="Active";
                    $_SESSION['iscust']="false";
                   ?>
                   <script>
                       location.replace("restmainpage.php");
                   </script>
                   <?php
                } else {
                    ?>
                    <script>
                        alert("Password is incorrect")
                        location.replace("index.php");
                    </script>
                    <?php
                }

                } else {
                    ?>
                    <script>
                        alert("Email not registered")
                        location.replace("index.php");
                    </script>
                    <?php
                }
        }
    ?>
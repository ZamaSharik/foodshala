<?php
    session_start();

        include 'dbcon.php';
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con,$_POST['cemail']);
            $password = mysqli_real_escape_string($con,$_POST['cpwd']);


            $pass = password_hash($password,PASSWORD_BCRYPT);

            $emailquery = "select * from cregistration where email = '$email'";
            $query = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query);
            if($emailcount > 0){
                $email_pass = mysqli_fetch_assoc($query);
                $db_pass = $email_pass['password'];
                $_SESSION['name'] = $email_pass['name'];
                $pass_decode = password_verify($password,$db_pass);
                if ($pass_decode) {
                    $_SESSION['status']="Active";
                    $_SESSION['iscust']="true";
                   ?>
                   <script>
                       location.replace("CustMainPage.php");
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
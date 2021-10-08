<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "foodshala";

$con = mysqli_connect($server, $user, $password, $db);

if ($con){
    ?>
    <?php
}
else {
    ?>
    <script>
        alert("connection failed");
    </script>
    <?php
}

?>
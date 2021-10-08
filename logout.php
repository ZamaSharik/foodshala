<?php

    session_start();

    session_destroy();

    $status = "none";

      ?>
    <script>
        alert("Successfully Logged out")
        location.replace("index.php");
    </script>
    <?php

?>
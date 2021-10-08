<?php
    session_start();
    if (!isset($_SESSION['rname'])) {
        ?>
            <script>
                location.replace("index.php");
            </script>
        <?php
    }
    include 'dbcon.php';
        if(isset($_POST['submit'])){
            $dname = mysqli_real_escape_string($con,$_POST['dname']);
            $restname = $_SESSION['rname'];
            $dprice = mysqli_real_escape_string($con,$_POST['price']);            
            $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
            $pref = mysqli_real_escape_string($con,$_POST['preference']);
            $itemquery = "select * from menuitems where name = '$dname'";
            $query = mysqli_query($con,$itemquery);
            $itemcount = mysqli_num_rows($query);
            if($itemcount > 0){
                $items = mysqli_fetch_assoc($query);
                $id = $items['id'];
                $price = $items['price'];
                $preference = $items['preference'];
                $updatequery = "update menuitems SET quantity = quantity+'$quantity' where id='$id' AND price='$dprice' AND preference='$pref'";
                $uquery = mysqli_query($con,$updatequery); 
                if($uquery){
                    ?>
                    <script>
                        alert('Menu has been updated successfully');
                        location.replace("AddMenuItem.php");
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert('Item adding failed');
                        location.replace("AddMenuItem.php");
                    </script>
                    <?php
                }
            
            } else {
                $insertquery = "insert into menuitems (name,restname,price,quantity,preference) 
                                    values('$dname','$restname','$dprice','$quantity','$pref')";
                $iquery = mysqli_query($con,$insertquery); 
                if($iquery){
                    ?>
                    <script>
                        alert('Food Item added');
                        location.replace("AddMenuItem.php");
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert('Item addition failed');
                        location.replace("restmainpage.php");
                    </script>
                    <?php
                }
            }
        }
      ?>      
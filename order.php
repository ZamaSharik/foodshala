<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['name'])) {
    
    header("location: index.php");

}else{
 
 $id = $_POST['id'];
 $button = "add_cart".$id;
 $qty = $_POST['quantity'];

  if (isset($button)) {



    $productQuery = mysqli_query($con, "SELECT * FROM menuitems WHERE id='".$id."' ") or die(mysqli_error($con));
    $productRow = mysqli_fetch_assoc($productQuery);
    $rest_name=$productRow['restname'];
    $dish = $productRow['name'];
    $cust_name = $_SESSION['name'];
    $quantity = $productRow['quantity'];
    $amount=$productRow['price'];
    $preference = $productRow['preference'];
    $secondAmount =  $amount*$qty;
    $menu_quantity_query = mysqli_query($con, "SELECT * FROM menuitems WHERE id='".$id."'") or die(mysqli_error($con));
    $menu_quantity = mysqli_fetch_assoc($menu_quantity_query);
    $menu_quantity_value = $menu_quantity['quantity'];

    if($qty>$menu_quantity_value){
        echo '
            <script>
                alert("Insufficient quantity");
                location.replace("displayMenuRest.php");
            </script>
        ';
    }else{

        $cartQuery = mysqli_query($con,"select * from cart where dish = '$dish' AND cname = '$cust_name'");
        $cartCount = mysqli_num_rows($cartQuery);
        $cartRow = mysqli_fetch_assoc($cartQuery);
        
        if ($cartCount>0) {
            $updateQuantity = mysqli_query($con, "update cart SET quantity = quantity+'$qty', price= price+'$secondAmount' where dish='$dish'") or die(mysqli_error($con));

            $updatemenulist = mysqli_query($con, "update menuitems SET quantity = quantity-'$qty' where name='$dish'") or die(mysqli_error($con));

            echo '
                 <script>
                    alert("Added to cart");
                    location.replace("displayMenuRest.php");
                </script>
            ';
        }else{
            $insert = mysqli_query($con, "insert into cart (rname, cname, dish, quantity, price, preference) values('$rest_name','$cust_name','$dish','$qty','$secondAmount','$preference')") or die(mysqli_error($con));
            
            $updatemenulist = mysqli_query($con, "update menuitems SET quantity = quantity-'$qty' where name='$dish'") or die(mysqli_error($con));

            echo '
                 <script>
                    alert("Added to cart");
                    location.replace("displayMenuRest.php");
                </script>
            ';
        }

    }

  } else{

    header("location:displayMenuRest");
  }

}
?>
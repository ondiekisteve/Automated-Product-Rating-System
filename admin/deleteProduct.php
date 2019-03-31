<?php
include "includes/inc.php";
if(isset($_POST['id'])){
    $productId=$_POST['id'];
    $delete="DELETE FROM products where product_id='$productId'";
    if(mysqli_query($connect,$delete)){
        echo "<span class='btn btn-success'>Product deleted successfully</span>";
    }
}
?>
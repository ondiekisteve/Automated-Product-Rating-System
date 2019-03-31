<?php
include "includes/inc.php";
if(isset($_POST['catId'])){
    $subCatId=$_POST['catId'];
    $delete="DELETE FROM categories where cat_id='$subCatId'";
    if(mysqli_query($connect,$delete)){
        echo "<span class='btn btn-success'>Category deleted successfully</span>";
    }
}
?>
<?php
include "includes/inc.php";
if(isset($_POST['id'])){
    $subCatId=$_POST['id'];
    $delete="DELETE FROM subcategories where subcat_id='$subCatId'";
    if(mysqli_query($connect,$delete)){
        echo "<span class='btn btn-success'>Subcategory deleted successfully</span>";
    }
}
?>
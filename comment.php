<?php
include 'includes/inc.php';
$result_array=array();
$proId=$_GET['details'];
$getComments="SELECT * FROM comments where productId='$proId'";
$result=mysqli_query($connect,$getComments);
while ($row=mysqli_fetch_array($result)){
    array_push($result_array,$row);
}
echo json_encode($result_array);
exit();
?>
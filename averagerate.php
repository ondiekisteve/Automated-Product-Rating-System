<?php
include 'includes/inc.php';
$totrate=0;
$proId=$_GET['productId'];
$getRate="select sum(rate)as rate,count(*)as total from comments where productId='$proId'";
$result=mysqli_query($connect,$getRate);
while ($row=mysqli_fetch_array($result)){
    $rate=$row[0];
    $count=$row[1];
    if($count>0) {
        $totrate = ($rate / $count)*2;
    }
}
echo round($totrate,2);
exit();
?>
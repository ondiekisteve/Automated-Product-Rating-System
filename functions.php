<?php

include 'includes/inc.php';
function getIp($connect)
{
	$ip=$_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$IP=$_SERVER['HTTP_CLIENT_IP'];
	}
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $ip;
}
function cart($connect)
{
	if(isset($_GET['add_cart']))
	{
			$ip=getIp($connect);
			$pro_id=$_GET['add_cart'];
			$check_product="SELECT * FROM cart WHERE p_id='$pro_id' AND ip_add='$ip'";
			$result=mysqli_query($connect,$check_product);
			if(mysqli_num_rows($result)>0)
			{
				echo "";
			}
			else
			{
				$insert="INSERT INTO cart(p_id,ip_add)VALUES('$pro_id','$ip')";
				if(mysqli_query($connect,$insert))
				{
					echo "<script>window.open('index.php','_self')</script>";
				}
			}
	}
	
}
function totalItems($connect)
{
	if(isset($_GET['add_cart']))
	{
		$ip=getIp($connect);
		$getitems="SELECT * FROM cart WHERE ip_add='$ip'";
		$result=mysqli_query($connect,$getitems);
		$countitems=mysqli_num_rows($result);
		
	}
	else
	{
		$ip=getIp($connect);
		$getitems="SELECT * FROM cart WHERE ip_add='$ip'";
		$result=mysqli_query($connect,$getitems);
		$countitems=mysqli_num_rows($result);
	}
	echo $countitems;
}
function totalPrice($connect)
{
	$total=0;
	$ip=getIp($connect);
	$selectcat_id="SELECT * FROM cart WHERE ip_add='$ip'";
	$result=mysqli_query($connect,$selectcat_id);
	while($row=mysqli_fetch_array($result))
	{
		$product_id=$row['p_id'];
		$select_price="SELECT * FROM products WHERE product_id='$product_id'";
		$result2=mysqli_query($connect,$select_price);
		while($product_row=mysqli_fetch_array($result2))
		{
			$pro_price=array($product_row['price']);
			$value=array_sum($pro_price);
			$total+=$value;
		}
	}
	echo $total;
}
?>
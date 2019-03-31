<?php
include 'includes/inc.php';
$subcat_id2=$_GET['subcats'];
				$selectcats="SELECT * FROM products WHERE subcat_id='$subcat_id2'";
				$results2=mysqli_query($connect,$selectcats);
				while($row1=mysqli_fetch_array($results2))
				{
				$product_id=$row1['product_id'];
				$product_name=$row1['product_name'];
				$product_price=$row1['price'];
				$product_desc=$row1['product_desc'];
				$product_image=$row1['product_image'];
				
				echo "<div class='img-thumbnail pull-left'style='margin:5px;min-height:200px;margin-right:6px;'><img src='admin/newimages/$product_image'width='190px'height='200px'/>
				<div class='thumbnail-caption'style='text-align:center;font-family:impact;font-size:18px;'>$product_name</div>
				<hr>
				<a href='index.php?details=$product_id'>See Details</a>
				<span style='color:white;background-color:red;padding:5px;margin-right:10px;'class='badge pull-right'>Ksh. $product_price</span>
				<a href='index.php?add_cart=$product_id'class='btn btn-success btn-block'style='margin-top:10px;'>ADD to Cart</a>
				</div>
				";
				}
			?>
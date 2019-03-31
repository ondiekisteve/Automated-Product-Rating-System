<?php
           include 'includes/inc.php';
           if(isset($_GET['cats']))
           {
           	$cat_id3=$_GET['cats'];
			$retrieveproducts="SELECT * FROM products WHERE category_id='$cat_id3' ORDER BY RAND()";
			$productquery=mysqli_query($connect,$retrieveproducts);
			while($productrow=mysqli_fetch_array($productquery))
			{
				$product_id=$productrow['product_id'];
				$product_name=$productrow['product_name'];
				$product_price=$productrow['price'];
				$product_desc=$productrow['product_desc'];
				$product_image=$productrow['product_image'];
				echo "<div class='img-thumbnail pull-left'style='margin:5px;min-height:200px;margin-right:6px;'><img src='admin/newimages/$product_image'width='190px'height='200px'/>
				<div class='thumbnail-caption'style='text-align:center;font-family:impact;font-size:18px;'>$product_name</div>
				<hr>
				<a href='index.php?details=$product_id'>See Details</a>
				<span style='color:white;background-color:red;padding:5px;margin-right:10px;'class='badge pull-right'>Ksh. $product_price</span>
				<a href='index.php?add_cart=$product_id'class='btn btn-success btn-block'style='margin-top:10px;'>ADD to Cart</a>
				</div>
				";
			}
			}
			
			?>
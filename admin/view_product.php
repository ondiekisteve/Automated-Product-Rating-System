 <div class="panel"style="margin-top: 10px;">
         	<div class="panel-heading well well-sm">
         		<h3 style="text-align: center;">View All Products</h3>
         	</div><!--End of panel haeding-->
         	<div class="panel-body">
         		<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Product Description</th>
							<th>product Image</th>
							<th>Product Price</th>
							<th>Edit</th>
							<th>Remove</th>
						</tr>
					</thead>
							<?php
			include'includes/inc.php';
			$retrieveproducts="SELECT * FROM products";
			$productquery=mysqli_query($connect,$retrieveproducts);
			while($productrow=mysqli_fetch_array($productquery))
			{
				$product_id=$productrow['product_id'];
				$product_name=$productrow['product_name'];
				$product_price=$productrow['price'];
				$product_desc=$productrow['product_desc'];
				$product_image=$productrow['product_image'];
							
							?>
					<tbody>
						<tr data-row-id='<?php echo $product_id;  ?>'>
							<td><?php echo $product_id;?></td>
							<td><?php echo $product_name; ?></td>
							<td><?php echo $product_price;  ?></td>
							<td><?php echo $product_desc;  ?></td>
							<td><img src="newimages/<?php echo $product_image; ?>"height="60"width="60"></td>         
							<td><a href="dashboard.php?edit_product=<?php echo $product_id; ?>" class="btn" style="background-color: #00aced"><img src="../img/th.jpg" width="30px"height="30px"></a></td>
                            <td><a type="button" name="delete_btn" data-id="<?php echo $product_id; ?>"class="btn btn-danger btn_delete_product"><span class="glyphicon glyphicon-remove" style='color: white;'></span></a></td>
							<?php } ?>
						</tr>
					</tbody>
				</table>
                <span id="message"></span>
         	</div><!--End of panel body-->
         </div><!--End of panel-->
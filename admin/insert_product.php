<?php
include 'includes/inc.php';

if(isset($_POST['product_name']))
{

	$product_name=$_POST['product_name'];
	$product_cat=$_POST['product_cat'];
	$product_subcat=$_POST['product_subcat'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_image=$_FILES['product_image']['name'];
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
	move_uploaded_file($product_image_tmp,"newimages/$product_image");
	$insert_product="INSERT INTO products(product_name,category_id,subcat_id,price,product_image,product_desc)VALUES('$product_name','$product_cat','$product_subcat','$product_price','$product_image','$product_desc')";
	if(mysqli_query($connect,$insert_product))
	{
		echo "<span class='btn btn-success'>product successfully inserted</span>";
		exit();
	}
	else
	{
		echo "Error occured in submiting";
		exit();
	}
	
}

if(isset($_GET['product_cat'])){
    $product_cat=$_GET['product_cat'];
    $result_array=array();
    $getsubCategories="SELECT * FROM subcategories WHERE cat_id='$product_cat'";
    $result=mysqli_query($connect,$getsubCategories);
    while ($row=mysqli_fetch_array($result)){
        array_push($result_array,$row);
    }
    echo json_encode($result_array);
    exit();
}
?>
  			<div class="panel">
  				<div class="panel-heading well well-sm">
  					<h3 style="text-align: center;">INSERT YOUR PRODUCT</h3>
  				</div><!--End of panel heading-->
  				<div class="panel-body">
  					<form method="POST"class="form-horizontal"role="form"enctype="multipart/form-data" id="product_form">
  				<div class="form-group">
  					<label for="product_name"class="control-label col-sm-3" >Product Name</label>
  					<div class="col-sm-9">
  						<input type="text"name="product_name"placeholder="Enter Name"class="form-control" id="product_name"/>
  					</div>
  				</div><!--end of form-group-->
  				<div class="form-group">
  					<label for="product_cat"class="control-label col-sm-3" >Product category</label>
  					<div class="col-sm-9">
  						<select name="product_cat"class="form-control" id="product_cat">
  						<?php
  			$select_cats="SELECT * FROM categories";
			$results=mysqli_query($connect,$select_cats);
			while($row=mysqli_fetch_array($results))
			{
				$cat_id=$row['cat_id'];
				$cat_name=$row['cat_name'];
				echo"<option value='$cat_id'>$cat_name</option>
				";
				
			}?>
  						</select>
  					</div>
  				</div><!--end of form-group-->
  				<div class="form-group">
  					<label for="product_subcat"class="control-label col-sm-3" >Product Subcategory</label>
  					<div class="col-sm-9">
  						<select name="product_subcat"class="form-control" id="product_subcat">
<!--  						--><?php
//  							$select_subcats="SELECT * FROM subcategories";
//					$subcatresult=mysqli_query($connect,$select_subcats);
//					while($rowsubcats=mysqli_fetch_array($subcatresult))
//					{
//						$subcat_id=$rowsubcats['subcat_id'];
//						echo "<option value='$subcat_id'>$rowsubcats[subcat_title]</option>";
//					}?>
  						</select>
  					</div>
  				</div><!--end of form-group-->
  				<div class="form-group">
  					<label for="product_price"class="control-label col-sm-3" >Product Price</label>
  					<div class="col-sm-9">
  						<input type="text"name="product_price"placeholder="Enter product price"class="form-control"id="product_price"/>
  					</div>
  				</div><!--end of form-group-->
  				<div class="form-group">
  					<label for="product_image"class="control-label col-sm-3" >Product Image</label>
  					<div class="col-sm-9">
  						<input type="file"name="product_image"placeholder="Enter product Image"class="form-control"id="product_image"/>
  					</div>
  				</div><!--end of form-group-->
  				
  				<div class="form-group">
  					<label for="product_Description"class="control-label col-sm-3" >Product Description</label>
  					<div class="col-sm-9">
  						<textarea cols="20"rows="10"class="form-control"name="product_desc" id="product_desc">
  							
  						</textarea>
  					</div>
  				</div><!--end of form-group-->
                        <button type="submit" name="insert_product"class="btn btn-success pull-left" id="insert_product">INSERT</button>
  						<input type="reset"class="btn btn-danger btn-lg pull-right"value="Cancel"/>
  			</form>
                    <span id="message"></span>
                    <span id="error"></span>
  				</div><!--end of panel body-->
  			</div><!--End of panel-->
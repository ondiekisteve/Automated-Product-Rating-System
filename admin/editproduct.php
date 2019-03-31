<?php
include 'includes/inc.php';

if(isset($_POST['product_id']))
{
    $productId=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_cat=$_POST['product_cat'];
    $product_subcat=$_POST['product_subcat'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_image=$_FILES['product_image']['name'];
    $product_image_tmp=$_FILES['product_image']['tmp_name'];
    if($product_image==''){
        $getImage="SELECT product_image FROM products where product_id='$productId'";
        $result=mysqli_query($connect,$getImage);
        while ($row=mysqli_fetch_array($result)){
            $product_image=$row['product_image'];
        }
    }
    move_uploaded_file($product_image_tmp,"newimages/$product_image");
    $update_product="UPDATE products SET product_name='$product_name',category_id='$product_cat',subcat_id='$product_subcat',price='$product_price',product_image='$product_image',product_desc='$product_desc' WHERE product_id='$productId'";
    if(mysqli_query($connect,$update_product))
    {
        echo "<span class='btn btn-success'>product successfully Updated</span>";
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
        <?php
        if(isset($_GET['edit_product'])){
            $editId=$_GET['edit_product'];
            $getproducts="SELECT * FROM products where product_id='$editId'";
            $query=mysqli_query($connect,$getproducts);
            while($row=mysqli_fetch_array($query)) {
                $category_id = $row['category_id'];
                $subcategory_id = $row['subcat_id'];
                $product_id = $row['product_id'];
                $name = $row['product_name'];
                $price = $row['price'];
                $desc = $row['product_desc'];
                $image = $row['product_image'];
                ?>
        <form method="POST"class="form-horizontal"role="form"enctype="multipart/form-data" id="product_form">
            <div class="form-group">
                <label for="product_name"class="control-label col-sm-3" >Product Name</label>
                <div class="col-sm-9">
                    <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id; ?>">
                    <input type="text"name="product_name"placeholder="Enter Name"class="form-control" id="product_name" value="<?php echo $name ?>"/>
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
                            ?>
                            <option value='<?php echo $cat_id ?>' <?php if($category_id==$cat_id){echo 'selected="selected"'; } ?>><?php echo $cat_name ?></option>
                        <?php  }?>
                    </select>
                </div>
            </div><!--end of form-group-->
            <div class="form-group">
                <label for="product_subcat"class="control-label col-sm-3" >Product Subcategory</label>
                <div class="col-sm-9">
                    <select name="product_subcat"class="form-control" id="product_subcat">
                          						<?php
                          							$select_subcats="SELECT * FROM subcategories";
                        					$subcatresult=mysqli_query($connect,$select_subcats);
                        					while($rowsubcats=mysqli_fetch_array($subcatresult))
                        					{
                        						$subcat_id=$rowsubcats['subcat_id'];
                        					?>
                        <option value='<?php  echo $subcat_id; ?>' <?php if($subcategory_id==$subcat_id){echo 'selected="selected"'; } ?> ><?php echo $rowsubcats['subcat_title']; ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div><!--end of form-group-->
            <div class="form-group">
                <label for="product_price"class="control-label col-sm-3" >Product Price</label>
                <div class="col-sm-9">
                    <input type="text"name="product_price"placeholder="Enter product price"class="form-control"id="product_price" value="<?php echo $price; ?>"/>
                </div>
            </div><!--end of form-group-->
            <div class="form-group">
                <label for="product_image"class="control-label col-sm-3" >Product Image</label>
                <div class="col-sm-9">
                    <input type="file"name="product_image"placeholder="Enter product Image"class="form-control"id="product_image" value="<?php echo $image; ?>"/>
                </div>
            </div><!--end of form-group-->

            <div class="form-group">
                <label for="product_Description"class="control-label col-sm-3" >Product Description</label>
                <div class="col-sm-9">
  						<textarea cols="20"rows="10"class="form-control"name="product_desc" id="product_desc">
                            <?php echo $desc; ?>
  						</textarea>
                </div>
            </div><!--end of form-group-->
            <button type="submit" name="update_product"class="btn btn-success pull-left" id="update_product">UPDATE</button>
            <input type="reset"class="btn btn-danger btn-lg pull-right"value="Cancel"/>
        </form>
        <?php  } } ?>
        <span id="message"></span>
    </div><!--end of panel body-->
</div><!--End of panel-->
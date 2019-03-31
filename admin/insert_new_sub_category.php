<?php
include 'includes/inc.php';
if(isset($_POST['subcat_name']))
{
	$subcat_name=$_POST['subcat_name'];
    $catId=$_POST['catId'];
	$insert_subcategory="INSERT INTO subcategories(subcat_title,cat_id)VALUES('$subcat_name','$catId')";
	if(mysqli_query($connect,$insert_subcategory))
	{
        echo "<div class='btn btn-success'>Sub Category Successfully inserted</div>";
        exit();
	}
	else
	{
		echo "Error occured in inserting Sub Category";
		exit();
	}
}

?>
<!DOCTYPE HTML">
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="../css/bootstrap.min.css"/>
<link type="text/css"rel="stylesheet"href="styles.css"/>
</head>
<body>
    <div class="panel panel-default"style="margin-top: 10px;">
    	<div class="panel-heading">
    		<h3 style="text-align: center;">Insert New Sub Category</h3>
    	</div><!--End of panel heading-->
    	<div class="panel-body">
    		<form method="POST" class="form-inline" id="subcategoryForm">
    			<div class="form-group">
    				<label class="control-label">Sub Category Name</label>
    				<div style="text-align: center;">
    					<input type="text"name="subcat_name"class="form-control"size="50" id="subcat_name"/>
    					 <select class="form-control" name=""catId" id="catId">
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
    					 <button type="submit" name="addsubcat"class="btn btn-success" id="addsubcat">ADD</button>
                         <span id="message"></span>
    				</div>

    			</div><!--End of form group-->
    		</form>
    	</div><!--End of panel body-->
    </div><!--End of panel-->
</body>
</html>
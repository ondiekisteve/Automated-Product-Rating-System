<?php
include 'includes/inc.php';
if(isset($_POST['category']))
{
	$cat_name=$_POST['category'];
	$insert_category="INSERT INTO categories(cat_name)VALUES('$cat_name')";
	if(mysqli_query($connect,$insert_category))
	{
		echo "<div class='btn btn-success'>Category Successfully inserted</div>";
		exit();
	}
	else
	{
		echo "Error occured in inserting Category";
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
    		<h3 style="text-align: center;">Insert New Category</h3>
    	</div><!--End of panel heading-->
    	<div class="panel-body">
    		<form method="POST"class="form-inline" id="categoryForm">
    			<div class="form-group">
    				<label class="control-label">Category Name</label>
    				<div style="text-align: center;">
    					<input type="text"name="category"class="form-control"size="50"id="category"/>
    					<button type="submit" name="add"class="btn btn-success" id="insertCart">ADD</button>
                        <span id="message"></span>
    				</div>

    			</div><!--End of form group-->
    		</form>
    	</div><!--End of panel body-->
    </div><!--End of panel-->
</body>
</html>
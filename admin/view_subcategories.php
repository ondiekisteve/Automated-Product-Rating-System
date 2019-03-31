<?php
include 'includes/inc.php';

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
    		<h3 style="text-align: center;">All Sub-Categories</h3>
    	</div><!--End of panel heading-->
    	<div class="panel-body">
    		<table class="table table-bordered">
    			<thead>
    			<tr>
    				<th>Category Id</th>
    				<th>Category Title</th>
    				<th>Remove</th>
    			</tr>
    			</thead>
    			<tbody>
    				     <?php
    				     $select_subcategories="SELECT * FROM subcategories";
    				     $select_result2=mysqli_query($connect,$select_subcategories);
    				     while($category_row2=mysqli_fetch_array($select_result2))
    				     {
						 	$subcat_id2=$category_row2['subcat_id'];
						 	$subcat_title2=$category_row2['subcat_title'];
    				     	  echo "<tr data-row-id='$subcat_id2'>
    				     	  	<td>$subcat_id2</td>
    				     	  	<td>$subcat_title2</td>
    				     	  	<td><a type=\"button\" name=\"delete_btn\" data-id3='$subcat_id2'class=\"btn btn-danger btn_delete\"><span class='glyphicon glyphicon-trash' style='color: white;'></span></a></td>
    				     	  </tr>";
    				    }  
    				     ?>
    	        </tbody>
    	        </table>
<span id="message"></span>
    	</div><!--End of panel body-->
    </div><!--End of panel-->
</body>
</html>
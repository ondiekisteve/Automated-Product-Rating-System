<?php
session_start();
include 'includes/inc.php';
$userId='';
$product_id='';
			if(isset($_GET['details']))
			{
                if(isset($_SESSION['userId'])){
                    $userId=$_SESSION['userId'];

                }
			$details=$_GET['details'];
			$retrieveproducts="SELECT * FROM products WHERE product_id='$details'";
			$productquery=mysqli_query($connect,$retrieveproducts);
			while($productrow=mysqli_fetch_array($productquery))
			{
				$product_id=$productrow['product_id'];
				$product_name=$productrow['product_name'];
				$product_price=$productrow['price'];
				$product_desc=$productrow['product_desc'];
				$product_image=$productrow['product_image'];
				echo "
				<h3 class='caption'style='text-align:center;'>$product_name</h3>
				<div class='img-thumbnail'><center><img src='admin/newimages/$product_image'/width='500px'height='400px'></center>
				<span style='color:white;background-color:red;padding:5px;margin-right:10px;'class='badge pull-right'>Ksh. $product_price</span>
				$product_desc<br/> Average Rating <span class='badge' id='average' style='padding: 10px;color: yellow;background-color: black'></span>
				<a href='index.php?add_cart=$product_id'class='btn btn-success'style='margin-top:10px;'>ADD to Cart</a>
			
				</div>
				";
			}
			}
if(isset($_POST['message'])) {
    $userId = $_POST['userId'];
    $productId = $_POST['productId'];
    $message = $_POST['message'];
    $inputrate=$_POST['inputrate'];
    $insertComment = "INSERT INTO comments(userId,productId,message,rate)VALUES ('$userId','$productId','$message','$inputrate')";
    if (mysqli_query($connect, $insertComment)) {
        $result_array=array();
        $getComments="SELECT * FROM comments where productId='$productId'";
        $result=mysqli_query($connect,$getComments);
        while ($row=mysqli_fetch_array($result)){
            array_push($result_array,$row);
        }
        echo json_encode($result_array);
        exit();
    } else {
        echo "Error";
        exit();
    }
}
			
			?>
<div class="well well-sm">
    <h3 style="text-align: center;">Comments</h3>
    <div id="comments">

    </div>
</div>
<div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-6">
        <form id="comment-form" method="post">
            <input type="hidden" name="productId" value="<?php echo $product_id; ?>" id="productId">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>" id="userId">
            <input type="hidden" name="rate" id="inputrate">
            <div class="form-group">
                <textarea class="form-control message" rows="7" name="message" id="message">

                </textarea>
            </div>
<!--            <div class="form-group">-->
<!--                <input type="text" class="form-control"id="rate">-->
<!--            </div>-->
            <div class="form-group">
                <button class="btn btn-primary pull-right" id="publish" type="button">Publish</button>
            </div>
            <div class="form-group" id="msg"></div>

        </form>
        <span>Rate : </span><span id="rate" class="badge" style="padding: 10px;background-color: black;color: yellow;"></span>
    </div>
</div>

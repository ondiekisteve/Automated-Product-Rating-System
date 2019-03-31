<?php
			$retrieveproducts="SELECT * FROM products ORDER BY RAND()";
			$productquery=mysqli_query($connect,$retrieveproducts);
			while($productrow=mysqli_fetch_array($productquery)) {
                $product_id = $productrow['product_id'];
                $product_name = $productrow['product_name'];
                $product_price = $productrow['price'];
                $product_desc = $productrow['product_desc'];
                $product_image = $productrow['product_image'];
                echo "<div class='img-thumbnail pull-left'style='margin:5px;min-height:200px;margin-right:6px;'><img src='admin/newimages/$product_image'width='190px'height='190px'/>
				<div class='thumbnail-caption'style='text-align:center;font-family:impact;font-size:18px;'>$product_name</div>
				<hr>";
                ?>
                <?php
                if (isset($_SESSION['userId'])) {
                    ?>
                    <a href='index.php?details=<?php echo $product_id ?>'>See Details</a>
                <?php } else {
                    ?>
                    <a href='index.php?login'>See Details</a>
                <?php } ?>
                <span style='color:white;background-color:red;padding:5px;margin-right:10px;' class='badge pull-right'>Ksh.<?php echo $product_price; ?></span>
                <?php if (isset($_SESSION['userId'])) {

                    ?>
                    <a href='index.php?add_cart=<?php echo $product_id; ?>' class='btn btn-success btn-block' style='margin-top:10px;'>ADD
                        to Cart</a>
                <?php } else { ?>
                    <a href='index.php?login' class='btn btn-success btn-block' style='margin-top:10px;'>ADD
                        to Cart</a>
                <?php } ?>
                </div>


                <?php
            }
                ?>
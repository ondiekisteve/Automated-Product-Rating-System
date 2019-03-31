<?php
session_start();
error_reporting(0);
include('includes/inc.php');
include ('functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Tourism Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="styles.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrapValidator.min.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>

<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<!--<script src="js/jquery-1.12.0.min.js"></script>-->
<!--<script src="js/bootstrap.min.js"></script>-->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?>

<!--- rupes ---->
<div class="container-fluid">
    <hr/>
    <div class="row">
        <div class="col-sm-3">
            <div class="panel"id="sidebar"style="margin-top: -30px;border: 0px;">
                <div class="title">
                    <h2 style="text-decoration: underline;margin: -3px;">Categories</h2>
                </div>
                <?php
                $select_cats="SELECT * FROM categories";
                $results=mysqli_query($connect,$select_cats);
                while($row=mysqli_fetch_array($results))
                {
                    $cat_id=$row['cat_id'];
                    $cat_name=$row['cat_name'];
                    echo"<li><a href='index.php?cats=$cat_id'>$cat_name</a><li><hr/>
				";
                    $select_subcats="SELECT * FROM subcategories where cat_id='$cat_id'";
                    $results2=mysqli_query($connect,$select_subcats);
                    while($row2=mysqli_fetch_array($results2))
                    {
                        $subcat_id=$row2['subcat_id'];
                        $subcat_name=$row2['subcat_title'];
                        echo"<li><a href='index.php?subcats=$subcat_id'>$subcat_name</a><li>
				";

                    }

                }
                ?>
            </div><!--End of panel-->
        </div>
        <div class="col-sm-9">
            <?php
            cart($connect);
            ?>
            <div id="cart">
                <h3>Welcome Guest! <span style="color: yellow;font-size: 20px;">Shopping Cart</span>-Total Items:<?php totalItems($connect); ?> Total Price:Ksh.<?php totalPrice($connect);  ?> <a href="cart.php">Go To Cart</a></h3>
            </div>
            <?php
            if(isset($_GET['subcats']))
            {
                include 'subcats.php';
            }
            if(isset($_GET['signup']))
            {
                include 'signup.php';
            }
            if(isset($_GET['login']))
            {
                include 'login.php';
            }
            if(isset($_GET['details']))
            {
                include 'details.php';
            }
            if(isset($_GET['all_products']))
            {
                include 'product.php';
            }
            if(isset($_GET['cats']))
            {
                include 'categorized_products.php';
            }
            if(isset($_GET['aboutus']))
            {
                include 'aboutus.php';
            }
            if(isset($_GET['contactus']))
            {
                include 'contactus.php';
            }
            if(!isset($_GET['cats']) && !isset($_GET['all_products']) && !isset($_GET['subcats']) && !isset($_GET['details']) && !isset($_GET['signup']) && !isset($_GET['login']) && !isset($_GET['aboutus']) && !isset($_GET['contactus']))
            {
                include 'product.php';
            }
            ?>
        </div>
    </div>


<!--- routes ---->
<div class="routes">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-comments" style="font-size: 50px;"></i></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
                    <?php
                    $sq15 = "SELECT * from comments";
                    $result6=mysqli_query($connect,$sq15);
                    $count=mysqli_num_rows($result6);
                    ?>
                    <h3><?php echo htmlentities($count);?></h3>
				<p>Comments</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left">
			<div class="rou-left">
				<a href="#"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt">
                <?php
                $sq9 = "SELECT * from members";
                $result0=mysqli_query($connect,$sq9);
                $count=mysqli_num_rows($result0);
                ?>
                <h3><?php echo htmlentities($count);?></h3>
				<p>Regestered users</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-ticket"></i></a>
			</div>
			<div class="rou-rgt">
                <?php
                $sql3 = "SELECT * from products";
                $result3=mysqli_query($connect,$sql3);
                $count=mysqli_num_rows($result3);
                ?>
                <h3><?php echo htmlentities($count);?></h3>
				<p>Products</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<?php include('includes/footer.php');?>
<!-- //write us -->
<script type="text/javascript"src="jquery-1.11.1.min.js"></script>
<script type="text/javascript"src="js/bootstrap.min.js"></script>
<script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.min.js"></script>
<script type="text/javascript"src="p5.dom.js"></script>
<script type="text/javascript"src="script.js"></script>
<script type="text/javascript"src="sentiment.js"></script>
<script type="text/javascript"src="js/bootstrapValidator.min.js"></script>
<script type="text/javascript"src="fontawesome/js/fontawesome.min.js"></script>
</body>
</html>
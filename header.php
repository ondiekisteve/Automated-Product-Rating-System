<!DOCTYPE HTML>
<html>
<head>
<title>Moi University Online Market Platform</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="css/bootstrap.min.css"/>
<!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />-->
<link href="fontawesome/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
<link type="text/css"rel="stylesheet"href="styles.css"/>
</head>
<body>
<div class="container">
	<div class="jumbotron"style="background-color: green;">
	<h1 style="text-align: center;margin: -40px;line-height: 60px;color: white;text-shadow: 5px 5px red;">Moi University Online Market Platform</h1>
</div><!--end of jumbtron-->
<div class="navbar"style="margin-top: -25px;background-color: grey;">
	<ul class="nav navbar-nav">
		<li><a href="#">HOME</a></li>
		<li><a href="index.php?all_products">ALL PRODUCTS</a></li>
		<li><a href="#">MY ACCOUNT</a></li>
		<li><a href="#">SIGNUP</a></li>
		<li><a href="#">SHOPPING CART</a></li>
		<li><a href="#">CONTACT US</a></li>
	</ul><!--End of nav-->
	<form class="navbar-form pull-right"role="form"method="GET"action="<?php $_SERVER['PHP_SELF'];   ?>">
	 <input type="text"name="search"class="form-control"placeholder="Search here..."/>
	 <button type="button" class="btn btn-success"id="search-icon"><span class="glyphicon glyphicon-search"></span></button>
		
	</form>
</div><!--End of navbar-->
</div><!--End of container-->

</body>
</html>
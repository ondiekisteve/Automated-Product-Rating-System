<?php include 'includes/inc.php'; ?>
<div class="four-grids">
    <div class="col-md-3 four-grid">
        <div class="four-agileits">
            <div class="icon">
                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>User</h3>

                <?php
                $sq9 = "SELECT * from members";
                $result0=mysqli_query($connect,$sq9);
                $count=mysqli_num_rows($result0);
                ?>
                <h4><?php echo htmlentities($count);?></h4>


            </div>

        </div>
    </div>
    <div class="col-md-3 four-grid">
        <div class="four-agileinfo">
            <div class="icon">
                <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Categories</h3>
                <?php
                $sql1 = "SELECT * from categories";
                $result=mysqli_query($connect,$sql1);
                $count=mysqli_num_rows($result);
                ?>
                <h4><?php echo htmlentities($count);?></h4>

            </div>

        </div>
    </div>
    <div class="col-md-3 four-grid">
        <div class="four-w3ls">
            <div class="icon">
                <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Sub_Cutegories</h3>
                <?php
                $sql2 = "SELECT * from subcategories";
                $result2=mysqli_query($connect,$sql2);
                $count=mysqli_num_rows($result2);
                ?>
                <h4><?php echo htmlentities($count);?></h4>

            </div>

        </div>
    </div>
    <div class="col-md-3 four-grid">
        <div class="four-wthree">
            <div class="icon">
                <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Products</h3>
                <?php
                $sql3 = "SELECT * from products";
                $result3=mysqli_query($connect,$sql3);
                $count=mysqli_num_rows($result3);
                ?>
                <h4><?php echo htmlentities($count);?></h4>

            </div>

        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="four-grids">
    <div class="col-md-3 four-grid">
        <div class="four-w3ls">
            <div class="icon">
                <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Comments</h3>
                <?php
                $sq15 = "SELECT * from comments";
                $result6=mysqli_query($connect,$sq15);
                $count=mysqli_num_rows($result6);
                ?>
                <h4><?php echo htmlentities($count);?></h4>

            </div>

        </div>
    </div>


    <div class="clearfix"></div>
</div>
<!--//four-grids here-->


<div class="inner-block">

</div>
<!--inner block end here-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/fullstock.css" type="text/css" media="all">
    <link rel="icon" href="images/Logoshop.ico" type="image/x-icon" />
    <title>Full Stock</title>
</head>

<body>
    <div class="header">
        <div class="header_top">
            <div class="logo">
                <a href="index.php"><img src="images/Logoshop.png" width="210px" /></a>
            </div>
            <div class="cart">
 
                        <div class="Menu_user js-user-click">
                            <i class="Nextto1 fas fa-bars"></i>
                        </div>
                    </div>
                </p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php 
            require "connectmysql.php";
            $search = "";
            $sql="select * from";
            if(isset($_GET['Search'])){
                $search = $_GET['Search'];
            
            
                $Sql="select * from products where Name like '%$search%'";
                $ProductList = mysqli_query($Access,$Sql);?>         
                <?php foreach ($ProductList as $Products) {?>
                <div class="grid_1_of_4 images_1_of_4 stock">
                    <span class="hover"><a href="preview.html"><img src="<?php echo $Products['photo']?>" alt="" height="260px" width="260px"></a></span>
                    <h2><?php echo $Products['Name'] ?> </h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees">$<?php echo $Products['Price']?></span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="preview.html">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            <?php }
            } ?>
            <?php if(isset($_GET['Id'])) {
                $ID = $_GET['Id'];
                $Sql="select * from products where CategoryID = '$ID'";
                $ProductList = mysqli_query($Access,$Sql);
                ?>
                <?php foreach ($ProductList as $Products) {?>
                <div class="grid_1_of_4 images_1_of_4 stock">
                <span class="hover"><a href="preview.html"><img src="<?php echo $Products['photo']?>" alt="" height="280px" width="280px"></a></span>
                <h2><?php echo $Products['Name'] ?> </h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">$<?php echo $Products['Price']?></span></p>
                    </div>
                    <div class="add-cart">
                        <h4><a href="preview.html">Add to Cart</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>
                </div>
            <?php } } ?>
            <?php if(!isset($_GET['Search']) && !isset($_GET['Id'])) {
                $Sql = "select * from products";
                $ProductList = mysqli_query($Access,$Sql);
                ?>
                <?php foreach ($ProductList as $Products) {?>
                <div class="grid_1_of_4 images_1_of_4 stock">
                <span class="hover"><a href="preview.html"><img src="<?php echo $Products['photo']?>" alt="" height="260px" width="260px"></a></span>
                <h2><?php echo $Products['Name'] ?> </h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">$<?php echo $Products['Price']?></span></p>
                    </div>
                    <div class="add-cart">
                        <h4><a href="preview.html">Add to Cart</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>
                </div>

            <?php }} ?>
            <?php
            mysqli_close($Access);
            ?>
</body>

</html>
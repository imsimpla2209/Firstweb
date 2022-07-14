<div class="Top-main" style="display:flex; margin-top: 40px;">
    <div class="Categories" style="border-radius:3px; border:3.25px solid #ccc; padding:0 0; margin-right:1.7%; margin-left:0px; background-color:#7E685A; height:300px; width:18%;">
        <li class="news_nav" style="color: #fff; font-weight: 900; list-style:none;">
            <div class="xxx" style="background-color: #7E685A;font-size:20px; padding: 5px; text-align:center; display:flex; justify-content:space-evenly; align-items:center;">
                <span style=" border-radius:100px; background:#E7717D; padding:7px 10px; ">
                    <i class="fas fa-stream" style="font-size:22px;"></i>
                </span>
                <h3 style="color: #fff;">Categories</h3>
            </div>
            <ul class="news_menu" style="line-height:35px; list-style:none; color:#fff; text-align:center; padding-top:0px;">
                <?php
                $sql = "select * from category";
                $Categories = mysqli_query($Access, $sql);
                foreach ($Categories as $genres) {
                ?>
                    <li class="category" style="padding: 3.18px 0; border-bottom:1px solid rgba(204, 204, 204, 0.44); border-top:0.5px solid rgba(204, 204, 204, 0.44);">
                    <a style="text-decoration:none; color:aliceblue; line-height:40px; padding: 10px;" href="index.php?Id=<?php echo $genres['CatId'] ?>" ><?php echo $genres['CatName'] ?></a>
                    </li>
                    
                <?php } ?>
            </ul>
        </li>
    </div>
    <div id="demo" class="carousel slide" data-ride="carousel" style="width:80% !important; height:300px !important; z-index:1; border-radius:3px;border:2px solid #ccc;">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slider01.png" alt="Birthday Decoration" width="1000px" height="300px" >
                <div class="carousel-caption">
                    <h3 style="font-size:26px;">Birthday Decoration</h3>
                    <p>We had such a great time on birthdays!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/Slider2.png" alt="Restaurant Decoration" width="1000px" height="300px">
                <div class="carousel-caption">
                    <h3 style="font-size:26px;">Shop Decoration</h3>
                    <p>Nice view, nice meal</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/Slider3.jpg" alt="Noel Decoration" width="1000px" height="300px">
                <div class="carousel-caption">
                    <h3 style="font-size:26px;">Noel Decoration</h3>
                    <p>We love this day!</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<div class="main">
    <div class="content">
        <!-- Begin New Product -->
        <div class="content_top" style="height:60px">
            <div class="heading">
                <h3 style="font-size:24px;">Popular Products</h3>
            </div>
            <div class="see">
                <p><a href="Fullstock.php">See all Products</a><i class="Nextto fa fa-caret-right" aria-hidden="false"></i>
                </p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            require "connectmysql.php";
            $search = "";
            $sql = "select * from";
            if (isset($_GET['Search'])) {
                $Search = $_GET['Search'];
                $RealSearch = $Access->real_escape_string($Search);
                $searchSQL = "select * FROM Products WHERE `Name` LIKE '%{$RealSearch}%'";
                $searchResult = mysqli_query($Access, $searchSQL);
                if (mysqli_num_rows($searchResult) <= 0) {
                    echo "No results"; ?>
                    <h1 style="line-height:80px; float:left">Nothing Match🥱🥱😏😏</h1>

                <?php } else {
                    // $Sql="select * from products where Name like '%$search%'";
                    // $ProductList = mysqli_query($Access,$Sql);
                ?>
                    <?php foreach ($searchResult as $Products) { ?>
                        <div class="grid_1_of_4 images_1_of_4 stock" style="width:28% !important">
                            <span class="hover"><a href="Details.php?Pid=<?php echo $Products['Productid'] ?>"><img src="<?php echo $Products['photo'] ?>" alt="" style="width:70% !important; height:70% !important"></a></span>
                            <h2 style="font-size:25px;"><?php echo $Products['Name'] ?> </h2>
                            <div class="price-details">
                                <div class="price-number">
                                    <p><span class="rupees">$<?php echo $Products['Price'] ?></span></p>
                                </div>
                                <div class="add-cart" style="border-radius:7px; cursor:pointer">
                                    <h4><a href="Process_In_cart.php?id=<?php echo $Products['Productid']?>" style="font-size:20px; ">Add to Cart</a></h4>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
            <?php }
                }
            } ?>
            <?php if (isset($_GET['Id'])) {
                $ID = $_GET['Id'];
                $Sql = "select * from products where CategoryID = '$ID'";
                $ProductList = mysqli_query($Access, $Sql);
            ?>
                <?php foreach ($ProductList as $Products) { ?>
                    <div class="grid_1_of_4 images_1_of_4 stock" style="width:28% !important">
                        <span class="hover"><a href="Details.php?Pid=<?php echo $Products['Productid'] ?>"><img src="<?php echo $Products['photo'] ?>" alt="" height="70%" width="70%"></a></span>
                        <h2 style="font-size:25px;"><?php echo $Products['Name'] ?> </h2>
                        <div class="price-details">
                            <div class="price-number">
                                <p><span class="rupees">$<?php echo $Products['Price'] ?></span></p>
                            </div>
                            <div class="add-cart" style="border-radius:7px; cursor:pointer">
                                <h4><a href="Process_In_cart.php?id=<?php echo $Products['Productid']?>" style="font-size:20px">Add to Cart</a></h4>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
            <?php }
            } ?>
            <?php if (!isset($_GET['Search']) && !isset($_GET['Id'])) {
                $Sql = "select * from products";
                $ProductList = mysqli_query($Access, $Sql);
            ?>
                <?php foreach ($ProductList as $Products) { ?>
                    <div class="grid_1_of_4 images_1_of_4 stock" style="width:28% !important">
                        <span class="hover"><a href="Details.php?Pid=<?php echo $Products['Productid'] ?>"><img src="<?php echo $Products['photo'] ?>" alt="" height="70%" width="70%"></a></span>
                        <h2 style="font-size:25px;"><?php echo $Products['Name'] ?> </h2>
                        <div class="price-details">
                            <div class="price-number">
                                <p><span class="rupees">$<?php echo $Products['Price'] ?></span></p>
                            </div>
                            <div class="add-cart" style="border-radius:7px; cursor:pointer">
                                <h4><a href="Process_In_cart.php?id=<?php echo $Products['Productid']?>" style="font-size:20px">Add to Cart</a></h4>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
            <?php }
            } ?>





            <!-- End New Product -->
            <!-- Begin Feature Products -->

            <!-- end sales product section-->
        </div>
    </div>
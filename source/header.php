<div class="header">
    <div class="header_top">
        <div class="logo">
            <a href="index.php"><img src="images/Logoshop.png" width="235px" alt="" style="margin-bottom:-80px;" /></a>
        </div>
        <div class="cart">
            <p style="font-size:24px; letter-spacing:2px; font-weight:bold;">Welcome to Virtual Luxurious Service Shop! <span>Menu</span>
            <div id="dd" class="wrapper-dropdown-2">
                <div class="Menu_user js-user-click">
                    <i class="Nextto1 fas fa-bars"></i>
                    <ul class="Cart_dropdown dropdown js-user" style="z-index:50">
                        <li class="Close-menu">Close menu <i class="Nextto2 fas fa-times"></i></li>
                        <li><a style="text-decoration:none; color:black !important" href="Cart.php"> My Shopping cart </a><i class="Nextto2 fas fa-shopping-cart"></i></li>
                        <li><a style="text-decoration:none; color:black !important" href="Account/User-page.php"> My Account </a> <i class="Nextto2 fas fa-user-secret"></i></li>
                        <li><a style="text-decoration:none; color:black !important" href=""> My Favorites </a><i class="Nextto2 far fa-star"></i></li>
                        <li><a style="text-decoration:none; color:black !important" href=""> Link to Wallet </a><i class="Nextto2 fas fa-wallet"></i></li>
                        <li class="mode-menu"> <span class="js-dark-mode mode">
                                <!-- <p>Dark theme</p> -->
                                <i class="Nextto3 fas fa-moon"></i>
                            </span>
                            <span class="js-light-mode mode">
                                <!-- <p>light theme</p> -->
                                <i class="Nextto3 far fa-lightbulb"></i>
                            </span>
                        </li>
                        <!-- <li class="js-light-mode" > Dark theme <i class="Nextto2 fas fa-moon"></i></li> -->
                    </ul>
                </div>

                <!-- <i class="Nextto1 fas fa-user-secret"></i> -->
            </div>
            </p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom" id="nav_top" style="z-index:25;">
        <div class="menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#footer">About</a></li>
                <li><a href="delivery.html">Services</a></li>
                <li class="news_nav" style="color: #fff; font-weight: 400">News
                    <ul class="news_menu">
                        <li><a href="index.php?Search=g">Hot and Trending</a></li>
                        <li>
                            <a href="index.php?Search=o">New Products</a>
                        </li>
                        <li>
                            <a href="index.php?Search=a">Special Offers</a>
                        </li>
                    </ul>
                </li>

                <div class="clear"></div>
            </ul>
        </div>
        <div class="search_box">
            <form>
                <?php $searching = "Search";
                if (isset($_GET['Search'])) {
                    $searching = $_GET['Search'];
                }
                ?>
                <input style="margin-top:10px" type="search" autocompelete="none" value="<?php echo $searching ?>" name="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}else {this.value = '<?php echo $searching ?>';}">
                <input type="button" value="">
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
?>
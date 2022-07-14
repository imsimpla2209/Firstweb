
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VLSS Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="icon" href="images/Logoshop.ico" type="image/x-icon" />
    <style>
        
        body {
            font-family: 'open sans';
            overflow-x: hidden;
            margin-bottom: 70px;
        }

        img {
            max-width: 100%;
        }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px;
            }
        }

        .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }

        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }

        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block;
        }

        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0;
        }

        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0;
        }

        .tab-content {
            overflow: hidden;
        }

        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
        }

        .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em;
        }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .product-title,
        .price,
        .sizes,
        .colors {
            text-transform: UPPERCASE;
            font-weight: bold;
        }

        .checked,
        .price span {
            color: #ff9f1a;
        }

        .product-title,
        .rating,
        .product-description,
        .price,
        .vote,
        .sizes {
            margin-bottom: 15px;
        }

        .product-title {
            margin-top: 0;
        }

        .size {
            margin-right: 10px;
        }

        .size:first-of-type {
            margin-left: 40px;
        }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px;
        }

        .color:first-of-type {
            margin-left: 20px;
        }

        .add-to-cart,
        .like {
            background: #E7717D;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .add-to-cart:hover,
        .like:hover {
            background: #866e5f;
            color: #fff;
        }

        .not-available {
            text-align: center;
            line-height: 2em;
        }

        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff;
        }

        .orange {
            background: #ff9f1a;
        }

        .green {
            background: #85ad00;
        }

        .blue {
            background: #0076ad;
        }

        .tooltip-inner {
            padding: 1.3em;
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        /*# sourceMappingURL=style.css.map */
    </style>
</head>

<body style="background-color:#866e5f">

    <div class="container">
        <div class="header_top" style="z-index:100">
            <div class="logo">
                <a href="index.php"><img src="images/Logoshop.png" width="210px" alt="" style="margin-bottom:-150px;" /></a>
            </div>
            <div class="card">
       <?php
            require_once "connectmysql.php";
            $pid = "";
            if(isset($_GET['Pid'])){
                $pid = $_GET['Pid'];
            }
            else{
                echo "This product has been deleted";
            }
            $sql = "select * from products where ProductID = '$pid'";
            $result1 = mysqli_query($Access,$sql);
            //$PrintDetails = mysqli_fetch_array($result1);
            foreach ($result1 as $PrintDetail){
            ?>
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="<?php echo $PrintDetail['photo']?>" /></div>
                                <div class="tab-pane" id="pic-2"><img src="<?php echo $PrintDetail['photo']?>" /></div>
                                <div class="tab-pane" id="pic-3"><img src="<?php echo $PrintDetail['photo']?>" /></div>
                                <div class="tab-pane" id="pic-4"><img src="<?php echo $PrintDetail['photo']?>" /></div>
                                <div class="tab-pane" id="pic-5"><img src="<?php echo $PrintDetail['photo']?>" /></div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php echo $PrintDetail['photo']?>" /></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img src="<?php echo $PrintDetail['photo']?>" /></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img src="<?php echo $PrintDetail['photo']?>" /></a></li>
                                <li><a data-target="#pic-4" data-toggle="tab"><img src="<?php echo $PrintDetail['photo']?>" /></a></li>
                                <li><a data-target="#pic-5" data-toggle="tab"><img src="<?php echo $PrintDetail['photo']?>" /></a></li>
                            </ul>

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title"><?php echo $PrintDetail['Name']?></h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                            <p class="product-description"><?php echo nl2br($PrintDetail['Note'])?></p>
                            <h4 class="price">current price: <span style="color:#E7717D;">$<?php echo $PrintDetail['Price']?></span></h4>
                            <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                            <h5 class="sizes" style="display: flex; ">Category: 
                                <span style="color: #E7717D;margin-left: 2%"> 
                                    <?php
                                        $id = $PrintDetail['Productid'];
                                        $select = "select catname from category where catid = '$id' limit 1";
                                        $result2 = mysqli_query($Access,$select);
                                        $Cat = mysqli_fetch_array($result2)['catname'];
                                        echo $Cat;
                                    ?>
                                </span>
                            </h5>
                            <div class="action">
                                <button class="add-to-cart btn btn-default" type="button"><a href="Process_In_cart.php?id=<?php echo $PrintDetail['Productid']?>" style="text-decoration: none; color: white">Add to cart</a></button>
                                <button class="like btn btn-default" type="button">
                                    <a href="Farvorite.php?id=<?php echo $PrintDetail['Productid']?>" style="text-decoration: none; color: white">
                                    <span class="fa fa-heart"></span></a>
                                </button>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
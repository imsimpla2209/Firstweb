<?php session_start();
if (empty($_SESSION['id'])) {
    $_SESSION['reminder'] = 'Login?please';
    header('Location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="images/Logoshop.ico" type="image/x-icon" />
    <title>VLSS CART OFFCIAL</title>
    <style>
        body {
            background: #866e5f !important;
        }

        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .card {
            margin: 44px 0 59px;
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        .bg-grey {
            background-color: #eae8e8;
        }

        @media (min-width: 992px) {
            .card-registration-2 .bg-grey {
                border-top-right-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }

        @media (max-width: 991px) {
            .card-registration-2 .bg-grey {
                border-bottom-left-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }

        .btn-dark:hover {
            background: #e75362 !important;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['notLogin'])) { ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Missing information or something wrogn</strong>
        </div>
    <?php
        unset($_SESSION['notLogin']);
    }
    ?>
    <div class="header_top">
        <div class="logo">
            <a href="index.php"><img src="images/Logoshop.png" width="210px" alt="" style="margin-bottom:-150px;" /></a>
        </div>
    </div>
    <section class="h-100 h-custom" style="background-color: #866e5f">

        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">VLSS Cart 🛍️🛍️🛍️🛒🛒🛒</h1>
                                            <h6 class="mb-0 text-muted">3 items</h6>
                                        </div>
                                        <hr class="my-4">
                                        <?php
                                        $cart = $_SESSION['cart'];
                                        $totalcost = 0;
                                        $sumcost = 0;
                                        if(count($cart) <= 0){?>
                                            <h2>No Items In Your Cart</h2>
                                        <?php }
                                        //Tạo 2 biến này để tính cái tổng tiền hàng
                                        foreach ($cart as $id => $item) { ?>
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="<?php echo $item['photo'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">Item</h6>
                                                    <h6 class="text-black mb-0"><?php echo $item['name'] ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <a href="update_cart.php?id=<?php echo $id ?>&type=decrease"><i class="fas fa-minus"></i></a>
                                                    </button>

                                                    <span id="form1" min="0" name="quantity" value="1" type="number" style="width:38px;" class="form-control form-control-sm" />
                                                    <?php echo $item['quantity'] ?>
                                                    </span>

                                                    <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <a href="update_cart.php?id=<?php echo $id ?>&type=increase"><i class="fas fa-plus"></i></a>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">$
                                                        <?php echo $totalcost = $item['price'] * $item['quantity'];
                                                        $sumcost += $totalcost;
                                                        //Tăng tiền hàng theo số lượng & gán tổng tiền += số lượng hàng
                                                        ?>
                                                    </h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="Delete-Cart.php?id=<?php echo $id ?>" class="text-muted"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>

                                            <hr class="my-4">
                                        <?php } ?>
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Bill 🤑🤑💰💰</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Temporary price:</h5>
                                            <h5>$ <?php
                                                    $i = 0;
                                                    echo $sumcost;
                                                    //in
                                                    ?></h5>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Shipping</h5>

                                        <div class="mb-4 pb-2">
                                            <select class="select">
                                                <option value="1">Standard-Delivery- $5.00</option>
                                                <option value="2">Fast-Delivery- $6.00</option>
                                                <option value="3">Super Fast-Delivery- $7.50</option>
                                                <option value="4">XService-Delivery- $50.55</option>
                                            </select>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Give code</h5>

                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea2">Enter your code</label>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <form method="post" action="Handle_order.php">
                                                <?php
                                                $id = $_SESSION['id'];
                                                require_once "connectmysql.php";
                                                $sql = "select * FROM customer where cusid = '$id'";
                                                $result = mysqli_query($Access, $sql);
                                                $OutInfo = mysqli_fetch_array($result);
                                                ?>
                                                <input type="text" id="form3Examplea2" class="form-control form-control-lg" name="orderAddress" autocomplete="off" value="<?php echo $OutInfo['Address'] ?>" />
                                                <label class="form-label" for="form3Examplea2">Your Address</label>
                                                <input type="text" id="form3Examplea2" class="form-control form-control-lg" name="orderPhone" autocomplete="off" value="<?php echo $OutInfo['Phone'] ?>" />
                                                <label class="form-label" for="form3Examplea2">Your phone number</label>

                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">Total price</h5>
                                                    <h5>$ <?php echo $sumcost ?></h5>
                                                </div>

                                                <button type="submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark" style="background:#E7717D;"><a style=" text-decoration:none; color:#eae8e8" href="Handle_order.php">Purchase Now</a></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
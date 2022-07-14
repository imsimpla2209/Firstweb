<?php
session_start();
if (isset($_SESSION['reminder'])) {
?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Please login before continuing! Ok👌</strong>
    </div>
<?php    unset($_SESSION['reminder']);}

?>
<!DOCTYPE HTML>

<head>
    <title>Not a Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="function.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="images/Logoshop.ico" type="image/x-icon" />
    <style>
        .news_menu .category:hover {
            background-color: var(--General-Color);
            cursor: pointer;
            box-shadow: 0 0 10px 2px var(--shadow-Color);
        }

        .add-cart:hover {
            background: #866e5f !important;
        }
    </style>
</head>

<body>
    <div class="body">
        <!-- Begin Wrap -->
        <?php require "connectmysql.php" ?>
        <div class="wrap Center main-body">
            <!-- Begin Header -->
            <?php require "header.php"; ?>
            <!-- End Header -->
            <!-- Begin Main -->
            <?php require "main.php"; ?>
            <!-- End Main -->
        </div>
        <!-- End Wrap -->
        <!-- Begin Footer -->
        <?php require "footer.php"; ?>

        <!-- End Footer -->
        <div class="Chatbox js-open-inbox" id="js-open-inbox">
            <i class="ChatIcon fas fa-comment-dots"></i>
            <ul id="inbox" class="js-open-main-inbox">
                <h2 id="header-inbox">Messenger</h2>
                <span id="Sub-btn">
                    <i class="add fas fa-plus"></i>
                    <i class="expend fas fa-phone-alt"></i>
                    <i class="bell fas fa-bell-slash"></i>
                    <i class="setting fas fa-cog"></i>
                </span>
                <i class="searchinbox fas fa-search"></i>
                <input type="text" class="input" placeholder="Search in messenger">
            </ul>
        </div>
        <script type="text/javascript" src="function.js"></script>
    </div>
</body>

</html>
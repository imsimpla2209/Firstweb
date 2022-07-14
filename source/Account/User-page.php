<?php
session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['name'])) {
    header("Location:Signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eCommerce Product Detail</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="icon" href="../images/Logoshop.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/usercss.css">
    <style>
        body {
            background: #BA68C8
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: #E7717D;
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #866e5f
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</head>

<body style="background-color: #866e5f">

    <div class="header_top" style="z-index:100">
        <div class="logo">
            <a href="../index.php"><img src="../images/Logoshop.png" width="210px" alt="" style="margin-bottom:-150px;" /></a>
        </div>
    </div>
    <?php 
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    require_once "connectmysql1.php";
    $sql = "select * from customer where cusid = '$id'";
    $result = mysqli_query($Access,$sql);
    $Info = mysqli_fetch_array($result);
    $fullname = $Info['FullName'];
    ?>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://th.bing.com/th/id/OIP.xSYTnsQl_k32kIwc4kfFdwHaHa?pid=ImgDet&rs=1" width="90">
                <span class="font-weight-bold"><?php echo $fullname?></span>
                <span class="text-black-50"><?php echo $username?></span>
                <span><?php echo $Info['Address']?></span></div>
            </div>
            <div class="col-md-3 border-right">
                <form method="post" action="User-page.php" class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-right">Edit your profile</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" name ="name" class="form-control" placeholder="Full name" value="Unknown"></div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6"><label class="labels">Phone</label><input type="text" name ="Phone" class="form-control" placeholder="Number phone" value=""></div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Address</label><input type="text" class="form-control" name="Address" placeholder="Country"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Shopping Log</span></div>
                    <?php 
                        $sql="select * from orderlist where cusid = '$id'";
                        $Get_em = mysqli_query($Access,$sql);
                        foreach($Get_em as $Put_em) {
                    ?>
                    <div class="d-flex flex-row mt-3 exp-container"><img src="<?php echo $Put_em['photo']?>" width="45" height="45"></div>
                    <div class="work-experience ml-1"><span class="font-weight-bold d-block"><?php echo $Put_em['Name']?></span><span class="d-block text-black-50 labels">Quantity: <?php echo $Put_em['Quantitty']?></span><span class="d-block text-black-50 labels">Date: <?php echo $Put_em['OrderDate']?></span></div>
                        <?php }?>
                </div>
            </div>
            <?php 
                $id = $_SESSION['id'];
                if(isset($_POST['name']) && isset($_POST['Phone']) && isset($_POST['Address'])){
                $name = $_POST['name'];
                $phone = $_POST['Phone'];
                $Address = $_POST['Address'];
                $update = "insert customer (CusId,FullName,Address,Phone) values ('$id','$name', '$phone', '$Address')";
                mysqli_query($Access,$update);
                }

            ?>
        </div>
        <button><a href="SignoutOK.php">Sign out now</a></button>
    </div>
</body>

</html>
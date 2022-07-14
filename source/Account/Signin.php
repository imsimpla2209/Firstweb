<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/SubCss2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="images/Logoshop.ico" type="image/x-icon" />
    <title>Document</title>
    <style>

    </style>
</head>

<body style="padding:0 3% 6%">
    <div class="header_top">
        <div class="logo">
            <a href="../index.php"><img src="../images/Logoshop.png" width="210px" alt="" style="margin-bottom:-150px;" /></a>
        </div>
    </div>
    <div class="global-container">
        <?php
        session_start();
        if (isset($_SESSION['error1'])) { ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Wrong username or password</strong>
            </div>
        <?php
            unset($_SESSION['error1']);
        }

        ?>
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center" style="font-weight:650">Log in to Virtual Luxurious Services Shop(VLSS)</h3>
                <div class="card-text">

                    <form method="post" action="Process_Login.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight:550">User name</label>
                            <input type="Text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" name="Logname" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight:550">Password</label>
                            <a href="#" style="float:right;font-size:12px;">Forgot password?
                            </a>
                            <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" name="Psw" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" style="background:#E7717D">Signin</button>

                        <div class="sign-up">
                            Don't have an account?
                            <a href="Signupok.php">Create One</a>
                        </div>
                        <div class="sign-up">
                            Is real Administrator
                            <a href="../Admin/Signin_to_admin.php">Sign in as Admin now</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
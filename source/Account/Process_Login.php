<?php
    require_once "connectmysql1.php";
    $Username = "";    
    $password = "";
    if(isset($_POST["Logname"]) && isset($_POST["Psw"]))
    {   
        $Username = $_POST['Logname'];
        $password = $_POST['Psw'];
    }

    $sql= "select count(*) from account where username = '$Username' and password = '$password'";
    $result=mysqli_query($Access,$sql);
    $Check = mysqli_fetch_array($result)['count(*)'];

    if($Check == 1)
    {
        session_start();
        $GetAccount= "select * from account where username = '$Username' and password = '$password'";
        $result=mysqli_query($Access,$GetAccount);
        $Account = mysqli_fetch_array($result);
        $_SESSION['id'] = $Account['id'];
        $_SESSION['username'] = $Account['username'];
        header("location:User-page.php?congrat=Welcome sir🙏🙏");
        exit;
    }
    else{
        session_start();
        $_SESSION['error1']="Wrong";
        header("location:Signin.php");
        
        exit;
    }
    mysqli_close($Access);
?>
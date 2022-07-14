<?php
    require_once "connectmysql1.php";
    $Username = "";    
    $password = "";
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {   
        $Username = $_POST['username'];
        $password = $_POST['password'];
    }

    $sql= "select count(*) from account where username = '$Username'";
    // die($sql)
    $result=mysqli_query($Access,$sql);
    $Check = mysqli_fetch_array($result)['count(*)'];

    if($Check == 1)
    {
        session_start();
        $_SESSION['error']= 'wrong';
        header("location:Signupok.php");       
        exit;
        
    }
    
        $Get_it="insert into account(username,password) values ('$Username','$password')";
        mysqli_query($Access,$Get_it);    
        $Sql_Getid = "Select id from account where username='$Username'";
        //Lấy ID để lưu vào session dựa theo tên đăng nhập vừa tạo vì id có identity
        $ReturnID = mysqli_query($Access,$Sql_Getid); 
        $GetAcc = mysqli_fetch_array($ReturnID)['id'];   
        //fetch mảng để lấy duy nhất giá trị id của account vừa rồi
        session_start();
        //khởi chạy session
        $_SESSION['username'] = $Username;
        $_SESSION['id'] = $GetAcc;
        //lưu giá trị vào phiên session
    if(isset($_POST['phone']) && isset($_POST['Address']))
    {   
        $phone = $_POST['phone'];
        $Address = $_POST['Address'];
        $Fullname = "unknown";
        $insert = "insert into customer (Cusid,Fullname,Phone,Address) values ('$GetAcc','$Fullname','$phone','$Address')";
        mysqli_query($Access,$insert);
    }

    header("Location:user-page.php");
    mysqli_close($Access);

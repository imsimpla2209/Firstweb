<?php
    Session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    //Hàm unset dùng để xóa đi nhưng data đang lưu khỏi bổ nhớ, có thể xóa cả biển, mảng, vvv
    //không dùng destroysession vì nó sẽ bỏ luôn cả rỏ hàng trong phiên

    header('Location:../index.php')
?>
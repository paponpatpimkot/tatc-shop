<?php
    include 'connect.php';
    $user_id=$_GET['user_id'];
    $del_data=$con->query("DELETE FROM user WHERE user_id='$user_id'");
    if(!$del_data){
        echo "<script>alert('ไม่สามารถลบข้อมูลได้ กรุณาตรวจสอบความผิดพลาด')</script>";
    }else{
        echo "<script>window.location.href='index.php?page=member'</script>";
    }
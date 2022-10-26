<?php
include ('../dBconn/connect.php');
//    variable-Homepage
    $Department = $_POST['Department'];
    $Name = $_POST['Name'];
    $Gender = $_POST['optradio'];
    $Address = $_POST['Address'];
    $Contact = $_POST['Contact'];

//    query-Homepage
    $sql = "INSERT INTO visitorsloginfo (Department, Name, Gender, Address, Contact) VALUES ('$Department', '$Name', '$Gender', '$Address', '$Contact')";
    $result = mysqli_query($iconn, $sql);
    echo "<script> alert('Success'); window.location = '../staff_page.php'; </script>";

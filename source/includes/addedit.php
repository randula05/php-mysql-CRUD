<?php
    include_once 'dbh.php';

    if(isset($_POST['add'])){

        $username=$_POST['username'];
        $speed=$_POST['speed'];

        $sql="insert into raceusers (username,speed) values ('$username',$speed);";
        mysqli_query($conn,$sql);
        header("Location: ../index.php");

    }else if(isset($_POST['edit'])){

        $username=$_POST['username'];
        $speed=$_POST['speed'];
        $userid=$_POST['editid'];
        $sql="update raceusers set username='$username',speed='$speed' where userid=$userid;";
        mysqli_query($conn,$sql);
        header("Location: ../index.php");
    }
    

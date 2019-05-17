<?php
    include_once 'dbh.php';

    if(isset($_POST['del'])){
        $userid=$_POST['delid'];

        $sql="delete from raceusers where userid='$userid';";
        mysqli_query($conn,$sql);

        header("Location: ../index.php");
    }

    
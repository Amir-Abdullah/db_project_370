<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])){
    $sql = "SELECT * FROM users ORDER by id ASC";
    $res = mysqli_query($conn,$sql);

}else{
    header("Location: index.php");

}
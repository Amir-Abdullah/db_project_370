<?php
    //PHP $_SESSION is an associative array that contains all session variables. It is used to set and get session variable values.
    session_start(); 
    include "dbconnect.php";
    if (isset($_SESSION['username']) && isset($_SESSION['id']))
    { ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center"
    style = "min-height: 100vh">
      <?php if ($_SESSION['role']== 'admin'){?>
            <!-- For Admin -->
            <div class="card" style="width: 18rem;">
                <img src="images/admin.png" 
                    class="card-img-top" 
                    alt="admin image">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <?=$_SESSION['name']?>
                    </h5>
                    <a href="logout.php" class="btn btn-dark">Logout</a>
                </div>
            </div>
            <div class="p-3">
            <?php include 'php/members.php';
                if (mysqli_num_rows($res)>0){?>
            <h1 class="display-4 fs-1">Members</h1>                
            <table class="table" 
                   style="width: 32rem;">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Id</th>
                    <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($rows = mysqli_fetch_assoc($res)){?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$rows['name']?></td>
                        <td><?=$rows['id']?></td>
                        <td><?=$rows['role']?></td>
                    </tr>
                    <?php $i++; }?>
                </tbody>
                </table>
                <?php }?> 
            </div>
        <?php }else if ($_SESSION['role']== 'manager'){?>
                <!-- For manager -->
            <div class="card" style="width: 18rem;">
                <img src="images/manager.jpg" 
                    class="card-img-top" 
                    alt="manager image">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <?=$_SESSION['name']?>
                    </h5>
                    <a href="logout.php" class="btn btn-dark">Logout</a>
                </div>
            </div>
            <div class="p-3">
            <?php include 'php/members.php';
                if (mysqli_num_rows($res)>0){?>
            <h1 class="display-4 fs-1">Members</h1>                
            <table class="table" 
                   style="width: 32rem;">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Id</th>
                    <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($rows = mysqli_fetch_assoc($res)){?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$rows['name']?></td>
                        <td><?=$rows['id']?></td>
                        <td><?=$rows['role']?></td>
                    </tr>
                    <?php $i++; }?>
                </tbody>
                </table>
                <?php }?> 
            </div>
        <?php }else{
         header("Location: c_index.html");
         exit();   
         }?> 
    </div>
</body>
</html>
<?php }else{
    header("Location: index.php");

} ?>
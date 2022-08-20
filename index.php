<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multiUser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center"
    style = "min-height: 100vh">
      <form class = "border shadow p-3 rounded"
            action="php/check-login.php"
            method="post"
            style="width:450px;">
            <h1 class="text-center p-3">LOGIN</h1>
            <?php if (isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?=$_GET['error']?>
            </div>
            <?php }?>           
        <div class="mb-3">
            <label for="username" 
                   class="form-label">User name</label>
            <input type="text" 
                   class="form-control"
                   name = "username" 
                   id="username">
            
        </div>
        <div class="mb-3">
            <label for="password" 
                   class="form-label">Password</label>
            <input type="password"
                   name = "password" 
                   class="form-control" 
                   id="password">
            
        </div>
        <div class="mb-0">
            <label  class="form-label">Select User Type:</label>
        </div>
        <select class="form-select mb-3" 
                name="role"
                aria-label="Default select example">
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
        </select>

        <button type="submit" 
                class="btn btn-primary">login</button>
        </form>
    </div>
</body>
</html>
<?php
@session_start();
include "../functions.php";
if (isset($_POST["login"])) {
    include "../connect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password=md5($password);
    $sql = "SELECT * FROM user_tbl where username='$username' and password='$password' LIMIT 1";


     $result = mysqli_query($dbConnect,$sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { 
         $_SESSION['ISADMINLOGIN']="TRUE";        
         $_SESSION["ADMINUSERNAME"]=$row['username'];
         $_SESSION['ADMINUSERID']=$row['id'];
        } 

       
        redirect("pages/index.php?msg=loginsuccess");
    } else {
        redirect("admin-login.php?msg=invaliduser");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Admin</title>
        <link href="dist/css/styles.css" rel="stylesheet" />
        <script src="dist/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3>
                                        <div class="text-center font-weight-light my-4">
                                            <?php if(isset($_GET['msg'])&& $_GET['msg']=="invaliduser")
            {?>
             <div style="font-size:18px; color:#FF0000;">Invalid Username or passowrd</div>
             <?php }?></div>
                                    </div>
                                    <div class="card-body">
                                          <form class="form-signin" action="#" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="username" type="text" placeholder="name@example.com" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                        
                                            <div class="d-flex align-items-center justify-content-center">
                                               
                                                <button name="login" class="btn btn-primary">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
       
        </div>
        <script src="dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
    </body>
</html>

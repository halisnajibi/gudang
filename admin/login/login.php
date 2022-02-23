<?php 
session_start();
if(isset($_SESSION["username"])){
      header("location:../../index.php");
}
require'../../functions.php';

$username="";
$password="";
$err="";
if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["pw"];

    //cek apakah username dan pw sudah di isi
    if($username == '' OR $password == ''){
        $err = "silahkan masukan username dan password !!";
    }

    //cek apakah form username dan pw sudah cocok dengan db
    if(empty($err)){
        $sql1="SELECT * FROM login WHERE username='$username'";
        $q1=mysqli_query($conn,$sql1);
        $r1=mysqli_fetch_assoc($q1);

        if($r1["pass"] != $password){
            $err = "akun tidak ditemukan !!";
        }
    }

    //kalo cocok pindahkan
    if(empty($err)){
        $_SESSION["username"]= $username;
        echo "login berhasil";
       header("location:../../index.php");
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
        <title>Login</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            p{
                font-weight: bold;
                font-size: 13px;
                margin-left: 20px;
                margin-top: 20px;
                color: red;
            }
        </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <p class="pesan">
                                         <?php 
                                        if($err){
                                            echo $err;
                                        }
                                    ?>
                                    </p>
                                   
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="username" placeholder="Username" autocomplete="off"/>
                                                <label for="inputEmail">Unsername</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pw" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                               
                                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small ">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
    </body>
</html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Kantin - Control Panel</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/colors/blue.css" id="theme" rel="stylesheet">

    <style>
        html, body {
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .cont > p {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .logo img {
            padding: 3%;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        #login {
            border-left: 1px solid #ccc;
            padding:20px;
        }
    </style>
</head>

<body>
<div class="container flex-center position-ref full-height">
    <div class="col-md-3 logo">
        <div class="alert alert-primary" role="alert"><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp; Login via Facebook</div>
        <div class="alert alert-danger" role="alert"><i class="fa fa-google-plus-square" aria-hidden="true"></i>&nbsp; Login via Google</div>
        <div class="alert alert-info" role="alert"><i class="fa fa-twitter-square" aria-hidden="true"></i>&nbsp; Login via Twitter</div>
    </div>
    <div class="col-md-5">
        <form id="login" method="POST" action="login.php?action=login">
            <p>Default Login: rafinyadi@gmail.com & root123</p>
            <div class="form-group">
                <label for="exampleInputEmail1">ID Login</label>
                <input type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Identity" required autofocus>
                <small id="emailHelp" class="form-text text-muted">Enter email or student number for use it.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="inputPass" aria-describedby="passwordHelp" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <small id="emailHelp" class="form-text text-muted">Belum punya akun? <a href="register.php">Daftar sekarang</a>.</small>
            <small id="passwordHelp" class="form-text text-muted"><a href="#">Lupa Password</a></small>
        </form>
    </div>
</div>



    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
include "connection.php";
include 'session.php';
if (isset($_SESSION['name'])) {
    header('location: index.php');
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'login') {
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        
        $query = $connection->query("SELECT * FROM users WHERE (email = '$email' AND password = '$pass') OR (username = '$email' AND password = '$pass')");
        $execute = $query->fetch_array(MYSQLI_BOTH);
        $check = $query->num_rows;
        
        if ($check) {
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $execute['id_user'];
            $_SESSION['name'] = $execute['name'];
            // $_SESSION['role'] = $execute['id_roles'];
            if ($execute['id_roles'] == 1) {
                $_SESSION['role'] = 'administrator';
            } else if ($execute['id_roles'] == 2) {
                $_SESSION['role'] = 'user';
            }
            header("location: index.php?menu=dashboard");
        } else {
            header("location: login.php");
        }
    } else if ($_GET['action'] == 'register') {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $class = $_POST['class'];
        $user = $_POST['username'];
        $pass = md5($_POST['password']);

        $query = $connection->query("INSERT INTO users(name,email,username,password,id_class) VALUES('$name','$email','$user','$pass','$class')");
        if ($query) {
            header("location: index.php");
        } else {
            header("location: register.php?notification=Username atau email yang dimasukan sudah ada.");
        }
    }
}
?>
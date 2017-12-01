<?php
include "connection.php";
if (isset($_SESSION['name'])) {
    header('location: index.php');
}
$query = $connection->query("SELECT * FROM class");

?>
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
    <div class="col-md-5">
        <form id="login" method="POST" action="login.php?action=register">
        <?php if (isset($_GET['notification'])) { ?>
        <p><font color="red">!</font> <?php echo $_GET['notification']; ?></p>
        <?php } ?>
        <div class="form-group">
                <label for="name">Full name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="inputPass" aria-describedby="passwordHelp" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Student numbers</label>
                <input type="number" class="form-control" name="username" placeholder="Enter Student number">
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control">
                <?php while ($data = $query->fetch_array()) { ?>
                    <option value="<?php echo $data['id_class']; ?>"><?php echo $data['name']; ?></option>
                <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <small id="emailHelp" class="form-text text-muted">Sudah punya akun? <a href="login.php">Masuk</a>.</small>
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
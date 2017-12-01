<?php
if (isset($_SESSION['role'])) {
    if (!$_SESSION['role'] == 1) {
        header('location: index.php');
    }
}
?>
ini halaman x<br>
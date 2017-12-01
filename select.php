<?php
include 'class/SelectController.php';
if ($_GET['menu']) {
    selectPage($_SESSION['role'],$_GET['menu']);
}
?>
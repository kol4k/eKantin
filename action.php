<?php
session_start();
include 'class/SelectController.php';
if ($_GET['go']) {
    selectAction($_SESSION['role'],$_GET['go']);
}
?>
<?php
function selectRole($role)
{
    if ($_SESSION['role'] == 1) {
        $_SESSION['role'] = 'administrator';
    } else if ($_SESSION['role'] == 2) {
        $_SESSION['role'] = 'user';
    }
}

function selectPage($role,$url)
{
    if ($url) {
        include 'views/'.$role.'/'.$url.'.php';
    } else {
        echo 'gagal';
    }
}

function selectAction($role,$url)
{
    if ($url) {
        include 'action/'.$role.'/'.$url.'.php';
    } else {
        echo 'gagal';
    }
}
?>
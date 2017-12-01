<?php
include '../connection.php';

function select() {
    // this code for select db just entering query
}
$query = $connection->query($_GET['query']);
return true;
?>
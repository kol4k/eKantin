<?php
include 'connection.php';
if(isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $min = $_POST['min'];
    $seller = $_SESSION['id'];

    if ($_GET['method'] == 'store') {
        echo $name.$sku.$category.$price.$desc.$min.$seller;
        $query = $connection->query("INSERT INTO products(name_product,sku,id_category,unit_price,description,min_buy,id_seller) VALUES('$name','$sku','$category','$price','$desc','$min','$seller')");
        if ($query) {
            header('location: index.php');
        }
    }
    else if ($_GET['method'] == 'update') {
        $id = $_GET['id'];
        $query = $connection->query("UPDATE products SET name_product = '$name', sku = '$sku', id_category = $category, unit_price = '$price', description = '$desc', min_buy = '$min', id_seller = '$seller' WHERE id_product = $id");
        if ($query) {
            header('location: index.php');
        }
    }
}
else if ($_GET['method'] == 'delete') {
    $id = $_GET['id'];
    $query = $connection->query("DELETE FROM products WHERE id_product = '$id'");
    if ($query) {
        header('location: index.php');
    }
}
?>
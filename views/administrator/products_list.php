<?php
include 'connection.php';
$query = $connection->query("SELECT * FROM products");
?>
                            <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-settings font-red"></i>
                                    <span class="caption-subject font-red sbold uppercase">Product List</span>
                                </div>
                                <div class="actions">
                                    <a href="?menu=products_add" type="button" class="btn btn-transparent red btn-outline btn-circle btn-sm active">Add Product</a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-hover table-light">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Category </th>
                                                <th> Name of Product </th>
                                                <th> Code Product </th>
                                                <th> Price </th>
                                                <th> Seller </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($data = $query->fetch_array(MYSQLI_BOTH)) { ?>
                                            <tr>
                                                <td> <?php echo $data['id_product'] ?> </td>
                                                <td> <?php echo $data['id_category'] ?> </td>
                                                <td> <?php echo $data['name_product'] ?> </td>
                                                <td> <?php echo $data['sku'] ?> </td>
                                                <td>
                                                    <span class="label label-sm label-success"> Rp.<?php echo $data['unit_price'] ?> </span>
                                                </td>
                                                <td> Administrator </td>
                                                <td><a href="?menu=products_edit&get=<?php echo $data['id_product']; ?>" type="button" class="btn btn-transparent blue btn-circle btn-sm">Edit</a> &nbsp;<a href="action.php?go=products&method=delete&id=<?php echo $data['id_product']; ?>" type="button" class="btn btn-transparent yellow btn-circle btn-sm">Delete</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
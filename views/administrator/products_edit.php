<?php
if (isset($_SESSION['role'])) {
    if (!$_SESSION['role'] == 1) {
        header('location: index.php');
    }
}
include 'connection.php';
$query = $connection->query("SELECT * FROM products WHERE id_product = ".$_GET['get']);
$list = $query->fetch_array(MYSQLI_BOTH);
?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-settings font-green-haze"></i>
                    <span class="caption-subject bold uppercase"> Edit Product</span>
                </div>
                <div class="actions">
                <a href="?menu=products_add" type="button" class="btn btn-transparent red btn-outline btn-circle btn-sm active">Add product</a>&nbsp;
                    <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" name="add" class="form-horizontal" method="POST" action="action.php?go=products&method=update&id=<?php echo $list['id_product']; ?>">
                    <div class="form-body">
                        <div class="form-group form-md-line-input has-success">
                            <label class="col-md-2 control-label">Name of Product</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="<?php echo $list['name_product']; ?>" placeholder="Enter your product name">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input has-error">
                            <label class="col-md-2 control-label">SKU</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="sku" value="<?php echo $list['sku']; ?>" placeholder="Enter the number code of product">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">SKU is Product code number for easy to choses.</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Category</label>
                            <div class="col-md-10">
                                <select class="form-control" name="category">
                                    <?php
                                    include 'connection.php';
                                    $query = $connection->query("SELECT * FROM productcategories");
                                    while ($data = $query->fetch_array(MYSQLI_BOTH)) {
                                    ?>
                                    <option value="<?php echo $data['id_category']; ?>"><?php echo $data['name']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Price</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="price" value="<?php echo $list['unit_price']; ?>" placeholder="Enter price">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="col-md-2 control-label">Description</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" name="description" placeholder="Description Product"><?php echo $list['description']; ?></textarea>
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Minimum Buy</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" name="min" value="<?php echo $list['min_buy']; ?>" placeholder="Enter Minimum buy product">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <input type="reset" value="Cancel" form="add" class="btn default">
                                <input type="submit" value="Submit" name="Submit" class="btn blue">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
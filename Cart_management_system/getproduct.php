<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect("localhost", "root","", "cart");
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM product WHERE same_id = '".$q."'";
$result = mysqli_query($con,$sql);

$num = mysqli_num_rows($result);
if ($num > 0) {
    while ($product = mysqli_fetch_array($result)) {
?>
        <div class="col-6">
            <div class="card">
                <div class="card-img-top">
                    <div><img id="<?= $product['id'] ?>-image" src="<?= "./" . $product['image'] ?>" alt="" width="120"></div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">
                        <div id="<?= $product['id'] ?>-name"><?= $product['name'] ?></div>
                    </h5>

                    <div class="prodect-price">
                        Price:
                        <span id="<?= $product['id'] ?>-price">
                            <?= $product['price'] ?>
                        </span>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" onclick="clickme(<?= $product['id'] ?>)" id="<?=$product['id'] ?>">Add to cart</button>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#<?=$product['id']."55x" ?>">
                        View
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="<?=$product['id']."55x" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="<?= $product['id'] ?>-ModalCenterTitle"><?= $product['name'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div><img id="<?= $product['id'] ?>-image" src="<?= "./" . $product['image'] ?>" alt="" width="120"></div>

                    <div class="modal-body">Price:
                        <?= $product['price'] ?>
                    </div>
                    <div class="modal-body">Description:
                        <div><?= $product['description'] ?></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

mysqli_close($con);
?>
</body>
</html>
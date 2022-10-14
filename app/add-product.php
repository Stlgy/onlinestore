<?php
include_once 'libraries/start.php';
include_once 'helpers/session_helper.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "libraries/head.php"; ?>
    <link rel="stylesheet" href="template/css/style_log.css" type="text/css">
</head>

<body>
    <?php include_once "libraries/header.php"; ?>
    <nav class="navbar navbar-light justify-content-center fs3 mb-5" style="background-color: #00A8CC;">
        PRODUCTS
    </nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Product</h3>
            <p class="text-muted">Complete the form below to add a new product</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form class="form__addproduct" action="" method="post" style="width:31vw; min-width:300px;">
                <input type="hidden" name="type" value="addProduct">
                <div class="row">
                    <label class="form-label">Product Name:</label>
                    <input type="text" class="form-control" name="name_p" placeholder="Required" required>
                    <label class="form-label">Product Description:</label>
                    <textarea rows=2 class="form-control" name="description_p" placeholder="Required" required></textarea>
                    <label class="form-label">Product Category:</label>
                    <input type="text" class="form-control" name="category_p" placeholder="Required" required>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label-p">Product Buy Price:</label>
                        <input type="text" class="form-control" name="buy_price_p">
                    </div>
                    <div class="col-4">
                        <label class="form-label-p">Product Sell Price:</label>
                        <input type="text" class="form-control" name="sell_price_p">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Product Available:</label>
                            <div>
                                <input type="radio" id="yes" name="availability_p" value="Available">
                                <label class="availability">YES</label>
                                <input type="radio" id="no"  name="availability_p" value="Not Available">
                                <label class="availability">NO</label>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label">Product Stock:</label>
                        <input type="text" class="form-control" name="stock_p">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Product Reserved:</label>
                        <input type="text" class="form-control" name="stock_reserved_p">
                    </div>
                    <div class="col-4">

                    </div>
                    <div class="row">
                        <label class="form-label">Product Image:</label>
                        <input type="file" name="img_p">
                        <button type="submit" name="addproduct-btn" class="btn-addproduct">ADD</button>
                    </div>
                </div>
            </form>
        </div>
</body>

</html>

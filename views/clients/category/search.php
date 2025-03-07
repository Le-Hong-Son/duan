<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
    <h2 class="mt-5"><?= $keyword ?></h2>
    <div class="row g-4">
        <?php  if($products  ):  ?>
        <?php foreach ($products as $pro) : ?>
        <!-- Box Sản Phẩm -->
        <div class="col-md-3">
            <div class="product-box">
                <img src="<?= $pro['image'] ?>" alt="Product Image" class="product-img">
                <div class="product-info">
                    <a href="<?= ROOT_URL .'?ctl=detail&id=' . $pro['id'] ?>" class="product-link">
                        <h5 class="product-name"><?= $pro['name'] ?></h5>
                    </a>
                    <div>
                        <span class="product-price"><?= $pro['price'] ?></span>
                    </div>
                    <div class="product-buttons">
                        <button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?php else : ?>
        <h3>Danh mục <?= $keyword ?> không có sản phẩm</h3>
        <?php endif?>

    </div>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
    <h2 class="mt-5"><?= $title ?></h2>
    <div class="row g-4">
        <?php  if($products  ):  ?>
        <?php foreach ($products as $pro) : ?>
        <!-- Box Sản Phẩm -->
        <div class="col-md-3">
            <div class="product-box">
                <a href="<?= ROOT_URL .'?ctl=detail&id=' . $pro['id'] ?>"> <!-- Link đến trang chi tiết sản phẩm -->
                    <img src="<?= $pro['image'] ?>" alt="Product Image" class="product-img">
                </a>
                <div class="product-info">
                    <a href="<?= ROOT_URL .'?ctl=detail&id=' . $pro['id'] ?>" class="product-link">
                        <h5 class="product-name"><?= $pro['name'] ?></h5>
                    </a>
                    <div>
                        <span class="product-price"><?= $pro['price'] ?></span>
                    </div>
                    <div class="product-buttons">
                        <a href="<?= ROOT_URL . '?ctl=detail&id=' . $pro['id'] ?>" class="btn btn-outline-success">Xem Chi Tiết </a>
                    </div>

                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?php else : ?>
        <h3>Danh mục <?= $title ?> Không có sản phẩm</h3>
        <?php endif?>

    </div>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>

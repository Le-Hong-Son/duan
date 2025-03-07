    <?php include_once ROOT_DIR . "views/clients/header.php" ?>
    <?php include_once ROOT_DIR . "views/clients/slide.php" ?>

    <div class="container mt-5">
        <h2>Quần Áo </h2>
        <div class="row g-4">
            <?php foreach ($clothes as $clothe) : ?>
            <!-- Box Sản Phẩm -->
            <div class="col-md-3">
                <div class="product-box">
                    <a href="<?= ROOT_URL .'?ctl=detail&id=' . $clothe['id'] ?>" class="product-link">
                        <img src="<?= $clothe['image'] ?>" alt="Product Image" class="product-img">
                    </a>
                    <div class="product-info">
                        <a href="<?= ROOT_URL .'?ctl=detail&id=' . $clothe['id'] ?>" class="product-link">
                            <h5 class="product-name"><?= $clothe['name'] ?></h5>
                        </a>
                        <div>
                            <span class="product-price"><?= $clothe['price'] ?> VNĐ</span>
                        </div>
                        <div class="mt-4">
                            <a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $clothe['id']?>"
                                class="btn btn-primary btn-lg">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>

        <h2 class="mt-5">Sản phẩm dành HOT</h2>
        <div class="row g-4">
            <?php foreach ($products as $pro) : ?>
            <!-- Box Sản Phẩm -->
            <div class="col-md-3">
                <div class="product-box">
                    <a href="<?= ROOT_URL .'?ctl=detail&id=' . $pro['id'] ?>" class="product-link">
                        <img src="<?= $pro['image'] ?>" alt="Product Image" class="product-img">
                    </a>
                    <div class="product-info">
                        <a href="<?= ROOT_URL .'?ctl=detail&id=' . $pro['id'] ?>" class="product-link">
                            <h5 class="product-name"><?= $pro['name'] ?></h5>
                        </a>
                        <div>
                            <span class="product-price"><?= $pro['price'] ?> VNĐ</span>
                        </div>
                        <div class="mt-4">
                            <a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $pro['id']?>"
                                class="btn btn-primary btn-lg">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>

    <?php include_once ROOT_DIR . "views/clients/footer.php" ?>
<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<div class="container mt-5">
    <div class="row">
        <!-- Hình ảnh sản phẩm -->
        <div class="col-md-6">
            <img src="<?= $product['image']?>" alt="<?= $product['name']?>" class="img-fluid rounded">
        </div>
        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h1 class="display-5"><?= $product['name']?></h1>
            <p class="text-muted">Trạng thái:
                <?php 
                        if($product['quantity'] > 0) :
                    ?>
                <span class="badge bg-success">Còn hàng</span> <!-- Thay đổi theo trạng thái -->
                <?php else : ?>
                <span class="badge bg-danger">Hết hàng</span> <!-- Thay đổi theo trạng thái -->
                <?php endif ?>
            </p>
            <h3 class="text-danger">Giá: <?=number_format($product['price'])?></h3>
            <p><strong>Số lượng còn:</strong> <?=$product['quantity']?></p>
            <p class="mt-4">
                <strong>Mô tả sản phẩm:</strong><br>
                <?=$product['description']?>
            </p>
            <!-- Nút thêm vào giỏ hàng -->
            <div class="mt-4">
                <a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $product['id']?>" class="btn btn-primary btn-lg">Thêm vào giỏ hàng</a>
            </div>
        </div>
    </div>
    <!-- Thêm phần mô tả chi tiết nếu cần -->
    <div class="row mt-5">
        <div class="col">
            <h2>Mô tả chi tiết</h2>
            <p>
                <?=$product['content']?>
            </p>
        </div>
    </div>

                        <hr>
    <h3>Bình luận</h3>
    <div class="comment">
     <?php foreach($comments as $comment) :  ?>
       
            <p>
                <b><?= $comment['fullname'] ?></b> <?= date('d-m-Y H:i:s',strtotime($comment['created_at'])) ?> <br>
                <?= $comment['content'] ?>
            </p>
       
    <?php endforeach ?>

    </div> <br>
    <?php if(isset($_SESSION['user'])): ?>
        <form action="" method="post">
        <textarea name="content" rows="3" cols="60" require id=""></textarea>
        <br><button type="submit">Gửi</button>
        </form>
        <?php else: ?>
            <div>Bạn Cần <b><a href="<?= ROOT_URL . '?ctl=login'?>">Đăng Nhập</a></b> Để Bình Luận</div>
        <?php endif ?>
</div>
<div class="container mt-5">
    <h2 class="mt-5">Sản phẩm liên quan</h2>
    <div class="row g-4">
        <?php foreach ($productReleads as $pro) : ?>
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
                    <div class="product-buttons">
                        <a href="<?= ROOT_URL . '?ctl=detail&id=' . $pro['id'] ?>" class="btn btn-outline-success">Xem Chi Tiết </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
<style>
.comment {
    margin-top: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.comment p {
    margin: 10px 0;
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.comment p:last-child {
    border-bottom: none;
}

.comment p b {
    font-size: 1.1rem;
    color: #333;
}

.comment p span {
    font-size: 0.9rem;
    color: #888;
}

form textarea {
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    font-size: 1rem;
    resize: vertical;
}

form button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 1rem;
    margin-top: 10px;
    width: 100%; /* Đặt chiều rộng đầy đủ */
    display: block; /* Đảm bảo nút là khối đầy đủ */
}

form button:hover {
    background-color: #0056b3;
}


.comment div {
    margin-top: 20px;
    font-size: 0.9rem;
    color: #555;
}

.comment div a {
    color: #007bff;
    text-decoration: none;
}

.comment div a:hover {
    text-decoration: underline;
}
</style>

<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Thông tin thanh toán</h1>
    <div class="row">
        <!-- Form thông tin thanh toán -->
        <div class="col-md-7">
            <form action="<?= ROOT_URL . '?ctl=checkout' ?>" method="POST">
                <!-- Thông tin người nhận -->
                <div class="card mb-4">
                    <div class="card-header bg-primary">
                        <h5>Thông tin người nhận</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" value="<?=$user['fullname']?>" name="fullname"
                                   placeholder="Nhập họ tên" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" value="<?=$user['phone']?>" name="phone"
                                   placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?=$user['email']?>" name="email"
                                   placeholder="Nhập email" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ giao hàng</label>
                            <textarea class="form-control" id="address" name="address" rows="3"
                                      placeholder="Nhập địa chỉ giao hàng" required><?=$user['address']?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?= $user['id']?>">
                    </div>
                </div>

                <!-- Phương thức thanh toán -->
                <div class="card mb-4">
                    <div class="card-header bg-secondary">
                        <h5>Phương thức thanh toán</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod"
                                   checked>
                            <label class="form-check-label" for="cod">
                                Thanh toán khi giao hàng (COD)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="vnpay"
                                   value="vnpay">
                            <label class="form-check-label" for="vnpay">
                                Thanh toán bằng VNPAY
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Nút xác nhận -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-check-circle"></i> Xác nhận thanh toán
                    </button>
                </div>
            </form>
        </div>

        <!-- Thông tin giỏ hàng -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info">
                    <h5>Thông tin giỏ hàng</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <!-- Sản phẩm trong giỏ hàng -->
                        <?php foreach($carts as $cart) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0"><?=$cart['name']?></h6>
                                <img src="<?=$cart['image']?>" width="40" alt="Product Image">
                                <small class="text-muted">Số lượng: <?=$cart['quantity']?></small>
                            </div>
                            <span><?=number_format($cart['price'] *$cart['quantity'])?> VNĐ</span>
                        </li>
                        <?php endforeach?>
                    </ul>
                </div>
                <!-- Tổng tiền -->
                <div class="card-footer text-end fw-bold">
                    Tổng tiền: <span class="text-danger"><?=number_format($sumPrice)?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>


<style>
    /* Thêm một số cải tiến về giao diện */
.container {
    background-color: #f8f9fa; /* Nền trang sáng */
    padding: 30px 0; /* Padding cho toàn bộ container */
}

.card {
    border-radius: 10px; /* Bo góc card */
    border: 1px solid #dee2e6; /* Viền nhẹ */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bóng đổ nhẹ */
}

.card-header {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 15px;
    color: #fff;
    font-weight: bold;
}

.card-body {
    padding: 20px;
}

/* Thay đổi màu sắc card header */
.card-header.bg-primary {
    background-color: #007bff !important;
}

.card-header.bg-secondary {
    background-color: #6c757d !important;
}

.card-header.bg-info {
    background-color: #17a2b8 !important;
}

/* Nút Submit */
.btn-success {
    background-color: #28a745;
    border-color: #28a745;
    font-size: 1.2rem;
    padding: 12px 25px;
    border-radius: 50px;
}

.btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

/* Thêm hiệu ứng hover cho các mục trong giỏ hàng */
.list-group-item {
    transition: all 0.3s ease;
}

.list-group-item:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

/* Điều chỉnh kiểu cho các phần tử form */
.form-label {
    font-weight: 500;
}

.form-control {
    border-radius: 10px; /* Bo góc input */
    box-shadow: none;
    border: 1px solid #ccc;
    font-size: 1rem;
    padding: 10px;
}

.form-control:focus {
    border-color: #007bff; /* Màu border khi focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Thêm khoảng cách cho các mục thông tin người nhận */
.mb-3 {
    margin-bottom: 20px !important;
}

/* Căn chỉnh chữ và thẻ */
.text-end {
    text-align: end;
}

.text-muted {
    font-size: 0.9rem;
}

</style>
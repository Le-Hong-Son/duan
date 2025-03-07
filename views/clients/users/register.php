<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="container">
                <h2>Đăng ký</h2>
                <form action="<?= ROOT_URL . '?ctl=register'?> " method = "POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" name="fullname" 
                        placeholder="Nhập họ tên">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" 
                        placeholder="Nhập Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" 
                        placeholder="Nhập mật khẩu">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Điện thoại</label>
                        <input type="text" class="form-control" name="phone" 
                        placeholder="Nhập SDT">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" 
                        placeholder="Nhập địa chỉ">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Ghi đè màu của nút đăng nhập */
.btn-primary {
    background-color: #FF3366 !important; /* Đổi màu cam */
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: red !important; /* Màu cam đậm hơn khi hover */
}

/* Tùy chỉnh input */
.form-control {
    border-radius: 8px !important;
    border: 1px solid #ccc !important;
    padding: 12px !important;
    font-size: 16px;
}

.form-control:focus {
    border-color: #ff5722 !important;
    box-shadow: 0 0 5px rgba(255, 87, 34, 0.5) !important;
}

</style>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
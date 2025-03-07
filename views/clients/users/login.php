
<?php include_once ROOT_DIR . "views/clients/header.php" ?>
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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php  if($message !='') : ?>
                <div class="alert alert-succes">
                    <?= $message?>
                </div>
                
            <?php endif ?>
            <?php  if($error) : ?>
                <div class="alert alert-danger">
                    <?= $error?>
                </div>
            <?php endif?>
            <!-- Thông báo đăng nhập thất bại -->
            <!-- dang nhap -->
            <div class="container">
                <h2>Đăng nhập</h2>
                <form action="<?= ROOT_URL . '?ctl=login' ?> " method = "POST">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="loginEmail" 
                        placeholder="Nhập Email">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="loginPassword"
                        placeholder="Nhập mật khẩu">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                </form>
                
            </div>
        </div>
    </div>
</div>



<?php include_once ROOT_DIR . "views/clients/footer.php" ?>

<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5>Thêm danh mục mới</h5>
        </div>
        <div class="card-body">
            <form action="<?= ADMIN_URL . '?ctl=storedm' ?>" method="post" enctype="multipart/form-data">
                <!-- Tên danh mục -->
                <div class="mb-3">
                    <label for="cate_name" class="form-label">Tên danh mục</label>
                    <input type="text" name="cate_name" id="cate_name" class="form-control" placeholder="Nhập tên danh mục" required>
                </div>

                <!-- Loại sản phẩm -->
                <div class="mb-3">
                    <label class="form-label">Loại sản phẩm</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="type1" value="1" checked>
                        <label class="form-check-label" for="type1">Quần/Áo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="type2" value="0">
                        <label class="form-check-label" for="type2">Sản phẩm theo mùa</label>
                    </div>
                </div>

                <!-- Nút thêm -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>

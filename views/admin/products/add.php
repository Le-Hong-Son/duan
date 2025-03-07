<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5>Thêm sản phẩm mới</h5>
        </div>
        <div class="card-body">
            <form action="<?= ADMIN_URL . '?ctl=storesp' ?>" method="post" enctype="multipart/form-data">
                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label for="product_name" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" id="product_name" class="form-control" placeholder="Nhập tên sản phẩm" required>
                </div>

                <!-- Danh mục -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <?php foreach ($categories as $cate) : ?>
                            <option value="<?= $cate['id'] ?>">
                                <?= $cate['cate_name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Hình ảnh -->
                <div class="mb-3">
                    <label for="product_image" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" id="product_image" class="form-control" required>
                </div>

                <!-- Giá -->
                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Nhập giá sản phẩm" required>
                </div>

                <!-- Số lượng -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Nhập số lượng" required>
                </div>

                <!-- Trạng thái kinh doanh -->
                <div class="mb-3">
                    <label class="form-label">Trạng thái kinh doanh</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1" checked>
                        <label class="form-check-label" for="status_active">Đang kinh doanh</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0">
                        <label class="form-check-label" for="status_inactive">Ngừng kinh doanh</label>
                    </div>
                </div>

                <!-- Mô tả -->
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="description" rows="6" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>

                <!-- Nút thêm -->
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>

<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5>Chỉnh sửa danh mục</h5>
        </div>
        <div class="card-body">
            <!-- Hiển thị thông báo -->
            <?php if ($message != '') : ?>
                <div class="mt-3 mb-3 alert alert-success">
                    <?= $message ?>
                </div>
            <?php endif ?>

            <!-- Form chỉnh sửa danh mục -->
            <form action="<?= ADMIN_URL . '?ctl=updatedm' ?>" method="post">
                <!-- Tên danh mục -->
                <div class="mb-3">
                    <label for="cate_name" class="form-label">Tên danh mục</label>
                    <input type="text" name="cate_name" id="cate_name" value="<?= $category['cate_name'] ?>" class="form-control" required>
                </div>

                <!-- Loại sản phẩm -->
                <div class="mb-3">
                    <label class="form-label">Loại sản phẩm</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="type1" value="1" <?= $category['type'] ? 'checked' : '' ?>>
                        <label class="form-check-label" for="type1">Quần/Áo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="type2" value="0" <?= $category['type'] == 0 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="type2">Sản phẩm theo mùa</label>
                    </div>
                </div>

                <!-- Input ẩn: ID danh mục -->
                <input type="hidden" name="id" value="<?= $category['id'] ?>">

                <!-- Nút cập nhật -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>

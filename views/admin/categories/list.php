<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <!-- Hiển thị thông báo -->
    <?php if ($message != '') : ?>
        <div class="mt-3 mb-3 alert alert-success">
            <?= $message ?>
        </div>
    <?php endif ?>

    <!-- Bảng danh mục -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách danh mục</h5>
            <a href="<?= ADMIN_URL . '?ctl=adddm' ?>" class="btn btn-primary">Thêm mới</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Loại sản phẩm</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $cate): ?>
                        <tr>
                            <th scope="row"><?= $cate['id'] ?></th>
                            <td><?= $cate['cate_name'] ?></td>
                            <td><?= $cate['type'] ? 'Quần/Áo' : 'Sản phẩm theo mùa' ?></td>
                            <td class="text-center">
                                <a href="<?= ADMIN_URL . '?ctl=editdm&id=' . $cate['id'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                                <a href="<?= ADMIN_URL . '?ctl=deletedm&id=' . $cate['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>

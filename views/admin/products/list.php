<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content">
    <?php if ($message != '') : ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Giá Sản Phẩm</th>
                <th scope="col">Số Lượng Sản Phẩm</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Loại</th>
                <th scope="col">
                    <a href="<?= ADMIN_URL . '?ctl=addsp' ?>" class="btn btn-primary">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $pro) : ?>
                <tr>
                    <th scope="row"><?= $pro['id'] ?></th>
                    <td><?= $pro['name'] ?></td>
                    <td>
                        <img src="<?= ROOT_URL . $pro['image'] ?>" width="60" alt="">
                    </td>
                    <td><?= $pro['price'] ?></td>
                    <td><?= $pro['quantity'] ?></td>
                    <td><?= $pro['status'] ? 'Đang kinh doanh' : 'Ngừng kinh doanh' ?></td>
                    <td><?= $pro['cate_name'] ?></td>
                    <td>
                        <a href="<?= ADMIN_URL . '?ctl=editsp&id=' . $pro['id'] ?>" class="btn btn-primary">Sửa</a>
                        <a href="<?= ADMIN_URL . '?ctl=deletesp&id=' . $pro['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
<style>/* Tổng thể */
body {
    background-color: #ffffff;
    color: #333333;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    margin-top: 20px;
}

/* Cải tiến bảng */
.table {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.table th {
    background-color: #f1f3f5;
    color: #495057;
    font-weight: bold;
    text-align: center;
    padding: 10px;
}

.table td {
    vertical-align: middle;
    text-align: center;
    padding: 10px;
    color: #495057;
}

/* Hình ảnh */
.table img {
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 60px;
    height: auto;
}

/* Nút */
.btn-primary {
    background-color: #007bff;
    border: none;
    color: #ffffff;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.2s;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.btn-danger {
    background-color: #dc3545;
    border: none;
    color: #ffffff;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.2s;
}

.btn-danger:hover {
    background-color: #a71d2a;
    transform: scale(1.05);
}

/* Khoảng cách và thông báo */
.alert {
    margin-top: 15px;
    text-align: center;
    font-size: 16px;
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    padding: 10px;
}

/* Responsive bảng */
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.table th, .table td {
    white-space: nowrap;
}
</style>

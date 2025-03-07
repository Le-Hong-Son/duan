<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container">
    <div>
        <div class="mb-4">
            <h3>Thông tin khách hàng</h3>
            <p><strong>Họ tên: </strong><?=$user['fullname']?></p>
            <p><strong>Email: </strong><?=$user['email']?></p>
            <p><strong>Số điện thoại: </strong><?=$user['phone']?></p>
            <p><strong>Địa chỉ: </strong><?=$user['address']?></p>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Phương thức thanh toán</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày mua</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php   foreach($orders as $order) : ?>
            <tr>
                <th scope="row"><?=$order['id']?></th>
                <td><?=$order['payment_method']?></td>
                <td><?=getOrderStatus($order['status'])?></td>
                <td><?=number_format($order['total_price'])?> VNĐ</td>
                <td><?=$order['create_at']?></td>
                <td>
                    <a href="<?=ROOT_URL .'?ctl=order-detail-user&id=' .$order['id']?>" class="btn btn-primary">Chi tiết</a>
                    Hủy
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
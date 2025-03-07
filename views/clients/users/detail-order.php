<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="content ">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Chi tiết đơn hàng</h4>
        </div>
        <div class="card-body">
            <!-- thông tin đơn hàng -->
            <div class="mb-4">
                <h5> Mã đơn hàng: #<?= $order['id']?></h5>
                <p><strong>Ngày đặt hàng: </strong><?= date('d/m/Y',strtotime($order['create_at']))?></p>
                <p><strong>Trạng thái: </strong><span class="badge bg-success"><?=getOrderStatus($order['status'])?></span></p>
            </div>
            <div class="mb-4">
                <!-- Thông tin khách hàng -->
                <h5>Thông tin khách hàng</h5>
                <p><strong>Họ tên: </strong><?= $order['fullname']?></p>
                <p><strong>Email: </strong><?= $order['email']?></p>
                <p><strong>Điện thoại: </strong><?= $order['phone']?></p>
                <p><strong>Địa chỉ: </strong><?= $order['address']?></p>
            </div>
            <div class="mb-4">
                <h5>Danh sách sản phẩm</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($order_details as $stt =>$detail) :?>
                        <tr>
                            <td><?=$stt +1?></td>
                            <td><?=$detail['name']?></td>
                            <td><img src="<?=ROOT_URL . $detail['image']?>" alt="" width="60"></td>
                            <td><?=$detail['quantity']?></td>
                            <td><?= number_format( $detail['price'])?> VND</td>
                            <td><?=number_format( $detail['price']*$detail['quantity'])?> VND </td>
                        </tr>
                        <?php   endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-end" colspan="5">Tổng cộng:</th>
                            <th><?=number_format( $order['total_price'])?> VND </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-between">
                <a href="" class="btn btn-secondary">Quay lại danh sách đơn hàng </a>
                    <?php   if ($order['status'] === 1) :?>
                    <form action="" method="post">
                        <button class="btn btn-danger">Hủy đơn hàng</button>
                    </form>
                    <?php endif ?>
                
            </div>
        </div>
    </div>
</div>


<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
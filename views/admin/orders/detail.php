<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="content ">
    <?php 
    if($message != "") : ?>
    <div class="alert alert-success">
        <?= $message ?>
    </div>
    <?php endif ?>
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Chi tiết đơn hàng</h4>
        </div>
        <div class="card-body">
            <!-- thông tin đơn hàng -->
            <div class="mb-4">
                <h5> Mã đơn hàng: #<?= $order['id']?></h5>
                <p><strong>Ngày đặt hàng: </strong><?= date('d-m-Y H:i:s',strtotime($order['create_at']))?></p>
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
                            <td><?=number_format( $detail['price']*$detail['quantity'])?> VND    </td>
                        </tr>
                        <?php   endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-end" colspan="5">Tổng cộng:</th>
                            <th><?=number_format( $order['total_price'])?> VND  </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Cập nhật trạng thái đơn hàng -->
             <div class="mb-4">
                <h5>Cập nhật trạng thái đơn hàng</h5>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="orderStatus" class="form-label">Trạng thái đơn hàng</label>
                        <select name="status" id="orderStatus" class="form-select">
                            <?php   foreach($status as $key=>$value) :?>
                            <option value="<?=$key?>"
                                <?= $order['status'] == $key ? 'selected': '' ?>
                                <?php 
                                if($order['status'] == 2 && in_array($key , [1,4])){
                                    echo "disabled";
                                }elseif ($order['status'] == 3 && in_array($key , [1,4,2])){
                                    echo "disabled";
                                }elseif ($order['status'] == 4 && in_array($key , [1,3,2])){
                                    echo "disabled";
                            }
                                ?>
                                >
                                <?= $value?>
                            </option>
                            <?php endforeach?>
                           
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>         
                </form>
             </div>
        </div>

    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
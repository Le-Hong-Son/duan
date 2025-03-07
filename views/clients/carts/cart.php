<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Giỏ hàng của bạn</h1>
    <form action="<?= ROOT_URL . '?ctl=update-cart'?>" method="POST">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($carts as $id => $cart) : ?>
                    <tr>
                        <th scope="row"><?=$id?></th>
                        <td>
                            <img src="<?=$cart['image']?>" alt="<?=$cart['name']?>" class="img-fluid img-thumbnail" style="max-width: 80px; height: auto;">
                        </td>
                        <td><?=$cart['name']?></td>
                        <td><?=number_format($cart['price'])?> VNĐ</td>
                        <td>
                            <input type="number" name="quantity[<?=$id?>]" class="form-control quantity-input"
                                value="<?=$cart['quantity']?>" min="1">
                        </td>
                        <td><?=number_format($cart['price']*$cart['quantity'])?> VNĐ</td>
                        <td>
                            <a href="<?= ROOT_URL . '?ctl=delete-cart&id=' .$id?>" class="btn btn-danger btn-sm delete-btn">
                                <i class="bi bi-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
                        <td colspan="2" class="fw-bold text-danger"><?=number_format($sumPrice)?> VNĐ</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Nút hành động -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="<?= ROOT_URL ?>" class="btn btn-secondary continue-shopping">
                <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
            </a>
            <div>
                <button type="submit" class="btn btn-warning update-cart-btn me-2">
                    <i class="bi bi-arrow-clockwise"></i> Cập nhật giỏ hàng
                </button>
                <a href="<?= ROOT_URL . '?ctl=view-checkout'?>" class="btn btn-success checkout-btn">
                    <i class="bi bi-credit-card"></i> Thanh toán
                </a>
            </div>
        </div>
    </form>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>

<!-- Custom CSS -->
<style>
    /* Custom table styles */
    .table th, .table td {
        vertical-align: middle;
    }

    .table th {
        text-align: center;
        font-size: 1rem;
    }

    .table td {
        font-size: 1rem;
    }

    /* Styling for quantity input */
    .quantity-input {
        width: 80px;
        text-align: center;
    }

    /* Button styles */
    .update-cart-btn, .continue-shopping, .checkout-btn {
        padding: 0.6rem 1.2rem;
        font-size: 1rem;
    }

    .delete-btn {
        font-size: 0.9rem;
        padding: 0.3rem 0.6rem;
    }

    .delete-btn:hover {
        background-color: #f44336;
    }

    /* Custom background and text for header */
    .table-primary {
        background-color: #007bff !important;
        color: white;
    }

    .table-light {
        background-color: #f8f9fa !important;
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
        .table-responsive {
            margin-bottom: 1rem;
        }

        .table th, .table td {
            padding: 0.5rem;
        }

        .quantity-input {
            width: 60px;
        }

        .continue-shopping, .update-cart-btn, .checkout-btn {
            font-size: 0.9rem;
        }
    }
</style>

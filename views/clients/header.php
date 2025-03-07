<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunarie <?= $title ?? '' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container w-80">
        <nav class="navbar navbar-expand-lg body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img
                        src="https://i.pinimg.com/736x/02/2f/ad/022fad23883956c889eef26f0b4794cd.jpg" width="100px"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ;">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= ROOT_URL?>">Trang Chủ</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu">
                                <?php if (!empty($categories)) : ?>
                                <?php foreach ($categories as $cate) : ?>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                        <?= $cate['cate_name'] ?>
                                    </a>
                                </li>
                                <?php endforeach ?>
                                <?php else : ?>
                                <li>
                                    <a class="dropdown-item" href="#">Không có danh mục</a>
                                </li>
                                <?php endif ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?=ROOT_URL?>" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://thumbs.dreamstime.com/b/user-account-icon-person-solid-logo-illustration-pictog-pictogram-isolated-white-90235639.jpg"
                                    width="40" alt="">
                                <?= $_SESSION['user']['fullname'] ?? '' ?>
                            </a>

                            <ul class="dropdown-menu">
                                <?php   if(isset($_SESSION['user'])) :?>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT_URL?>">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=list-order' ?>">
                                        Lịch sử đơn hàng
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=logout' ?>">
                                        Đăng Xuất
                                    </a>
                                </li>
                                <?php   else :?>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=login' ?>">
                                        Đăng nhập
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=register' ?>">
                                        Đăng ký
                                    </a>
                                </li>

                                <?php  endif  ?>

                            </ul>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL .'?ctl=view-cart'?>">Giỏ hàng
                                (<?= $_SESSION['totalQuantity'] ?? '0'   ?>)</a>

                        </li>
                    </ul>
                    <form class="d-flex">
                        <input type="input" id="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                        <button type="button" id="btnSearch" class="btn btn-primary ms-2">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </nav>
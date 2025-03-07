<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?= $title ?? 'Lunarie' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            height: 100%;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            z-index: 1000;
            position: sticky;
            top: 0;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center py-3">Lunarie</h4>
        <a href="<?= ADMIN_URL ?>"><i class="bi bi-house"></i> Home</a>
        <a href="<?= ADMIN_URL . '?ctl=listdm' ?>"><i class="bi bi-card-list"></i> Danh mục</a>
        <a href="<?= ADMIN_URL . '?ctl=listsp' ?>"><i class="bi bi-box"></i> Sản phẩm</a>
        <a href="<?= ADMIN_URL . '?ctl=listuser' ?>"><i class="bi bi-people"></i> Tài khoản</a>
        <a href="<?= ADMIN_URL . '?ctl=list-order' ?>"><i class="bi bi-cart"></i> Đơn hàng</a>
        <a href="<?= ADMIN_URL . '?ctl=productcomment' ?>"><i class="bi bi-cart"></i>Comment</a>
        <a href="<?= ADMIN_URL . '?ctl=logout' ?>" class="text-danger"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
    </div>

    <!-- Content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Lunarie</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <form class="d-flex ms-auto" action="<?= ADMIN_URL . '?ctl=search' ?>" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="q">
                        <button class="btn btn-outline-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Nội dung trang -->
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Contact</title>
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["assets/css/fonts.min.css"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table thead th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .sidebar .nav-item a {
            margin-bottom: 5px;
        }
        footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <a href="index.php" class="logo">
                    <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item">
                            <a href="index.php">
                                <i class="fas fa-home"></i>
                                <p>Trang chủ</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <h4 class="text-section">Quản lý</h4>
                        </li>
                        <li class="nav-item">
                            <a href="Quản lý tài sản.php">
                                <i class="icon-book-open"></i>
                                <span class="sub-item">Quản lý tài sản</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Quản lý bảo trì.php">
                                <i class="icon-menu"></i>
                                <span class="sub-item">Quản lý bảo trì</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="QUản lý người dùng.php">
                                <i class="icon-envelope"></i>
                                <span class="sub-item">Quản lý người dùng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Order.php">
                                <i class="icon-calendar"></i>
                                <span class="sub-item">Đơn đặt hàng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="baocao.php">
                                <i class="icon-chart"></i>
                                <span class="sub-item">Báo cáo</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
                <form method="GET" class="navbar-left navbar-form nav-search p-0 d-none d-lg-flex">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="Search ..." class="form-control" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pe-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mt-5">
        <?php
        include("connect.php");
        include("control.php");

        $user = new data_user();

        // Xử lý xóa tài khoản
        if (isset($_POST['delete']) && isset($_POST['Id_User'])) {
            $idToDelete = intval($_POST['Id_User']); // Ép kiểu sang số nguyên
            $deleteResult = $user->delete_user($idToDelete);

            if ($deleteResult) {
                echo "Xóa tài khoản thành công.";
            } else {
                echo '<div class="alert alert-danger text-center">Xóa tài khoản thất bại. Vui lòng thử lại.</div>';
            }
        }

        $users = $user->select_all_users();
        ?>
        <h1 class="mb-4 text-center">Danh Sách Người Dùng</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Mật khẩu</th>
                    <th>Quyền người dùng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($users && $users->num_rows > 0) {
                    while ($userRow = $users->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($userRow['Id_User']); ?></td>
                    <td><?php echo htmlspecialchars($userRow['username']); ?></td>
                    <td><?php echo htmlspecialchars($userRow['password']); ?></td>
                    <td><?php echo htmlspecialchars($userRow['role']); ?></td>
                    <td>
                        <!-- Form cập nhật -->
                        <form method="GET" action="update_user.php" style="display:inline;">
                            <input type="hidden" name="Id_User" value="<?php echo htmlspecialchars($userRow['Id_User']); ?>">
                            <button type="submit" class="btn btn-warning btn-sm">Cập nhật</button>
                        </form>
                        <!-- Form xóa -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="Id_User" value="<?php echo htmlspecialchars($userRow['Id_User']); ?>">
                            <button type="submit" name="delete" value="delete" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                        </form>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                ?>
                <tr>
                    <td colspan="5" class="text-center">Không có người dùng nào.</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <footer class="footer bg-dark text-white text-center py-3">
        <p>&copy; 2024 - Đại Học Phương Đông - Hệ Thống Quản Lý Cơ Sở Vật Chất</p>
        <p><i class="fas fa-phone"></i> 0243 623 0234</p>
        <p><i class="fas fa-envelope"></i> contact@phuongdong.edu.vn</p>
        <p><i class="fas fa-map-marker-alt"></i> Cơ sở 1: 171 Trung Kính, Yên Hòa, Cầu Giấy, Hà Nội</p>
        <p><i class="fas fa-map-marker-alt"></i> Cơ sở 2: Số 4, ngõ chùa Hưng, phố Minh Khai, Hai Bà Trưng, Hà Nội</p>

        <div class="socials mt-3">
            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://discord.com/" target="_blank"><i class="fa-brands fa-discord"></i></a>
        </div>
    </footer>

    <!-- JS Files -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/js/kaiadmin.min.js"></script>
</body>
</html>

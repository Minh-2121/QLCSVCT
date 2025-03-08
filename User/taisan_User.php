<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Quản Lý Tài Sản</title>
    <style>
        .banner-text h1 {
            color: #ffffff; /* Màu trắng */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.81); /* Đổ bóng để làm nổi bật văn bản */
        }
        .banner-text p {
            color: #f8f9fa; /* Màu trắng nhạt */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.81); /* Đổ bóng để làm nổi bật văn bản */
        }
    </style>
</head>
<body>
<header>
        <div class="banner">
            <img src="img/banner.png" alt="Banner Trường Đại Học">
            <div class="banner-text">
                <h1>Quản Lý Cơ Sở Vật Chất Đại Học</h1>
                <p>Hệ thống quản lý cơ sở vật chất hiện đại, tối ưu cho trường đại học</p>
                <a href="#" class="btn">Tìm Hiểu Thêm</a>
            </div>
        </div>
    </header>
    
    <nav>
        <div class="nav-container">
            <div class="logo">
                <a href="#">
                    <img src="img/logoql.png" alt="logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="taisan_User.php">Quản lý tài sản</a></li>
                <li><a href="baotri.php">Bảo trì</a></li>
                <li><a href="baocao.php">Báo Cáo</a></li>
                <li><a href="lienhe.php">Liên Hệ</a></li>
            </ul>
            <div class="right-section">
            <form method="GET">
            <div class="search-box">
            <input type="text" name="search" placeholder="Tìm kiếm tài sản..." 
               value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
           <button type="submit"><i class="fas fa-search"></i></button>
           </div>
           </form>

                <?php if (isset($_SESSION["user"])) {
              ?>
              <i class="login-btn"> Hello <?php echo $_SESSION['user'] ?></i>
          
                <a href="logout.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Xuất
                </a>
                <?php } else { ?>
                    <a href="signin.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Nhập
                    <a href="signup.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Ký
                </a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <main>
    <section id="assetList">
        <h2>Danh Sách Tài Sản</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Tên Tài Sản</th>
                    <th>Hình ảnh</th>
                    <th>Loại tài sản</th>
                    <th>Tình trạng</th>
                    <th>Vị trí</th>
                    <th>Ngày nhập</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("connect.php");
                include("control.php");
                $user = new data_user();
                 // Kiểm tra từ khóa tìm kiếm
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $keyword = $_GET['search'];
                $assets = $user->search_Assets($keyword); // Gọi hàm tìm kiếm
            } else {
                $assets = $user->select_Assets(); // Gọi hàm lấy danh sách tài sản
            }
                if ($assets) {
                    while ($row = mysqli_fetch_assoc($assets)) {
                        echo "<tr>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td><img src='../Admin/uploads/" . $row['Img'] . "' width='100'></td>";
                        echo "<td>" . $row['Type'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['Location'] . "</td>";
                        echo "<td>" . $row['PurchaDate'] . "</td>";  
                    }
                } else {
                    echo "<tr><td colspan='7'>Không có tài sản nào!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
    </main>
    <section class="footer">
        <div class="visit-us">
            <p>&copy; 2024 - Đại Học Phương Đông  - Hệ Thống Quản Lý Cơ Sở Vật Chất</p>
            <p><i class="fas fa-phone"></i>  0243 623 0234</p>
            <p><i class="fas fa-envelope"></i>  contact@phuongdong.edu.vn</p>
            <p><i class="fas fa-map-marker-alt"></i>  Cơ sở 1: 171 Trung Kính, Yên Hòa, Cầu Giấy, Hà Nội</p>
            <p><i class="fas fa-map-marker-alt"></i>  Cơ sở 2: Số 4, ngõ chùa Hưng, phố Minh Khai, Hai Bà Trưng, Hà Nội</p>
        </div>
        <div class="socials">
            <h3>FOLLOW OUR SOCIALS</h3>
            <p>
                <a href="https://www.instagram.com/" target="_blank"> 
                    <i class="fa-brands fa-instagram"></i> 
                </a>
                <a href="https://www.facebook.com/" target="_blank"> 
                    <i class="fa-brands fa-facebook-f"></i> 
                </a>
                <a href="https://discord.com/" target="_blank"> 
                    <i class="fa-brands fa-discord"></i> 
                </a>
                
            </p>
        </div>
    </section>
</body>
</html>

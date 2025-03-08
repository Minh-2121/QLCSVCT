<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/dangnhap.css">
        <link rel="shortcut icon" type="image/x-icon" href="/assets/img_landing/favicon.png">
        <title>Đăng nhập - Phương Đông</title>
    </head>
    <body>
        <div class="landing">
            <div class="landing-info">
                <div class="logo">
                    <img src="img/logoql.png" alt="Phương Đông" />
                </div>
                <h2 class="landing-info-pretitle">Chào mừng bạn đã tới</h2>
                <h1 class="landing-info-title">Phương Đông</h1>
                <p class="landing-info-text">Trang đăng nhập của Đại học Phương Đông</p>
                <ul class="tab-switch">
                    <li class="tab-switch-button"><a href="index.php">Trang Chủ</a></li>
                    <li class="tab-switch-button"><a href="signup.php">Đăng Ký</a></li>
                </ul>
            </div>

            <div class="landing-form">
                <div class="form-box">
                    <img class="form-box-decoration" src="img/rocket.png" alt="Rocket">
                    <h2 class="form-box-title">Đăng nhập</h2>
                    
                    <!-- Form đăng nhập -->
                    <form class="form" method="POST" action="">
                        <div class="form-row">
                            <div class="form-item">
                                <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                            </div>
                        </div>

                        <div class="form-row space-between">
                            <div class="form-item">
                                <label class="show-password">
                                    <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()">
                                    Hiển thị mật khẩu
                                </label>
                            </div>
                            <div class="form-item">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </div>

                        <div class="form-row">
                            <button class="button medium secondary" type="submit" name="submit">Đăng Nhập</button>
                        </div>
                    </form>
                    <?php
                       include("control.php");
                       $get_Data = new data_user();

                      if (isset($_POST['submit'])) {
                         $username = $_POST['username'];
                         $password = $_POST['password'];

    // Gọi hàm login
                        $user = $get_Data->login($username, $password);
           
                     if ($user) {
        // Đăng nhập thành công
                     $_SESSION['username'] = $user['username'];
                     $_SESSION['role'] = $user['role'];

        // Điều hướng theo vai trò
                    if ($user['role'] == 'admin') {
                    echo "<script>alert('Đăng nhập thành công (Admin)'); window.location='Admin/Trangchu.php';</script>";
                   } else {
                     echo "<script>alert('Đăng nhập thành công (User)'); window.location='index.php';</script>";
                 }
                   } else {
        // Đăng nhập thất bại
                  echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu');</script>";
    }
}
?>

                </div>
            </div>
        </div>

        <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }
        </script>
    </body>
</html>

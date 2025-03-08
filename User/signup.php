<?php
include("control.php");
$get_Data = new data_user();

if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['role'])) {
        if ($_POST['password'] != $_POST['confirm_password']) {
            echo "<script>alert('Mật khẩu không khớp')</script>";
        } else {
            // Kiểm tra xem tên đăng nhập đã tồn tại chưa
            $select = $get_Data->select_user($_POST['username']);
            if ($select->num_rows > 0) {
                echo "<script>alert('Tên đăng nhập đã tồn tại')</script>";
            } else {
                // Mã hóa mật khẩu
                $hashed_password = $_POST['password'];
                                $role = $_POST['role'];

                                // Nếu muốn tạo tài khoản admin, bạn cần chắc chắn người tạo tài khoản này có quyền admin
                if ($role == 'admin') {
                    // Kiểm tra nếu người dùng đang đăng nhập là admin
                    if (!isset($_SESSION['user']) || $_SESSION['role'] != 'admin') {
                        echo "<script>alert('Chỉ quản trị viên mới có thể tạo tài khoản admin')</script>";
                    } else {
                        // Chèn người dùng mới vào cơ sở dữ liệu
                        $insert = $get_Data->insert_User($_POST['username'], $hashed_password, $role);
                        if ($insert) {
                            echo "<script>alert('Tạo tài khoản admin thành công'); window.location='signin.php';</script>";
                        } else {
                            echo "<script>alert('Tạo tài khoản admin thất bại')</script>";
                        }
                    }
                } else {
                    // Nếu tạo tài khoản người dùng, không cần kiểm tra quyền admin
                    $insert = $get_Data->insert_User($_POST['username'], $hashed_password, $role);
                    if ($insert) {
                        echo "<script>alert('Tạo tài khoản người dùng thành công'); window.location='signin.php';</script>";
                    } else {
                        echo "<script>alert('Tạo tài khoản người dùng thất bại')</script>";
                    }
                }
            }
        }
    } else {
        echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/dangnhap.css">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img_landing/favicon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="landing">
    <div class="landing-decoration"></div>

    <div class="landing-info">
        <div class="logo">
            <img src="img/logoql.png" alt="Phương Đông" />
        </div>
        <h2 class="landing-info-pretitle">Chào mừng bạn đã tới</h2>
        <h1 class="landing-info-title">Phương Đông</h1>
        <p class="landing-info-text">Trang đăng ký của Đại học Phương Đông</p>
        <ul class="tab-switch">
            <li class="tab-switch-button login-register-form-trigger"><a href="index.php">Trang Chủ</a></li>
            <li class="tab-switch-button login-register-form-trigger"><a href="signin.php">Đăng Nhập</a></li>
        </ul>
    </div>

    <div class="landing-form">
        <div class="form-box login-register-form-element">
            <img class="form-box-decoration" src="rocket.png" alt="Rocket">
            <h2 class="form-box-title">Đăng ký</h2>

            <form class="form" method="POST" action="">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

                <div class="form-row">
                    <div class="form-item">
                        <div class="form-input">
                            <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-item">
                        <div class="form-input">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-item">
                        <div class="form-input">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Xác nhận mật khẩu" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                  <div class="form-item">
                  <label for="role">Chọn vai trò</label>
                  <select name="role" id="role" required>
                  <option value="user">Người dùng</option>
                  <option value="admin">Quản trị viên</option>
                  </select>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-item">
                        <button class="button medium primary" type="submit" name="submit">Đăng ký ngay!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

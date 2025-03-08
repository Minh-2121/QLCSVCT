<?php
// Bao gồm file chứa hàm updateUser
include'control.php';  // Đảm bảo đường dẫn đúng

// Lấy ID người dùng từ URL
$user_id = isset($_GET['Id_User']) ? $_GET['Id_User'] : 0;
$user = null;

// Nếu có ID người dùng hợp lệ, truy vấn thông tin người dùng
if ($user_id > 0) {
    $result = $mysqli->query("SELECT * FROM user WHERE Id_User = $user_id");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
}

// Xử lý cập nhật thông tin người dùng khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form
    $user_id = $_POST['Id_User'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Gọi hàm updateUser từ control.php để cập nhật
    $updateResult = updateUser($user_id, $username, $password, $role, $mysqli);

    // Kiểm tra kết quả của việc gọi hàm updateUser
    if ($updateResult) {
        echo "Cập nhật thành công!";
    } else {
        echo "Lỗi khi cập nhật!";
    }
}

// Đóng kết nối cơ sở dữ liệu
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>

    <h2>Chỉnh sửa thông tin người dùng</h2>

    <?php if ($user): ?>
        <form action="update_user.php" method="post">
            <input type="hidden" name="Id_User" value="<?php echo $user['Id_User']; ?>">

            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br><br>

            <label for="pass">Mật khẩu:</label>
            <input type="password" id="pass" name="password"><br><br>

            <label for="role">Vai trò:</label>
            <input type="text" id="role" name="role" value="<?php echo $user['role']; ?>"><br><br>

            <input type="submit" value="Cập nhật">
        </form>
    <?php else: ?>
        <p>Không tìm thấy người dùng này.</p>
    <?php endif; ?>

</body>
</html>

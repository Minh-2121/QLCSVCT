<?php
include("connect.php");

class data_user
{
    // Hàm thêm tài sản
    public function insert_assets($name, $img, $type, $status, $location, $purchaDate)
    {
        global $conn;
        $sql = "INSERT INTO assets (Name, Img, Type, Status, Location, PurchaDate) 
                VALUES ('$name', '$img', '$type', '$status', '$location', '$purchaDate')";
        $run = mysqli_query($conn, $sql);

        // Kiểm tra nếu có lỗi trong truy vấn
        if (!$run) {
            echo "Error: " . mysqli_error($conn);
        }

        return $run;
    }

    // Hàm lấy danh sách tài sản
    public function select_Assets()
    {
        global $conn;
        $sql = "SELECT * FROM assets";
        $run = mysqli_query($conn, $sql);
        return $run;  // Trả về kết quả truy vấn
    }
    public function search_Assets($keyword) {
        global $conn;
        $sql = "SELECT * FROM assets WHERE Name LIKE ? OR Type LIKE ? OR Location LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchKey = "%" . $keyword . "%";
        $stmt->bind_param("sss", $searchKey, $searchKey, $searchKey);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Hàm xóa tài sản
    public function delete_assets($id_con)
{
    global $conn;
    
    // Xóa bản ghi trong bảng maintenance trước
    $sql_maintenance = "DELETE FROM maintenance WHERE Id_Assets = ?";
    $stmt_maintenance = mysqli_prepare($conn, $sql_maintenance);
    mysqli_stmt_bind_param($stmt_maintenance, "i", $id_con);
    
    // Kiểm tra việc xóa bản ghi maintenance
    if (!mysqli_stmt_execute($stmt_maintenance)) {
        echo "Error deleting from maintenance: " . mysqli_error($conn);
        mysqli_stmt_close($stmt_maintenance);
        return false;
    }
    mysqli_stmt_close($stmt_maintenance);

    // Sau đó xóa bản ghi trong bảng assets
    $sql_assets = "DELETE FROM assets WHERE Id_Assets = ?";
    $stmt_assets = mysqli_prepare($conn, $sql_assets);
    mysqli_stmt_bind_param($stmt_assets, "i", $id_con);

    // Kiểm tra việc xóa bản ghi trong bảng assets
    if (!mysqli_stmt_execute($stmt_assets)) {
        echo "Error deleting from assets: " . mysqli_error($conn);
        mysqli_stmt_close($stmt_assets);
        return false;
    }
    mysqli_stmt_close($stmt_assets);
    
    return true;
}


    public function select_AssetById($id)
    {
        global $conn;
        $sql = "SELECT * FROM assets WHERE Id_Assets = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }
    // Hàm cập nhật tài sản
    public function update_assets($id_con, $name, $img, $type, $status, $location, $purchaDate)
    {
        global $conn;
        $sql = "UPDATE assets SET
                    Name = '$name', 
                    Img = '$img', 
                    Type = '$type', 
                    Status = '$status', 
                    Location = '$location', 
                    PurchaDate = '$purchaDate' 
                WHERE Id_Assets = '$id_con'";
        $run = mysqli_query($conn, $sql);

        // Kiểm tra nếu có lỗi trong truy vấn
        if (!$run) {
            echo "Error: " . mysqli_error($conn);
        }

        return $run;
    }
    //bao cao
    public function select_AssetsStatus()
    {
        global $conn;
        $sql = "SELECT * FROM assets WHERE Status = 'tốt'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // ham bao tri 
    public function select_Maintenance()
    {
        global $conn;
        $sql = "SELECT m.Id, m.MaintenanceDate, m.Description, m.MaintenanceStatus, a.Name AS AssetName
                FROM maintenance m
                JOIN assets a ON m.Id_Assets = a.Id_Assets";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_Maintenance_By_Date($start_date, $end_date)
    {
        global $conn;
        $sql = "SELECT m.Id, m.MaintenanceDate, m.Description, m.MaintenanceStatus, a.Name AS AssetName
                FROM maintenance m
                JOIN assets a ON m.Id_Assets = a.Id_Assets
                WHERE m.MaintenanceDate BETWEEN '$start_date' AND '$end_date'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    // nguoi dung 
   // Phương thức lấy tất cả người dùng
public function select_all_users()
{
    global $conn;
    $sql = "SELECT * FROM user";  // Lấy tất cả người dùng
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result(); // Trả về kết quả của truy vấn
}
public function delete_user($id) {
    global $conn;
    if ($conn === null) {
        die("Kết nối chưa được khởi tạo.");
    }
    $stmt = $conn->prepare("DELETE FROM user WHERE Id_User = ?");
    $stmt->bind_param("i", $id); // Gắn tham số kiểu số nguyên
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
function updateUser($user_id, $username, $password, $role, $mysqli) {
    // Nếu mật khẩu có thay đổi, mã hóa mật khẩu trước khi lưu
    if (!empty($password)) {
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    } else {
        // Nếu không thay đổi mật khẩu, giữ nguyên mật khẩu cũ
        // Lấy mật khẩu hiện tại của người dùng từ cơ sở dữ liệu
        $result = $mysqli->query("SELECT password FROM user WHERE Id_User = $user_id");
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $hashed_pass = $user['password'];  // Giữ mật khẩu cũ
        } else {
            return false;  // Nếu không tìm thấy người dùng, trả về false
        }
    }

    // Câu lệnh SQL để cập nhật người dùng
    if ($user_id > 0) {
        // Nếu có thay đổi mật khẩu, cập nhật tất cả các trường
        if (!empty($password)) {
            $stmt = $mysqli->prepare("UPDATE user SET username = ?, password = ?, role = ? WHERE Id_User = ?");
            $stmt->bind_param("sssi", $username, $hashed_pass, $role, $user_id);
        } else {
            // Nếu không thay đổi mật khẩu, chỉ cập nhật username và role
            $stmt = $mysqli->prepare("UPDATE user SET username = ?, role = ? WHERE Id_User = ?");
            $stmt->bind_param("ssi", $username, $role, $user_id);
        }

        if ($stmt->execute()) {
            return true;  // Cập nhật thành công
        } else {
            return false; // Cập nhật thất bại
        }
    }
    return false;  // Nếu user_id không hợp lệ
}

}
?>

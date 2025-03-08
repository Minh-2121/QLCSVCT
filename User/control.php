<?php
include("connect.php");

class data_user
{
    public function login($user, $pass)
    {
    global $conn;
    // Chuẩn bị câu lệnh SQL với tham số đầu vào
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    
    // Lấy kết quả trả về
    $result = $stmt->get_result();
    
    // Kiểm tra nếu có người dùng tồn tại
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
          // Sử dụng password_verify để kiểm tra mật khẩu
          if (password_verify($pass, $row['password'])) {
            $_SESSION['role'] = $row['role']; // Lưu vai trò
            return $row;
        }
    }
    return false; // Login failed
    }

    // Phương thức kiểm tra xem người dùng đã tồn tại hay chưa
    public function select_user($user)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_User($name, $pass)
    {
        global $conn;
    
        // Vai trò mặc định
        $role = 'user';
    
        // Chèn dữ liệu vào bảng
        $sql = "INSERT INTO user (username, password, role) VALUES ('$name', '$pass', '$role')";
        $run = mysqli_query($conn, $sql);
    
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
    
     public function select_AssetsStatus()
     {
         global $conn;
         $sql = "SELECT * FROM assets WHERE Status = 'tốt'";
         $run = mysqli_query($conn, $sql);
         return $run;
     }
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

}
?>

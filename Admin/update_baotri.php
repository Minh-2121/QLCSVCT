<?php
include_once("connect.php");
include_once("control.php");

$user = new data_user();
$maintenance = null;

// Kiểm tra nếu có bộ lọc theo ngày
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['startDate']) && isset($_POST['endDate'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $maintenance = $user->select_Maintenance_By_Date($startDate, $endDate);
} else {
    $maintenance = $user->select_Maintenance();
}

// Xử lý cập nhật trạng thái bảo trì
if (isset($_POST['updateStatus']) && isset($_POST['maintenanceId']) && isset($_POST['MaintenanceStatus'])) {
    $maintenanceId = $_POST['maintenanceId'];
    $newStatus = $_POST['MaintenanceStatus'];

    // Thực hiện truy vấn cập nhật
    $sql = "UPDATE maintenance SET MaintenanceStatus = ? WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newStatus, $maintenanceId);
    if ($stmt->execute()) {
        echo "<script>alert('Cập nhật trạng thái thành công!');</script>";
        echo "<script>window.location.href = 'Quản lý bảo trì.php';</script>";
    } else {
        echo "<script>alert('Cập nhật trạng thái thất bại!');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Trạng Thái Bảo Trì</title>
    <style>
        /* CSS cho giao diện */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }

        .filter-form, .update-form {
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            padding: 15px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"], select, button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background: #007bff;
            color: #fff;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #0056b3;
        }

        .btn-submit {
            background-color: #28a745;
            color: #fff;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .no-data {
            text-align: center;
            color: #666;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <section id="maintenance-list">
        <h2>Cập Nhật Trạng Thái Bảo Trì</h2>
        
        <!-- Form lọc dữ liệu theo ngày -->
        <form method="POST" action="" class="filter-form">
            <div class="form-group">
                <label for="startDate">Ngày Bắt Đầu:</label>
                <input type="date" name="startDate" id="startDate" required>
            </div>
            <div class="form-group">
                <label for="endDate">Ngày Kết Thúc:</label>
                <input type="date" name="endDate" id="endDate" required>
            </div>
            <button type="submit" class="btn-submit">Lọc</button>
        </form>

        <!-- Danh sách bảo trì -->
        <table>
            <thead>
                <tr>
                    <th>Tài Sản</th>
                    <th>Mô Tả</th>
                    <th>Ngày Bảo Trì</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($maintenance && mysqli_num_rows($maintenance) > 0) {
                    while ($row = mysqli_fetch_assoc($maintenance)) {
                ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['AssetName']); ?></td>
                            <td><?php echo htmlspecialchars($row['Description']); ?></td>
                            <td><?php echo htmlspecialchars($row['MaintenanceDate']); ?></td>
                            <td><?php echo htmlspecialchars($row['MaintenanceStatus']); ?></td>
                            <td>
                                <!-- Nút cập nhật trạng thái -->
                                <form method="POST" class="update-form" style="display:inline;">
                                    <input type="hidden" name="maintenanceId" value="<?php echo htmlspecialchars($row['Id']); ?>">
                                    <select name="MaintenanceStatus">
                                        <option value="Loại bỏ" <?php if ($row['MaintenanceStatus'] == 'Loại bỏ') echo 'Loại bỏ'; ?>>Loại bỏ</option>
                                        <option value="Đang xử lý" <?php if ($row['MaintenanceStatus'] == 'Đang xử lý') echo 'Đang xử lý'; ?>>Đang xử lý</option>
                                        <option value="Hoàn thành" <?php if ($row['MaintenanceStatus'] == 'Hoàn thành') echo 'Hoàn thành'; ?>>Hoàn thành</option>
                                    </select>
                                    <button type="submit" name="updateStatus">Cập nhật</button>
                                </form>
                            </td>
                        </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='5' class='no-data'>Không có kết quả nào.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>

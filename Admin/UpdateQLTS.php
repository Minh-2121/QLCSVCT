<?php
session_start();
include("control.php");
$get_user = new data_user();    

// Kiểm tra nếu có yêu cầu POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_con = $_POST['Id_Assets'];
    $name = $_POST['Name'];
    $type = $_POST['Type'];
    $status = $_POST['Status'];
    $location = $_POST['Location'];
    $purchadate = $_POST['PurchaDate'];

    // Xử lý upload ảnh
    $img = $row['Img']; // Giữ nguyên ảnh cũ mặc định
    if (!empty($_FILES['Image']['name'])) {
        $img = basename($_FILES['Image']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $img;

        if (!move_uploaded_file($_FILES['Image']['tmp_name'], $target_file)) {
            echo "<script>alert('Không thể upload file!');</script>";
            $img = $row['Img']; // Giữ ảnh cũ nếu lỗi
        }
    }

    // Gọi hàm update
    $update = $get_user->update_assets($id_con, $name, $img, $type, $status, $location, $purchadate);
    if ($update) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='Quản lý tài sản.php';</script>";
        exit();
    } else {
        echo "<script>alert('Cập nhật thất bại!');</script>";
    }
}

// Lấy dữ liệu tài sản
if (isset($_GET['Id_Assets'])) {
    $id = intval($_GET['Id_Assets']);
    $result = $get_user->select_AssetById($id);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Tài sản không tồn tại!");
    }
} else {
    die("ID tài sản không hợp lệ!");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tài sản</title>
    <style>
        /* Giao diện hiện đại và đẹp */
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
            letter-spacing: 1px;
        }
        form.update-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        form.update-form h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        form.update-form .form-group {
            margin-bottom: 15px;
        }
        form.update-form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        form.update-form input, 
        form.update-form select, 
        form.update-form button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
        }
        form.update-form button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        form.update-form button:hover {
            background-color: #0056b3;
        }
        .current-image {
            text-align: center;
            margin: 20px 0;
        }
        .current-image img {
            max-width: 100px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .back-btn {
            display: inline-block;
            margin: 20px auto;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #e0e0e0;
            color: #333;
            border-radius: 5px;
        }
        .back-btn:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <header>
        <h1>Cập nhật thông tin tài sản</h1>
    </header>
    <form class="update-form" method="POST" enctype="multipart/form-data">
        <h2>Thông tin tài sản</h2>
        <input type="hidden" name="Id_Assets" value="<?php echo $row['Id_Assets']; ?>">
        <div class="form-group">
            <label for="assetName">Tên tài sản</label>
            <input type="text" name="Name" value="<?php echo htmlspecialchars($row['Name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="assetImage">Hình ảnh</label>
            <input type="file" name="Image">
            <div class="current-image">
                <p>Hình ảnh hiện tại:</p>
                <<img src="uploads/<?php echo htmlspecialchars($row['Img']); ?>" alt="Current Image">
            </div>
        </div>
        <div class="form-group">
            <label for="assetType">Loại tài sản</label>
            <input type="text" name="Type" value="<?php echo htmlspecialchars($row['Type']); ?>" required>
        </div>
        <div class="form-group">
            <label for="assetStatus">Tình trạng</label>
            <input type="text" name="Status" value="<?php echo htmlspecialchars($row['Status']); ?>" required>
        </div>
        <div class="form-group">
            <label for="assetLocation">Vị trí</label>
            <input type="text" name="Location" value="<?php echo htmlspecialchars($row['Location']); ?>" required>
        </div>
        <div class="form-group">
            <label for="purchaseDate">Ngày mua</label>
            <input type="date" name="PurchaDate" value="<?php echo $row['PurchaDate']; ?>" required>
        </div>
        <button type="submit">Cập nhật</button>
    </form>
    <a href="list_assets.php" class="back-btn">Quay lại</a>
</body>
</html>

<?php
session_start();
include ("control.php");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Category</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />
    <style>/* General Styles */
body {
  font-family: 'Arial', sans-serif;
  background-color: #f8f9fa;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}
/* Đặt lại một số thuộc tính cơ bản để tránh các kiểu mặc định của trình duyệt */

.filter-form {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Các nhóm form (div) */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.form-group input:focus {
    border-color: #007bff;
    outline: none;
}

/* Nút Lọc */
.btn-submit {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #0056b3;
}

/* Responsive: Giảm kích thước form trên các màn hình nhỏ */
@media (max-width: 768px) {
    .filter-form {
        padding: 15px;
        width: 90%;
    }

    .form-group label {
        font-size: 14px;
    }

    .form-group input {
        font-size: 14px;
    }

    .btn-submit {
        width: 100%;
    }
}

/* Navbar */
.navbar {
  background-color: #007bff;
}

.navbar .navbar-nav .nav-link {
  color: #fff;
}

.navbar .navbar-nav .nav-link:hover {
  color: #f1f1f1;
}

/* Search Form */
.navbar-form {
  display: flex;
  justify-content: flex-end;
}

.input-group .form-control {
  width: 200px;
  border-radius: 5px;
}

.navbar-form .btn-search {
  background-color: #f8f9fa;
  border: none;
}

.navbar-form .btn-search i {
  color: #007bff;
}

/* Maintenance List Section */
#maintenance-list {
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Filter Form */
form .form-label {
  font-weight: bold;
}

form button[type="submit"] {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
}

form button[type="submit"]:hover {
  background-color: #0056b3;
}

/* Table Styles */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

table th, table td {
  padding: 12px;
  text-align: left;
  border: 1px solid #ddd;
}

table th {
  background-color: #f1f1f1;
}

table tr:nth-child(even) {
  background-color: #f9f9f9;
}

table tr:hover {
  background-color: #e9ecef;
}

/* Notification Badge */
.notification-badge {
  position: absolute;
  top: 0;
  right: 0;
  background-color: red;
  color: white;
  font-size: 10px;
  border-radius: 50%;
  padding: 2px 5px;
}
/* Nút thao tác: Cập nhật và Xóa */
.btn-update, .btn-delete {
    padding: 5px 15px;
    text-decoration: none;
    border-radius: 4px;
    color: white;
    font-weight: bold;
    text-align: center;
    display: inline-block;
}

.btn-update {
    background-color: #4CAF50; /* Màu xanh cho nút Cập nhật */
}

.btn-update:hover {
    background-color: #45a049;
}

.btn-delete {
    background-color: #f44336; /* Màu đỏ cho nút Xóa */
}

.btn-delete:hover {
    background-color: #e53935;
}

</style>

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
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.php" class="logo">
              <img
                src="assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
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
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a
                  data-bs-toggle="collapse"
                  href="index.php"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Trang chủ</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Quản lý</h4>
              </li>
                    <li class="nav-item">
                      <a href="Quản lý tài sản.php">
                        <i class="icon-book-open"></i>
                        <span class="sub-item">Quán lý tài sản</span>
                        
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
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.php" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
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
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <!-- Search Form for Desktop -->
    <div class="navbar-form navbar-search d-none d-lg-flex ms-auto">
      <div class="input-group">
        <button type="submit" class="btn btn-search pe-1">
          <i class="fa fa-search"></i>
        </button>
        <input type="text" class="form-control" placeholder="Search...">
      </div>
    </div>

    <!-- Mobile Search Dropdown -->
    <ul class="navbar-nav ms-auto d-lg-none">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
          <i class="fa fa-search"></i>
        </a>
        <ul class="dropdown-menu dropdown-search">
          <form class="navbar-form nav-search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
            </div>
          </form>
        </ul>
      </li>
    </ul>

    <!-- Notifications Dropdown -->
    <li class="nav-item">
      <a class="nav-link" href="#" data-bs-toggle="dropdown">
        <i class="fa fa-bell"></i>
        <span class="notification-badge"></span>
      </a>
    </li>
  </div>
</nav><?php
include_once("connect.php");
include_once("control.php");

$user = new data_user();
$maintenance = null;

// Kiểm tra nếu có bộ lọc theo ngày
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['startDate']) && isset($_POST['endDate'])) {
    $startDate = $_POST['startDate'];  // Ngày bắt đầu
    $endDate = $_POST['endDate'];   // Ngày kết thúc

    // Thực hiện truy vấn bảo trì theo ngày
    $maintenance = $user->select_Maintenance_By_Date($startDate, $endDate);
} else {
    // Nếu không có bộ lọc, lấy tất cả dữ liệu bảo trì
    $maintenance = $user->select_Maintenance();
}

// Xử lý xóa tài sản
if (isset($_POST['delete']) && $_POST['delete'] == 'delete') {
    $id = $_POST['Id_Assets'];
    $result = $user->delete_assets($id);
    if ($result) {
        echo "<script>alert('Xóa tài sản thành công!');</script>";
        echo "<script>window.location.href = 'Quản lý bảo trì.php';</script>";
    } else {
        echo "<script>alert('Xóa tài sản thất bại!');</script>";
    }
}

// Kiểm tra nếu không có kết quả trả về
if ($maintenance && mysqli_num_rows($maintenance) == 0) {
    echo "Không có kết quả bảo trì nào.";
}
?>

<section id="maintenance-list">
    <h2>Danh Sách Bảo Trì</h2>
    <!-- Form lọc dữ liệu theo ngày -->
    <form method="POST" action="" class="filter-form">
        <div class="form-group">
            <label for="startDate">Ngày Bắt Đầu:</label>
            <input type="date" name="startDate" id="startDate" class="form-control">
        </div>
        <div class="form-group">
            <label for="endDate">Ngày Kết Thúc:</label>
            <input type="date" name="endDate" id="endDate" class="form-control">
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
                <th>Thao tác</th>
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
                            <!-- Nút cập nhật -->
                            <form method='GET' action='update_baotri.php' style='display:inline;'>
                                <input type='hidden' name='Id_Assets' value='<?php echo htmlspecialchars($row['Id_Assets']); ?>'>
                                <button type='submit'>Cập nhật</button>
                            </form>
                            <!-- Nút xóa -->
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='Id_Assets' value='<?php echo htmlspecialchars($row['Id_Assets']); ?>'>
                                <button type='submit' name='delete' value='delete' onclick="return confirm('Bạn chắc chắn muốn xóa không?');">Xóa</button>
                            </form>
                        </td>
                    </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='5'>Không có kết quả nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>


      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo2.js"></script>
      
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
  </body>
</html>

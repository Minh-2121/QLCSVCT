<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Datatables - Kaiadmin Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

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
    <link rel="stylesheet" href="assets/css/taisan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                  href="Trangchu.php"
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
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                <form method="GET">
                <div class="input-group">
                <input
                type="text"
                name="search"
                placeholder="Search ..."
                class="form-control"
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
              />
              <div class="input-group-prepend">
              <button type="submit" class="btn btn-search pe-1">
               <i class="fa fa-search search-icon"></i>
              </button>
              </div>
              </div>
              </form>

                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-bell"></i>
                    <span class="notification"></span>
                  </a>
                </li>8               
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div><br><br><br>
        <main>
    <section id="assetList">
        <h2>Danh Sách Tài Sản</h2>
        <!-- Nút mở modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAssetModal">
    Thêm mới tài sản
</button>

<!-- Modal -->
<div class="modal fade" id="addAssetModal" tabindex="-1" aria-labelledby="addAssetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAssetModalLabel">Thêm Tài Sản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <form id="addAssetForm" method="POST" enctype="multipart/form-data">
        <!-- Thêm trường nhập ID Tài Sản -->
        <div class="mb-3">
            <label for="assetId" class="form-label">ID Tài Sản</label>
            <input type="text" class="form-control" id="assetId" name="Id_Assets" placeholder="ID Tài Sản" readonly value="Auto ID">
        </div>
        <div class="mb-3">
            <label for="assetName" class="form-label">Tên tài sản</label>
            <input type="text" class="form-control" id="assetName" name="Name" placeholder="Tên tài sản" required>
        </div>
        <div class="mb-3">
            <label for="assetImage" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="assetImage" name="Image" required>
        </div>
        <div class="mb-3">
            <label for="assetType" class="form-label">Loại tài sản</label>
            <input type="text" class="form-control" id="assetType" name="Type" placeholder="Loại tài sản" required>
        </div>
        <div class="mb-3">
            <label for="assetStatus" class="form-label">Tình trạng</label>
            <input type="text" class="form-control" id="assetStatus" name="Status" placeholder="Tình trạng" required>
        </div>
        <div class="mb-3">
            <label for="assetLocation" class="form-label">Vị trí</label>
            <input type="text" class="form-control" id="assetLocation" name="Location" placeholder="Vị trí" required>
        </div>
        <div class="mb-3">
            <label for="purchaseDate" class="form-label">Ngày mua</label>
            <input type="date" class="form-control" id="purchaseDate" name="PurchaDate" required>
        </div>
        <button type="submit" class="btn btn-primary" name="action" value="insert">Thêm Tài Sản</button>
    </form>
</div>
        </div>
    </div>
</div>

<table border="1">
    <thead>
        <tr>
            <th>ID Tài Sản</th> <!-- Thêm cột ID -->
            <th>Tên Tài Sản</th>
            <th>Hình ảnh</th>
            <th>Loại tài sản</th>
            <th>Tình trạng</th>
            <th>Vị trí</th>
            <th>Ngày nhập</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("connect.php");
        include("control.php");

        $user = new data_user();
        // Xử lý thêm tài sản
        if (isset($_POST['action']) && $_POST['action'] == 'insert') {
            $name = $_POST['Name'];
            $img = $_FILES['Image'];
            $type = $_POST['Type'];
            $status = $_POST['Status'];
            $location = $_POST['Location'];
            $purchadate = isset($_POST['PurchaDate']) ? $_POST['PurchaDate'] : ''; // Kiểm tra sự tồn tại của trường

            if (isset($img['name']) && $img['error'] === 0) {
                $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $fileName = iconv('UTF-8', 'ASCII//TRANSLIT', $img['name']);
                $fileName = preg_replace('/[^A-Za-z0-9.\-]/', '_', $fileName);
                $fileTmpPath = $img['tmp_name'];
                $fileDest = $uploadDir . $fileName;

                if (move_uploaded_file($fileTmpPath, $fileDest)) {
                    $user->insert_assets($name, $fileName, $type, $status, $location, $purchadate);
                    echo "<script>alert('File uploaded successfully: $fileDest')</script>";
                } else {
                    echo "<script>alert('Failed to upload file')</script>";
                }
            } else {
                echo "<script>alert('No file uploaded or upload error')</script>";
            }
        }

        // Xóa tài sản
        if (isset($_POST['delete']) && $_POST['delete'] == 'delete') {
          $id = $_POST['Id_Assets'];
          $result = $user->delete_assets($id);
          if ($result) {
              echo "<script>alert('Xóa tài sản thành công!');</script>";
              // Chuyển hướng về trang quản lý tài sản
              echo "<script>window.location.href = 'Quản lý tài sản.php';</script>";
          } else {
              echo "<script>alert('Xóa tài sản thất bại!');</script>";
          }
      }
      if (isset($_POST['update']) && $_POST['update'] == 'update') {
        if (isset($_POST['Id_Assets']) && !empty($_POST['Id_Assets'])) {
            // Lấy ID và các dữ liệu khác từ form
            $id = $_POST['Id_Assets'];
            $name = $_POST['Name'];
            $img = $_FILES['Image'];
            $type = $_POST['Type'];
            $status = $_POST['Status'];
            $location = $_POST['Location'];
            $purchadate = $_POST['PurchaDate'];
            if (isset($img['name']) && $img['error'] === 0) {
              $uploadDir = 'uploads/';
              if (!is_dir($uploadDir)) {
                  mkdir($uploadDir, 0777, true);
              }
              $fileName = iconv('UTF-8', 'ASCII//TRANSLIT', $img['name']);
              $fileName = preg_replace('/[^A-Za-z0-9.\-]/', '_', $fileName);
              $fileTmpPath = $img['tmp_name'];
              $fileDest = $uploadDir . $fileName;
  
              if (move_uploaded_file($fileTmpPath, $fileDest)) {
                  $img = $fileName; // Lấy tên file ảnh mới
              } else {
                  echo "<script>alert('Failed to upload image!');</script>";
              }
          }
        }
      }
          // Kiểm tra từ khóa tìm kiếm
          if (isset($_GET['search']) && !empty($_GET['search'])) {
            $keyword = $_GET['search'];
            $assets = $user->search_Assets($keyword); // Gọi hàm tìm kiếm
        } else {
            $assets = $user->select_Assets(); // Gọi hàm lấy danh sách tài sản
        }

      // Hiển thị danh sách tài sản
if ($assets) {
    while ($row = mysqli_fetch_assoc($assets)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Id_Assets']) . "</td>"; // Hiển thị ID
        echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
        echo "<td><img src='uploads/" . htmlspecialchars($row['Img']) . "' width='100'></td>";
        echo "<td>" . htmlspecialchars($row['Type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Location']) . "</td>";
        echo "<td>" . htmlspecialchars($row['PurchaDate']) . "</td>";
        echo "<td>
                <!-- Nút cập nhật -->
                <form method='GET' action='UpdateQLTS.php' style='display:inline;'>
                    <input type='hidden' name='Id_Assets' value='" . htmlspecialchars($row['Id_Assets']) . "'>
                    <button type='submit'>Cập nhật</button>
                </form>
                <!-- Nút xóa -->
                <form method='POST' style='display:inline;'>
                    <input type='hidden' name='Id_Assets' value='" . htmlspecialchars($row['Id_Assets']) . "'>
                    <button type='submit' name='delete' value='delete'>Xóa</button>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Không có tài sản nào!</td></tr>"; // Thay đổi colspan thành 8
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

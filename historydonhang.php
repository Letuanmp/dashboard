<?php
session_start();

// Kiểm tra nếu có yêu cầu đăng xuất
if (isset($_GET['login'])) {
    $dangxuat = $_GET['login'];
} else {
    $dangxuat = '';
}
if ($dangxuat == 'dangxuat') {
    session_destroy();
    header('Location: shop.php');
}

// Bao gồm file kết nối đến cơ sở dữ liệu
include './connect.php';

// Xử lý tìm kiếm đơn hàng
if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
    $_SESSION['locdonhang'] = $_POST;
    header('Location: shop.php');
    exit;
}

// Xử lý lọc đơn hàng theo tên khách hàng
if (!empty($_SESSION['dangnhap'])) {
    // Lấy tên đăng nhập từ session
    $tenkhachhang = $_SESSION['dangnhap'];
    // Tạo điều kiện WHERE cho truy vấn SQL
    $where = "`tenkh` = '" . $tenkhachhang . "'";
}

$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;

// Tạo câu truy vấn SQL để lấy danh sách đơn hàng
if (!empty($where)) {
    $orders = mysqli_query($con, "SELECT * FROM `oder` WHERE (" . $where . ") ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
} else {
    $orders = mysqli_query($con, "SELECT * FROM `oder` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
}

$totalRecords = mysqli_query($con, "SELECT * FROM `oder`");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);

// Bao gồm file header
include 'header.php';
?>

<!-- Phần HTML của trang -->
<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-danger">Quản lý đơn hàng</h2>
                <p>Danh sách các đơn hàng hiện có.</p>
            </div>

            <!-- Search bar -->
            <!-- Đoạn mã của bạn vẫn giữ nguyên -->
            <!-- End of search bar -->

            <!-- Order display -->
            <div class="container">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày tạo</th>
                                <th>In đơn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($orders)) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['tenkh'] ?></td>
                                    <td><?= $row['diachi'] ?></td>
                                    <td><?= $row['sdt'] ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($row['ngaytao'])) ?></td>
                                    <td><a href="inhoadon.php?id=<?=$row['id']?>" target="_blank" style="color:red">In</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="clear-both"></div>
                    <?php include './pagination.php'; ?>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Bắt đầu</h5>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                    <li><a href="#">Giỏ hàng</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Thông tin</h5>
                <ul>
                    <li><a href="#">Liên lạc</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Hỗ trợ</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">SĐT</a></li>
                    <li><a href="#">Diễn đàn&nbsp;</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Hợp pháp</h5>
                <ul>
                    <li><a href="#">Điều kiện dịch vụ</a></li>
                    <li><a href="#">Điều kiện sử dụng</a></li>
                    <li><a href="#">Chính sách riêng tư</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2024 Copyright Text</p>
    </div>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/vanilla-zoom.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>

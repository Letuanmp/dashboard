<?php
    session_start();

    if (isset($_GET['login'])) {
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }
    if ($dangxuat == 'dangxuat') {
        session_destroy();
        header('Location: shop.php');
    }
    include './connect.php';

    if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
        $_SESSION['locsanpham_shop'] = $_POST;
        header('Location: shop.php');
        exit;
    }
    if (!empty($_SESSION['locsanpham_shop'])) {
        $where = "";
        foreach ($_SESSION['locsanpham_shop'] as $field => $value) {
            if (!empty($value)) {
                switch ($field) {
                    case 'tensp':
                        $where .= (!empty($where)) ? " AND " . "`" . $field . "` LIKE '%" . $value . "%'" :
                            "`" . $field . "` LIKE '%" . $value . "%'";
                        break;
                    default:
                        $where .= (!empty($where)) ? " AND " . "`" . $field . "` = " . $value . "" :
                            "`" . $field . "` = " . $value . "";
                        break;
                }
            }
        }
        extract($_SESSION['locsanpham_shop']);
    }

    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;

    if (!empty($where)) {
        $products = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham` WHERE (" . $where . ") ORDER BY `masp` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
    } else {
        $products = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham` ORDER BY `masp` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }

    $totalRecords = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);

    include 'header.php';
?>
<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-danger"">Cửa hàng</h2>
                <p>Nơi trưng bày những sản phẩm mới nhất, tốt nhất.</p>
            </div>
             <!-- Search bar -->
             <div class="w-full p-6 flex flex-row-reverse">
                <div class="mr-2 flex items-center justify-center ">
                    <form action="shop.php?action=search" method="POST">
                    <div class="flex mb-5 ms-3 ">
                        <input type="text" class="border-2 border-gray-200 rounded px-2 py-2 flex-grow" placeholder="Nhập tên sản phẩm ..." name="tensp" value="<?= !empty($tensp) ? $tensp : "" ?>" style="flex: 9;"/>
                        <button type="submit" value="Tìm" class="rounded p-2 px-4 text-black bg-blue-500 border-l" style="flex: 1;">Tìm</button>
                    </div>

                    </form>
                </div>
            </div>
            <!-- End of search bar -->
            <!--            sản phẩm hiện ở đây-->

            <div class="container">
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_array($products)) {
                        ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product-grid2">
                                <div class="product-image2"><a
                                            href="chitietsanpham.php?masp=<?= $row['masp'] ?>">
                                        <img
                                                class="pic-1"

                                                src="admin/<?= $row['anhdaidien'] ?>"
                                                height="450" width="450"/>

                                        <img class="pic-2"
                                             src="admin/<?= $row['anhgiuoithieu1'] ?>"
                                             height="2560"
                                             width="2560"/></a>
                                    <ul class="social">
                                        <li><a href="chitietsanpham.php?masp=<?= $row['masp'] ?>"
                                               data-tip="Quick View"><i
                                                        class="fa fa-eye"></i></a>
                                        </li>
                                        <!-- <li><a href="giohang.php"
                                               data-tip="Add to Cart" type="submit"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a
                                                style="text-decoration: none"
                                                href="chitietsanpham.php?masp=<?= $row['masp'] ?>"><?= $row['tensp'] ?></a>
                                    </h3>
                                    <span class="price"><?= number_format($row['giasanpham'], 0, ",", ".") ?> VND</span>
                                    <span class="originalprice"><?= number_format($row['giagoc'], 0, ",",
                                            ".") ?> VND</span>


                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>
                    <div class="clear-both"></div>
                    <?php
                    include './pagination.php';
                    ?>
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
                    <li><a href="#" onclick="window.location.href='trangchu.php'; return false;">Trang chủ</a></li>
                    <li><a href="#" onclick="window.location.href='dangnhap.php'; return false;">Đăng nhập</a></li>
                    <li><a href="#" onclick="window.location.href='giohang.php'; return false;">Giỏ hàng</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Thông tin</h5>
                <ul>
                    <li><a href="#">Liên lạc</a></li>
                    <li><a href="#" onclick="window.location.href='vechungtoi.php'; return false;">Giới thiệu</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Hỗ trợ</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">0862048587</a></li>
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
        <p>Banh my TUHU</p>
    </div>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/vanilla-zoom.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>
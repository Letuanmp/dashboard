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
    $result = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham` WHERE `masp` = ".$_GET['masp']);
    $product = mysqli_fetch_assoc($result);
    $row = mysqli_fetch_array($result);
    include_once 'header.php';
?>



<main class="page product-page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-danger">Trang sản phẩm</h2>
                <p>Chi tiết sản phẩm</p>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery">
                                <div id="product-preview" class="vanilla-zoom">
                                    <div class="zoomed-image"></div>
                                    <div class="sidebar">
                                        <!--                                        ảnh 1-->
                                        <img class="img-fluid d-block small-preview"
                                             height="100" src="admin/<?= $product['anhdaidien'] ?>" width="100">
                                        <!--                                        ánh 2-->
                                        <img
                                                class="img-fluid d-block small-preview"
                                               height="100" src="admin/<?= $product['anhgiuoithieu1'] ?>" width="100">
                                        <!--                                        ảnh 3-->
                                        <img
                                                class="img-fluid d-block small-preview"
                                               height="100" src="admin/<?= $product['anhgiuoithieu2'] ?>" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3><?= $product['tensp'] ?></h3>
                                <div class="rating"><img src="assets/img/star.png">
                                    <img src="assets/img/star.png">
                                    <img src="assets/img/star.png">
                                    <img src="assets/img/star.png">
                                    <img src="assets/img/star.png">
                                </div>
                                <div class="price">
                                    <span class="originalprice"><?= number_format($product['giagoc'], 0, ",", ".") ?> VND</span>
                                    <h3><?= number_format($product['giasanpham'], 0, ",", ".") ?> VND</h3>
                                </div>
                                <form action="giohang.php?action=add" method="POST" >
                                    <div>Bạn mua với số lượng:</div>
                                    <input class="ml-4 text-center" type="text" value="1" name="quantity[<?=$product['masp']?>]" size="2" /><br/>
                                   
                                        <button class="mt-2 btn btn-primary" type="submit" style="background-color:red" ><i class="icon-basket" ></i>Thêm vào giỏ
                                            hàng
                                        </button>
                                   
                                  
                                </form>
                                <div class="summary">
                                    <p><?= $product['noidung'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div>
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab"
                                                                        data-bs-toggle="tab" id="description-tab"
                                                                        href="#description" style="color:red">Mô tả sản phẩm</a></li>
                            </li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab"
                                                                        id="reviews-tab" href="#reviews" style="color:red">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active description" role="tabpanel" id="description">
                                <p><?= $product['noidung'] ?></p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <figure class="figure">
                                            <img class="img-fluid figure-img" src="admin/<?= $product['anhdaidien'] ?>">
                                            <img class="img-fluid figure-img" src="admin/<?= $product['anhgiuoithieu1'] ?>">
                                            <img class="img-fluid figure-img" src="admin/<?= $product['anhgiuoithieu2'] ?>">
                                        </figure>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade specifications" role="tabpanel" id="specifications">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td class="stat">Display</td>
                                            <td>5.2"</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">Camera</td>
                                            <td>12MP</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">RAM</td>
                                            <td>4GB</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">OS</td>
                                            <td>iOS</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="reviews">
                                <div class="reviews">
                                    <div class="review-item">
                                    <div class="rating"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img
                                                src="assets/img/star.png"></div>
                                        <h4>Sản phẩm rất ngon</h4><span class="text-muted"><a href="#">Johnny Dang</a>, 20 Jan 2024</span>
                                        <p>Sản phẩm rất tuyệt vời, tôi sẽ nhớ mãi khi quay trở về bên Mỹ</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                    <div class="rating"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img
                                                src="assets/img/star.png"></div>
                                        <h4>Sản phẩm rất ngon</h4><span class="text-muted"><a href="#">The Rock</a>, 20 Jan 2024</span>
                                        <p>Tôi sẽ đem sản phẩm này vào phim sắp tới của tôi</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                    <div class="rating"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img
                                                src="assets/img/star.png"></div>
                                        <h4>Sản phẩm rất ngon</h4><span class="text-muted"><a href="#">Tom Holland</a>, 20 Jan 2024</span>
                                        <p>Cảm giác vừa đu dây vừa ăn bánh mỳ thật là tuyệt</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                //sản phẩm liên quan-->
                <div class="clean-related-items">
                    <h3>Sản phẩm liên quan</h3>
                    <div class="items">
                        <div class="row justify-content-center">
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                        src="assets/img/bo_sot_tieu_den.jpg"></a></div>
                                    <div class="related-name"><a href="#">Bánh mì bò sốt tiêu đen</a>
                                        <div class="rating"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img
                                                src="assets/img/star.png"></div>
                                        <h4 style="color: red">40.000</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                        src="assets/img/bo_phomai.jpg"></a></div>
                                    <div class="related-name"><a href="#">Bánh mì bò Phomai</a>
                                    <div class="rating"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img
                                                src="assets/img/star.png"></div>
                                        <h4 style="color: red">40.000</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                        src="assets/img/ga_nuong_la_chanh.jpg"></a></div>
                                    <div class="related-name"><a href="#">Bánh mì gà nướng lá chanh</a>
                                    <div class="rating"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img src="assets/img/star.png"><img
                                                src="assets/img/star.png"><img
                                                src="assets/img/star.png"></div>
                                        <h4 style="color: red">40.000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                //sản phẩm liên quan-->
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
    <div class="footer-copyright">
        <p>© 2021 Copyright Text</p>
    </div>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/vanilla-zoom.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>
<?php
    session_start();

    //if (!isset($_SESSION['dangnhap'])) {
    //
    //    header('Location: index.php');
    //}
    if (isset($_GET['login'])) {
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }
    if ($dangxuat == 'dangxuat') {
        session_destroy();
        header('Location: trangchu.php');
    }
include 'header.php';

?>

<main class="page landing-page">
    <section class="clean-block clean-hero"
             style="color: rgba(240, 133, 31, 0.5);background: url(&quot;assets/img/tuhu-bread-827721.jpg&quot;);">
        <div class="text" style="width: 100%;"><b>TUHU BREAD - Mang cả thế giới bánh mỳ tới tay bạn&nbsp;</b>
            <p style="width: 100%;"><br>Bánh mì Tuhu&nbsp; là một loại bánh mì đặc trưng của Việt Nam, 
            nổi tiếng với hương vị độc đáo và cách chế biến tỉ mỉ. Loại bánh mì này có lớp vỏ giòn tan, 
            bên trong mềm mại và thơm ngon. Nhân bánh thường bao gồm nhiều thành phần phong phú như thịt heo 
            quay, pate, chả lụa, cùng với các loại rau củ tươi ngon như dưa leo, rau mùi, và đồ chua. Nước sốt
             đặc biệt được rưới đều lên nhân, tạo nên hương vị đậm đà và khó quên. Bánh mì Tuhu&nbsp; không chỉ là món 
             ăn nhanh mà còn là một phần văn hóa ẩm thực, phản ánh sự sáng tạo và tinh tế của người Việt.<br></p>
             <a href="baiviet.php">
                <button class="btn btn-outline-light btn-lg" type="button">Xem thêm</button>
            </a>
        </div>
    </section>
    <section class="clean-block clean-info dark">
        <div class="container">
            <div class="block-heading">
            <h2 class="text-danger" >Bánh mỳ TUHU - Mang đậm bản sắc Việt</h2>
                <p>Thơm ngon bùng vị đến miếng cuối cùng</p>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6"><img class="img-thumbnail" src="assets/img/banh-mi-tuhu-bread-tho-lao-quan-hai-ba-trung-ha-noi-1584517078626558934-eatery-avatar-1625918269.jpg">
                </div>
                <div class="col-md-6">
                    <h3>Bánh mỳ xúc xích TUHU</h3>
                    <div class="getting-started-info">
                        <p>Bánh mì xúc xích TUHU là một biến tấu hiện đại của 
                            món bánh mì truyền thống Việt Nam, mang đến 
                            hương vị độc đáo và hấp dẫn. Với lớp vỏ bánh mì 
                            giòn tan, bên trong là xúc xích đậm đà và thơm 
                            ngon, kết hợp với các loại rau tươi như dưa leo, 
                            rau mùi, và cà rốt bào. Điểm nhấn của bánh mì xúc 
                            xích TUHU&nbsp; chính là nước sốt đặc biệt, tạo nên hương vị 
                            hoàn hảo, hòa quyện giữa vị mặn mà của xúc xích và vị tươi 
                            mát của rau củ. Đây là món ăn nhanh tiện lợi, phù hợp cho bữa s
                            áng hay bữa ăn nhẹ trong ngày, đáp ứng nhu cầu của thực khách bận 
                            rộn nhưng vẫn muốn thưởng thức một món ăn chất lượng và ngon miệng.</p>
                    </div>
                    <button class="btn btn-outline-primary btn-lg" type="button" style="border-color:red"><a href="shop.php" style="color: red"; return false; >Mua ngay</a></button>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block features">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-danger">Bánh mỳ TUHU - Mang đậm bản sắc Việt</h2>
                <p>Không có đơn đặt hàng tối thiểu<br>Sản phẩm đa dạng<br>Giá cả phải chăng</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 feature-box"><i class="icon-basket icon" style="color: red"></i>
                    <h4><strong>GIAO HÀNG TẠI HÀ NỘI</strong></h4>
                    <p>Vận chuyển khắp khu vực Hà Nội</p>
                </div>
                <div class="col-md-5 feature-box"><i class="far fa-money-bill-alt icon "style="color: red"></i>
                    <h4><strong>THANH TOÁN KHI NHẬN HÀNG</strong></h4>
                    <p>Nhận hàng tại nhà rồi thanh toán<br><br><br><br></p>
                </div>
                <div class="col-md-5 feature-box"><i class="far fa-laugh-beam icon "style="color: red"></i>
                    <h4><strong>ĐẢM BẢO AN TOÀN THỰC PHẨM</strong></h4>
                    <p>Đảm bảo sản phẩm an toàn không độc hại<br><br></p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-refresh icon"style="color: red"></i>
                    <h4><strong>MIỄN PHÍ SẢN PHẨM KHÁC KHI CÓ BẤT KỲ VẤN ĐỀ GÌ</strong></h4>
                    <p>Liên hệ nhân viên để khiếu nại khi gặp vấn đề</p>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block slider dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-danger" >Sản phẩm bán chạy</h2>
                <p>sau đây là hình ảnh về một số sản phẩm bán chạy</p>
            </div>
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active text-nowrap"><img alt="Slide Image"
                                                                       class="w-100 d-block"
                                                                       src="admin/img/banh-mi-tuhu-bread-thai-thinh-quan-dong-da-ha-noi-1601518952523131963-eatery-avatar-1625926567.jpg"
                                                                       />
                    </div>
                    <div class="carousel-item"><img alt="Slide Image" class="w-100 d-block"
                                                    src="assets/img/banh-mi-tuhu-bread-tho-lao-quan-hai-ba-trung-ha-noi-1584517078626558934-eatery-avatar-1625918269.jpg"
                                                    /></div>
                    <div class="carousel-item"><img alt="Slide Image" class="w-100 d-block"
                                                    src="assets/img/banh-mi-tuhu-bread-thai-thinh-quan-dong-da-ha-noi-1601518952523131963-eatery-avatar-1625926567.jpg"
                                                    /></div>
                </div>
                <div><a class="carousel-control-prev" data-bs-slide="prev" href="#carousel-1" role="button"><span
                                class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a
                            class="carousel-control-next" data-bs-slide="next" href="#carousel-1" role="button"><span
                                class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
                </div>
                <ol class="carousel-indicators">
                    <li class="active" data-bs-slide-to="0" data-bs-target="#carousel-1"></li>
                    <li data-bs-slide-to="1" data-bs-target="#carousel-1"></li>
                    <li data-bs-slide-to="2" data-bs-target="#carousel-1"></li>
                </ol>
            </div>
        </div>
    </section>
    <section class="clean-block about-us">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-danger">Đội ngũ bán hàng của chúng tôi</h2>
                <p>Luôn nhiệt tình chọn lọc ra những mẫu mới nhất</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                  src="assets/img/anh_Chuyen.jpg"
                                                                  style="height: 500.812px;"/>
                        <div class="card-body info" style="height: 177.438px;">
                            <h4 class="card-title">Ngô Quang Trường</h4>
                            <p class="card-text">CO-FOUNDER</p>
                            <div class="icons"><a href="https://www.facebook.com/profile.php?id=100031500852743"><i class="icon-social-facebook" style="color: red"></i></a><a href="https://www.instagram.com/ngotruong61/"><i
                                            class="icon-social-instagram" style="color: red"></i></a><a href="https://www.youtube.com/results?search_query=mixigaming"><i
                                            class="icon-social-twitter" style="color: red"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                  src="assets/img/z5486507392096_a9a348ae74ef04f8694610c986b20212.jpg"
                                                                  style="height: 500.812px;"/>
                        <div class="card-body info" style="height: 178.438px;">
                            <h4 class="card-title">Lê Văn Tuấn</h4>
                            <p class="card-text">CO-FOUNDER</p>
                            <div class="icons"><a href="https://www.facebook.com/garpherm"><i class="icon-social-facebook" style="color: red"></i></a><a href="https://www.instagram.com/garphermm/"><i
                                            class="icon-social-instagram" style="color: red"></i></a><a href="https://www.youtube.com/results?search_query=mixigaming"><i
                                            class="icon-social-twitter" style="color: red"></i></a></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                  src="assets/img/avatars/avatar3.jpg"/>
                        <div class="card-body info" style="height: 177.438px;">
                            <h4 class="card-title">Ally Sanders</h4>
                            <p class="card-text">Thư kí</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i
                                            class="icon-social-instagram"></i></a><a href="#"><i
                                            class="icon-social-twitter"></i></a></div>

                        </div>
                    </div>
                </div> -->
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
                    <li><a href="#" onclick="window.location.href='trangchu.php'; return false;">Trang chủ>Trang chủ</a></li>
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
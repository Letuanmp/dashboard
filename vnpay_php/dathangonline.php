<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    require_once("./config.php");
    include './connect1.php';
    if(isset($_GET['action'])){
        $_POST['quantity']=$_SESSION['chuyen'];
        $timsanpham = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham` WHERE `masp` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
        $total = 0;
        $orderProducts = array();
        while ($row = mysqli_fetch_array($timsanpham)) {
            $orderProducts[] = $row;
            $total += $row['giasanpham'] * $_POST['quantity'][$row['masp']];
        }
    if ($_POST['tenkh']=='' || $_POST['sdt'] ==''|| $_POST['diachi'] ==''||$_POST['quantity'] =='')
    {
        ?>
        <script>
            alert( 'Mời bạn nhập đầy đủ thông tin');
            window.location.href= 'dathangonline.php';
        </script>
    <?php
        }
        $insertOrder = mysqli_query($con, "INSERT INTO `oder` (`id`, `tenkh`, `sdt`, `diachi`, `note`, `tongtien`, `ngaytao`) VALUES (NULL, '" . $_POST['tenkh'] . "', '" . $_POST['sdt'] . "', '" . $_POST['diachi'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "')");
        $orderID = $con->insert_id;// lưu id giỏ hàng

        $insertString = "";
        foreach ($orderProducts as $key => $timsanpham) {
            $insertString .= "(NULL, '" . $orderID . "', '" . $timsanpham['masp'] . "', '" . $_POST['quantity'][$timsanpham['masp']] . "', '" . $timsanpham['giasanpham'] . "', '" . time() . "', '" . time() . "')";

            if ($key != count($orderProducts) - 1) {
                $insertString .= ",";
            }
        }
        $insertOrder = mysqli_query($con, "INSERT INTO `oder_chitiet` (`id`, `madonhang`, `masp`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
//var_dump($total);
//        var_dump($orderID);
//exit;
        unset($_SESSION['giohang']); // xoá lại giỏ hàng
    ?>
        <script>
            alert('Đơn hàng đã đặt thành công, tiếp theo mời bạn nhập thông tin thanh toán');
        </script>
    <?php

        }else{
    ?>
        <section class="container mt-5">
            <div class="text-center w-100 font-weight-bold display-4 text-secondary mb-4">
                Thông tin đặt hàng
            </div>
            <form method="post" action="dathangonline.php?action=submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="text-secondary">Họ tên người nhận:</label>
                        <input
                                name="tenkh"
                                class="form-control"
                                type="text"
                        />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-secondary">Số điện thoại:</label>
                        <input
                                name="sdt"
                                class="form-control"
                                type="text"
                        />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="text-secondary">Địa chỉ:</label>
                        <input
                                name="diachi"
                                class="form-control"
                                type="text"
                        />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="text-secondary">Ghi chú:</label>
                        <input
                                name="note"
                                class="form-control"
                                type="text"
                        />
                    </div>
                    <div class="form-group col-md-12 text-center">
                        <button type="submit" name="xacnhan" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Lưu lại
                        </button>
                    </div>
                </div>
            </form>
        </section>
        <?php
    }
    if(isset($orderID)){
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Tạo mới đơn hàng</title>
            <!-- Bootstrap core CSS -->
            <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
            <!-- Custom styles for this template -->
            <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
            <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
        </head>

        <body>
        <?php require_once("./config.php"); ?>
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY DEMO</h3>
            </div>
            <h3>Tạo mới đơn hàng</h3>
            <div class="table-responsive">
                <form action="/WEB-PHP/vnpay_php/vnpay_create_payment.php" id="create_form" method="post">

                    <div class="form-group">
                        <label for="language">Loại hàng hóa </label>
                        <select name="order_type" id="order_type" class="form-control">
                            <option value="billpayment">Thanh toán hóa đơn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Mã hóa đơn</label>
                        <input class="form-control" id="order_id" name="order_id" type="text" value="<?= $orderID ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount" name="amount" type="number" value="295000"/>
                    </div>
                    <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Thanh toan don hang <?= $orderID ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="ABBANK"> Ngan hang An Binh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán</button>

                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY 2024</p>
            </footer>
        </div>
        </body>
        </html>
    <?php
    }
?>
</html>

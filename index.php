<?php
ob_start(); //chạy lệnh header (chuyển trang)
session_start(); // (Khỏi chạy session)
include "global.php";
include "model/pdo.php";
include "model/danhmuc.php"; //chứa các function xử lý code danh mục
include "model/sanpham.php";  //chứa các function xử lý code sản phẩm 
include "model/cart.php"; //chứa các function xử lý code giỏ hàng
include "model/taikhoan.php"; //chứa các function xử lý code đăng kí đăng nhập (user)
include "part/header.php";
include "model/binhluan.php";



if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

//controller

$spnew1 = loadall_sanpham_home1();
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
// lúc nào cũng phải kiểm tra cái biến $act (action) lấy từ url (các request của người dùng)
if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            // kiểm tra tồn tại thông tin của khách hàng nhập vào form (form action="index.php?act=sanpham" method="post") bên thẻ header 
            // trong thư mục part
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            //kiểm tra tồn tại iddm trên the url và sét điều kiện iddm > 0
            if (isset($_GET['iddm']) && ($_GET['iddm']) > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            // khai báo biến $dssp chứa giá trị của function loadall_sanpham (mảng)
            $dssp = loadall_sanpham($kyw, $iddm);
            // nhảy sang trang view/shop/shop.php sử dụng biến $dssp tại dòng 155
            // $dssp = loadall_sanpham_phantrang();
            include "view/shop/shop.php";
            break;
        case 'sanphamct':
            //kiểm tra tồn tại idsp trên the url và sét điều kiện idsp > 0
            if (isset($_GET['idsp']) && ($_GET['idsp']) > 0) {
                $id = $_GET['idsp'];
                // khai báo biến $onesp chứa giá trị của function loadone_sanpham (mảng)
                $onesp = loadone_sanpham($id);
                extract($onesp);
                //nhảy sang trang view/product/detail.php sử dụng biến $onesp tại dòng 28,49,267


                //khai báo biến $sp_cungloais chứa giá trị của function load_sanpham_cungloai (mảng)
                $sp_cungloais = load_sanpham_cungloai($id, $id_cate);
                //nhảy sang trang view/product/detail.php sử dụng biến $sp_cungloais tại dòng 383
                include "view/product/detail.php";
            } else {
                include "view/home/home.php";
            }
            break;
        case 'dangky':
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            // sau khi đăng nhập hệ thống sẽ lấy thông tin người dùng nhập vào thông qua phương thức post tại form (view/taikhoan/dangnhap.php)
            // sau đó nó kiểm tra nút đăng nhâp có được click và tồn tại hay không
            // if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            //     $email = $_POST['email'];
            //     $pass = $_POST['pass'];
            //     $checkuser = checkuser($email, $pass);
            //     // sử dụng is_aray($checkuser) kiểm tra biến $checkuser có phải là mảng hay không
            //     if (is_array($checkuser)) {
            //         $_SESSION['user'] = $checkuser;
            //         header('Location: index.php');
            //     } else {
            //         $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng kí";
            //     }
            // }
            include "view/taikhoan/dangnhap.php";
            break;
        case 'edit_taikhoan';
            // kiểm tra nút cap nhat có được click và tồn tại hay không
            // sau khi cập nhập hệ thống sẽ lấy thông tin người dùng nhập vào thông qua phương thức post tại form (view/taikhoan/capnhattk.php)
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                // khai bieenieens chứa các giá trị tại thẻ input
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $diachi = $_POST['address'];
                $id = $_POST['id'];
                // Cập nhật tài khoản
                update_taikhoan($id, $name, $pass, $email, $tel, $diachi);
                // header('Location: index.php?act=edit_taikhoan');
                $thongbao = "Cập nhật thành công";
            }
            include "view/taikhoan/capnhattk.php";
            break;
        case 'thoat';
            // khi click thoát sẽ xóa session và quay lại giao diện trang chủ
            session_unset();
            header('Location: index.php');
            break;
        case 'addtocart':
            // kiểm tra sự tồn tại của lệnh addtocart
            if (isset($_POST['addtocart'])) {
                // các thông tin của sản phẩm được lưu tại thẻ input type='hidden'
                $id = $_POST['id'];
                $name = $_POST['name'];
                $image = $_POST['img'];
                $price = $_POST['price'];
                //khai báo 1 biến $soluong tượng trưng cho số lượng sản phẩm
                $soluong = isset($_POST['quanlity'])?$_POST['quanlity']:1;
                $ttien = $price * $soluong;
                // tạo biến $spadd  chúa thông tin vừa lấy được
                $spadd = [$id, $name, $image, $price, $soluong, $ttien];
                // tạo cờ flag cho giá trị mặc định = 0, tạo biến i = 0;
                $flag = 0;
                $i = 0;
                // kiểm tra biến id có tồn tại trong session ['mycart'] hay không
                // nếu có thì cập nhật lại số lượng

                // còn ngược lại thì cập nhật giỏ hàng
                foreach ($_SESSION['mycart'] as $cartItem) {
                    if ($id == $cartItem[0]) {
                        $flag = 1;
                        break;
                    }
                    $i++;
                }
                // đẩy $spadd có chứa mảng thông tin () vào session['mycart']
                if (isset($_POST['id']) && $flag == 0) {
                    array_push($_SESSION['mycart'], $spadd);
                } elseif (isset($_POST['id']) && $flag == 1) {
                    $_SESSION['mycart'][$i][4] += $soluong;
                }
            }
            header("Location: index.php?act=sanpham");
            include "view/cart/cart.php";
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                // gỡ bỏ phần tử được chỉ định bởi tham số offset($_GET['idcart']) và length = 1 từ mảng $_session['mycart']
                // nó trả về mảng 
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                // Khởi tạo lại mảng session my cart
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;

            // bill
        case 'bill';
            include "view/cart/bill.php";
            break;

        case 'billconfirm';
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if (isset($_SESSION['user'])) {
                    $iduser = $_SESSION['user']['id'];
                } else {
                    $iduser = 0;
                }

                $name = $_POST['name'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('H:i:sa d/m/Y');
                $tongdonhang = tongdonhang();
                // tạo bill insert_donhang()

                // echo $idbill;
                $idbill = insert_donhang($iduser, $name, $address, $tel, $email, $pttt, $ngaydathang, $tongdonhang);
                // 


                // insert into cart : $session['mycart'] & idbill
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    //  $spadd=[$id,$name,$img,$price,$soluong,$ttien];
                }
                // sau khi insert session['mycart'] vào bảng cart
                // Xóa session
                $_SESSION['mycart'] = [];
            }
            // tạo ra biến $bill, $billct chứa giá trị trả về của function loadone_bill, loadallcart (có truyền tham số $idbill đã được khai báo ở trên)
            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include "view/cart/billconfirm.php";
            break;
        case 'mybill';
            $listbill = loadall_bill($_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
        case 'ctdh';
            $bill = loadone_bill($_GET['idbill']);
            $billct = loadall_cart($_GET['idbill']);
            include 'view/cart/billdetail.php';
            break;
        case 'comment':
            if(isset($_POST['sentcomment']) &&($_POST['sentcomment'])>0){
                $idproduct = $_GET['id'];
                $noidung = $_POST['comment'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:m:s');
                // var_dump($_SESSION['user']);
                $iduser = $_SESSION['user']['id'];
                if(isset($_SESSION['user'])){
                    sentcomment($iduser,$noidung,$idproduct,$date);
                    header('location: index.php?act=sanphamct&idsp='.$idproduct.'');
                }else{
                    header('location: index.php?act=dangnhap');
                }
            }
            // include 'view/product/detail.php';
            break;
        case 'deletecmt':         
            $id = $_GET['idproduct'] ? $_GET['idproduct'] : '';
            deletecomment($id);
            header('location: index.php?act=sanphamct&idsp='.$_GET['idprofile'].'');
            break;
        case 'contact':         
            include "view/contact/contact.php";
            break;
        default:
            include "view/home/home.php";
            break;
    }
} else {
    include "view/home/home.php";
}

include "part/footer.php";

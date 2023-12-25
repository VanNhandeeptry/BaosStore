<?php
session_start();
ob_start();
include "../global.php";
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/cart.php";
include "../model/binhluan.php";
include "header.php";
// if(!isset($_SESSION['user'])){
//     header('Location: ../index.php');
// }
// if(isset($_SESSION['user'])&&($_SESSION['user']['role']!=1)){
//     header('Location: ../index.php');
// }
//controller
if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            // kiểm tra có click vào nút add hay không
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $error = array();
                $tenloai = $_POST['tenloai'];
                // upload file hình cần bổ sung
                $hinh = $_FILES['hinhdanhmuc']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir.basename($_FILES["hinhdanhmuc"]["name"]);
                move_uploaded_file($_FILES["hinhdanhmuc"]["tmp_name"], $target_file);
                if ($hinh == "") {
                    $error['hinhdanhmuc'] = "Không để trống hình ảnh";
                }
                $imageFileType = strtolower(pathinfo($hinh, PATHINFO_EXTENSION));
                if($hinh != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
                    $error['hinhdanhmuc'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                }
                if (strlen($tenloai) == 0) {
                    $error['tenloai'] = "Không để trống tên danh mục!";
                }
                if (!$error) {
                    $is_inserted =   insert_danhmuc($tenloai, $hinh);
                    if ($is_inserted) {
                        $thongbao = "Thêm Danh Mục Thành Công";
                    }
                } else {
                    $thongbao = "Thêm Bài Danh Mục Thất Bại";
                }
              
                // $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'dsdm':
            //function loaddall_danhmuc tra ve 1 mang (co lenh return)
            //khai bao 1 bien chua cac gia tri tra ve cua function loadall_danhmuc
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_danhmuc($_GET['id']);
            }
            $listdm = loadall_danhmuc();
            include 'danhmuc/list.php';
            break;

        case 'suadm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $dm =  loadone_danhmuc($_GET['id']);
            }
            include 'danhmuc/update.php';
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = 'Cập nhật thành công';
            }
            $listdm = loadall_danhmuc();
            include 'danhmuc/list.php';
            break;

            // Controller Sản Phẩm
        case 'addsp':
            // kiểm tra có click vào nút add hay không
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $error = array();
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $thongtin = $_POST['thongtin'];
                // upload file hình cần bổ sung
                $hinhsp = $_FILES['anhsp']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir.basename($_FILES["anhsp"]["name"]);
                move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file);
                if ($hinhsp == "") {
                    $error['anhsp'] = "Không để trống hình ảnh";
                }
                $imageFileType = strtolower(pathinfo($hinhsp, PATHINFO_EXTENSION));
                if($hinhsp != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
                    $error['anhsp'] = "Chỉ file JPG, JPEG, PNG & GIF files được cho phép";
                }
                if (strlen($tensp) == 0) {
                    $error['tensp'] = "Không để trống tên sản phẩm!";
                }
                if (strlen($giasp) == 0) {
                    $error['giasp'] = "Không để trống giá sản phẩm!";
                }
                if (strlen($thongtin) == 0) {
                    $error['thongtin'] = "Không để trống thông tin sản phẩm!";
                }
                if (!$error) {
                    $is_inserted = insert_sanpham($tensp, $giasp, $hinhsp, $thongtin, $iddm);
                    if ($is_inserted) {
                        $thongbao = "Thêm Sản Phẩm Thành Công";
                    }
                } else {
                    $thongbao = "Thêm Sản Phẩm Thất Bại";
                }
                
                // $thongbao = "Thêm thành công";
            }
            $listdm = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'dssp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['keyword'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsp = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdm = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $thongtin = $_POST['thongtin'];
                // upload file hình cần bổ sung
                $hinhsp = $_FILES['anhsp']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id, $tensp, $giasp, $hinhsp, $thongtin);
                $thongbao = "Cập nhật thành công";
            }
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
            // khách hàng
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            // $sql= "select * from taikhoan order by name";
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'suatk';
            // trường (field) id ở đây trong bảng user mình thiết lập A.I (auto increment)
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/update.php";
            break;
        case 'updatetk';
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $diachi = $_POST['address'];
                $id = $_POST['id'];
                // Cập nhật tài khoản
                update_taikhoan($id, $name, $pass, $email, $diachi, $tel);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'thoat':
            session_unset();
            header('Location: http://localhost:3000/index.php');
            break;
        case 'listbill':
            if(isset($_POST['approve'])){
                $id_bill = $_POST['id_bill'];
                approvebill($id_bill);
            }
            if(isset($_POST['cancel'])){
                $id_bill = $_POST['id_bill'];
                cancelbill($id_bill);
            }
            $listbill = loadall_bill(0);
            include "bill/listbill.php";
            break;
        case 'billsucess':
            // if(isset($_POST['approve'])){
            //     $id_bill = $_POST['id_bill'];
            //     approvebill($id_bill);
            // }
            // if(isset($_POST['cancel'])){
            //     $id_bill = $_POST['id_bill'];
            //     cancelbill($id_bill);
            // }
            if(isset($_POST['thanhcong'])){
                $id_bill = $_POST['id_bill'];
                sucessbill($id_bill);
            }
            if(isset($_POST['thatbai'])){
                $id_bill = $_POST['id_bill'];
                failbill($id_bill);
            }
            $listbill = loadall_billsucess(0);
            include "bill/billsucess.php";
            break;
        case 'ctdh';
            $bill = loadone_bill($_GET['idbill']);
            $billct = loadall_cart($_GET['idbill']);
            include 'bill/ctdh.php';
            break;
        case 'xoadh':
            if(isset($_GET['id'])&&($_GET['id']>0)) {
                delete_donhang($_GET['id']);
            }
            $listbill = loadall_bill(0);
            include "bill/listbill.php";
            break;
        case 'listcomment':
            include "comment/listcomment.php";
            break;
        case 'deletecmt':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $delete_comment = deletecomment_blog($_GET['id']);
            }
            include "comment/listcomment.php";
            break;
        default:
            include "dashboard.php";
            break;
    }
} else {
    include "dashboard.php";
}
include "footer.php";

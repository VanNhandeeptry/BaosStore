<?php
    $dsdm = loadall_danhmuc();
?>
<div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Baos</span>Store</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="index.php?act=sanpham" class="nav-item nav-link">Shop</a>
                            <a href="index.php?act=viewcart" class="nav-item nav-link">Shopping Cart</a>
                            <a href="index.php?act=bill" class="nav-item nav-link">Checkout</a>
                            
                            <a href="index.php?act=contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <!-- xử lí  $_SESSION['user'] -->
                        <div class="nav-item dropdown">
                            <?php
                                if(isset($_SESSION['user'])) {
                                    extract($_SESSION['user']);// gọi thẳng tên cột (key)
                                    
                                
                            ?>
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Xin chào <?=$name?></a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="index.php?act=viewcart"><button class="dropdown-item" type="button">Giỏ hàng của bạn</button></a>
                                    <?php if($role == 1) { ?>
                                        <a href="admin/index.php"><button class="dropdown-item" type="button">Đăng nhập Admin</button></a>
                                    <?php } ?>
                                    <a href="index.php?act=mybill"><button class="dropdown-item" type="button">Lịch sử mua hàng</button></a>
                                    <a href="index.php?act=edit_taikhoan"><button class="dropdown-item" type="button">Cập nhật tài khoản</button></a>
                                    <a href="index.php?act=thoat"><button class="dropdown-item" type="button">Thoát</button></a>
                                </div>
                            <?php
                                }else{
                                    echo '
                                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                                        <div class="dropdown-menu dropdown-menu-right"><a href=""></a>
                                            <a href="index.php?act=dangnhap"><button class="dropdown-item" type="button">Đăng nhập</button></a>
                                            <a href="index.php?act=dangky"><button class="dropdown-item" type="button">Đăng ký</button></a>
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                        
                    </div>
                </nav>
                <!-- <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My account</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="index.php?act=dangnhap"><button class="dropdown-item" type="button">Đăng nhập</button></a>
                    <a href="index.php?act=dangky"><button class="dropdown-item" type="button">Đăng ký</button></a>
                </div> -->
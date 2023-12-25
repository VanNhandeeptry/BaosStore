<?php
    if (is_array($taikhoan)) {
        extract($taikhoan);// gọi thẳng các tên trường của bảng user
        
    }
?>
<!-- Checkout Start -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật tài khoản</h1>
    </div>
    <div class="row px-xl-5 d-flex justify-content-center">
        <div class="col-lg-5">
            <!-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cập nhật tài khoản</span></h5> -->
            <div class="bg-light p-30 mb-5 ">
                <div class="row flex-column">
                    <form action="index.php?act=updatetk" method="post">
                        <div class="col-md-10 form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="<?=$name?>">
                        </div>
                        <div class="col-md-10 form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="pass" value="<?=$password?>">
                        </div>
                        <div class="col-md-10 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" value="<?=$email?>">
                        </div>
                        <div class="col-md-10 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" name="tel" value="<?=$tel?>">
                        </div>
                        <div class="col-md-10 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" name="address" value="<?=$address?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
                            <input type="submit" value="Cập nhật" class="btn btn-success" name="capnhat">
                            <input type="reset" value="Nhập lại" class="btn btn-warning">
                        </div>
                    </form>
                    <h3>
                    <?php
                        if(isset($thongbao) && ($thongbao)) {
                            echo $thongbao;
                        }
                    ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->
<!-- Checkout Start -->
<div class="container-fluid border-top">
    <div class="row px-xl-5 d-flex justify-content-center">
        <div class="col-lg-5 border border-success mt-3">
            <h5 class="section-title position-relative text-uppercase mb-3 mt-5"><span class="bg-secondary pr-3">Cập nhật tài khoản</span></h5>
            <div class="bg-light p-30 mb-5 ">
                <div class="row flex-column">
                    <?php
                        if(isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                            extract($_SESSION['user']);
                        }
                    ?>
                    <form action="index.php?act=edit_taikhoan" method="post" >
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
                            <label>Mobile Number</label>
                            <input class="form-control" type="text" name="tel" value="<?=$tel?>">
                        </div>
                        <div class="col-md-10 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="address" value="<?=$address?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="hidden" name="id" value="<?=$id?>">
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
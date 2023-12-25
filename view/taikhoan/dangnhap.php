<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5 d-flex justify-content-center">
        <div class="col-lg-3">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Đăng nhập</span></h5>
            <div class="bg-light p-30 mb-5 w-100">
                <div class="row">
                    <form action="index.php?act=dangnhap" method="post">
                        <div class="col-mb-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="Doe" name="email">
                        </div>
                        <div class="col-mb-6 form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="pass">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" > Ghi nhớ tài khoản?
                        </div>
                        <div class="col-md-6 form-group mt-5">
                            <input type="submit" value="Đăng nhập" name="dangnhap" class="btn btn-success">
                        </div>
                        <?php
                            
                            $error = [];
                            $email = isset($_POST['email'])?$_POST['email']:"";
                            $pass = isset($_POST['pass'])?$_POST['pass']:"";
                            
                            if(isset($_POST['email'])){
                                if($email=="") array_push($error,"Email không được để trống"); 
                                if($pass=="") array_push($error,"Password không được để trống");  
                                
                                if(count($error)>0){ ?>
                                    <ul style="color:red">
                                    <?php foreach($error as $key=>$value){?>
                                        <li><?php echo $value;?></li>
                                    <?php      
                                    }
                                }else{
                                    $checkuser = checkuser($email, $pass);
                                    if (is_array($checkuser)) {
                                        $_SESSION['user'] = $checkuser;
                                        header('Location: index.php');
                                    } 
                                }
                            }
                            
                                
                                
                        ?>
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
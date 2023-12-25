
<!-- Checkout Start -->
<div class="container-fluid border-top">
    <div class="row px-xl-5 d-flex justify-content-center">
        <div class="col-lg-3  border border-success mt-3">
            <h5 class="section-title position-relative text-uppercase mb-3 mt-5 "><span class=" pr-3">Đăng ký thành viên</span></h5>
            <div class="bg-light p-30 mb-5 w-100">
                <div class="row d-flex justify-content-center">
                    <form action="index.php?act=dangky" method="post" class="input-fluid">
                        <div class="p-2 col-mb-12 form-group">
                            <label>Tên đăng nhập</label>
                            <input class="form-control input-sm" type="text" placeholder="Doe" name="name">
                        </div>
                        <div class="p-2 col-mb-12 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" name="email">
                        </div>
                        <div class="p-2 col-mb-12 form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="pass">
                        </div>
                        <div class="p-2 col-md-12 form-group d-flex justify-content-between">
                            <input type="submit" value="Đăng ký" name="dangky" class="btn btn-success">
                            <input type="reset" value="Nhập lại" class="btn btn-warning">
                        </div>
                        <?php
                            
                            $error = [];
                            $email = isset($_POST['email'])?$_POST['email']:"";
                            $name = isset($_POST['name'])?$_POST['name']:"";
                            $pass = isset($_POST['pass'])?$_POST['pass']:"";
                            
                            if(isset($_POST['name'])){
                                if($name=="") array_push($error,"Username không được để trống");
                                if($email=="") array_push($error,"Email không được để trống"); 
                                if($pass=="") array_push($error,"Password không được để trống");  
                                
                                // $db->query($sql);
                                $check = check($name,$email);
                                if(is_array($check)) array_push($error,"Username hoặc email đã tồn tại");
                                // Đã có người đăng kí user 
                                
                                if(count($error)>0){ ?>
                                    <ul style="color:red">
                                    <?php foreach($error as $key=>$value){?>
                                        <li><?php echo $value;?></li>
                                    <?php      
                                    }
                                }else{
                                    insert_taikhoan($email,$name,$pass);
                                    $thongbao= "Đăng ký thành công.";
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
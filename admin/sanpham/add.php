<style>
    .error-form{
        color: red;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">THÊM MỚI SẢN PHẨM</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <form class="bg-light p-4 m-1" action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="iddm">Danh mục sản phẩm</label>
                <select name="iddm" id="iddm">
                    <?php
                        foreach ($listdm as $danhmuc) {
                            extract($danhmuc);
                            echo '
                                <option value="'.$id.'">'.$name.'</option>
                            ';
                        }
                    ?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="tensp">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensp" id="tensp">
                <p class="error-form">
                    <?php
                        if (isset($error['tensp'])) {
                            echo $error['tensp'];
                        }
                    ?>
                </p>
            </div>
            <div class="form-group">
                <label for="giasp">Giá sản phẩm</label>
                <input type="text" class="form-control" name="giasp" id="giasp">
                <p class="error-form">
                    <?php
                        if (isset($error['giasp'])) {
                            echo $error['giasp'];
                        }
                    ?>
                </p>
            </div>
            <div class="form-group">
                <label for="anhsp">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="anhsp" id="anhsp">
                <p class="error-form">
                    <?php
                        if (isset($error['anhsp'])) {
                            echo $error['anhsp'];
                        }
                    ?>
                </p>
            </div>
            <div class="form-group">
                <label for="thongtin">Description</label><br>
                <textarea name="thongtin" cols="50" rows="5" id="thongtin"></textarea>
                <p class="error-form">
                    <?php
                        if (isset($error['thongtin'])) {
                            echo $error['thongtin'];
                        }
                    ?>
                </p>
            </div>

            <div class="form-group">
                <input type="submit" value="THÊM MỚI" class="btn btn-success" name="themmoi">
                <input type="reset" value="NHẬP LẠI" class="btn btn-warning">
            </div>
            <?php
                if(isset($thongbao)&&($thongbao!="")) {
                    echo $thongbao;
                }
            ?>
        </form>
    </div>
    
<?php
    if (is_array($sanpham)) {
        extract($sanpham);
    }
    $hinhpath = '../upload/'.$image;
    if (is_file($hinhpath)) {
        $hinh = "<img src='" . $hinhpath . "' height = '100' class='mb-5'>";
    } else {
        $hinh  = "no photo";
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật hàng hóa</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <form class="bg-light p-4 m-1" action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tensp">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensp" id="tensp" value="<?= $name ?>">
            </div>
            <div class="form-group">
                <label for="giasp">Giá sản phẩm</label>
                <input type="text" class="form-control" name="giasp" id="giasp" value="<?= $price ?>">
            </div>
            <div class="form-group">
                <label for="anhsp">Ảnh sản phẩm</label>
                <?=$hinh?>
                <input type="file" class="form-control" name="anhsp" id="anhsp">
            </div>
            <div class="form-group">
                <label for="thongtin">Description</label> <br>
                <textarea name="thongtin" cols="30" rows="10"><?= $description ?></textarea>
            </div>

            <div class="form-group">
                <input type="hidden" name="id" value="<?=$id ?>">
                <input type="submit" value="CẬP NHẬT" class="btn btn-success" name="capnhat">
                <input type="reset" value="NHẬP LẠI" class="btn btn-warning">
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
    </div>
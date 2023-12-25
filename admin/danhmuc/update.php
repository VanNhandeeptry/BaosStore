<?php
    if(is_array($dm)) {
        extract($dm);
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật danh mục hàng hóa</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <form class="bg-light p-4 m-1" action="index.php?act=updatedm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="maloai">Mã loại</label>
                <input type="text" class="form-control" name="maloai" id="maloai" disabled>
            </div>
            <div class="form-group">
                <label for="tenloai">Tên loại</label>
                <input type="text" class="form-control" name="tenloai" id="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name;?>">
            </div>

            <div class="form-group">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
                <input type="submit" value="CẬP NHẬT" class="btn btn-success" name="capnhat">
                <input type="reset" value="NHẬP LẠI" class="btn btn-warning">
            </div>
            <?php
                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
        </form>
    </div>


<style>
    .error-form{
        color: red;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">THÊM MỚI DANH MỤC</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <form class="bg-light p-4 m-1" action="index.php?act=adddm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="maloai">Mã loại</label>
                <input type="text" class="form-control" name="maloai" id="maloai" disabled>
            </div>
            <div class="form-group">
                <label for="tenloai">Tên loại</label>
                <input type="text" class="form-control" name="tenloai" id="tenloai">
                <p class="error-form">
                    <?php
                        if (isset($error['tenloai'])) {
                            echo $error['tenloai'];
                        }
                    ?>
                </p>
            </div>
            <div class="form-group">
                <label for="anhdm">Ảnh danh mục</label>
                <input type="file" class="form-control" name="hinhdanhmuc" id="anhdm">
                <p class="error-form">
                    <?php
                        if (isset($error['hinhdanhmuc'])) {
                            echo $error['hinhdanhmuc'];
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
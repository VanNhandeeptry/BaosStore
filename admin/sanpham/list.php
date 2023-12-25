<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">DANH SÁCH SẢN PHẨM</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <form class="bg-light p-4 m-1" action="index.php?act=dssp" method="post">
                <div class="form-group">
                    <input type="text" name="keyword">
                    <select name="iddm" id="iddm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                            foreach ($listdm as $danhmuc) {
                                extract($danhmuc);
                                echo '
                                    <option value="'.$id.'">'.$name.'</option>
                                ';
                            }
                        ?>
                    </select>
                    <input type="submit" value="GO" name="listok" class="btn btn-success">
                </div>
        </form>
        <table class="table table-bordered table-info">
            <thead>
                <tr>
                    <th>MÃ SẢN PHẨM</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH</th>
                    <th>GIÁ</th>
                    <th>ID DANH MỤC</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($listsp as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=".$id;
                        $xoasp = "index.php?act=xoasp&id=".$id;
                        $hinhpath = '../upload/'.$image;
                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' height = '100'>";
                        } else {
                            $hinh  = "no photo";
                        }

                        echo '
                            <tr>
                                
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$hinh.'</td>
                                <td>'.$price.'</td>
                                <td>'.$id_cate.'</td>
                                <td><a href="'.$suasp.'"><input type="button" value="Sửa" class="btn btn-success"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa" class="btn btn-warning"></a></td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
        <div class="form-group">
            <!-- <input type="button" value="Chọn tất cả" class="btn btn-success" name="themmoi">
            <input type="button" value="Bỏ chọn tất cả" class="btn btn-warning">
            <input type="button" value="Xóa các mục đã chọn" class="btn btn-warning"> -->
            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm" class="btn btn-success"></a>
        </div>    
    </div>            
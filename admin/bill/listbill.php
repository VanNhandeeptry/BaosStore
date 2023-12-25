<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">DANH SÁCH ĐƠN HÀNG</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered table-info">
            <thead>
                <tr>
                    <th></th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <th>Trạng thái</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listbill as $bill) {
                    extract($bill);
                    $khachhang = $bill["bill_name"] . '
                            <br>' . $bill["bill_email"] . '
                            <br>' . $bill["bill_address"] . '
                            <br>' . $bill["bill_tel"];
                    $countsp = loadall_cart_count($bill['id']);
                    $ttdh = get_ttdh($bill['bill_status']);
                    $suadh = "index.php?act=suadh&id=" . $id;
                    $xoadh = "index.php?act=xoadh&id=" . $id;
                    $linkdh = "index.php?act=ctdh&idbill=" . $bill['id'];

                    echo '
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><a href="' . $linkdh . '">BST-' . $bill['id'] . '</a></td>
                            <td>' . $khachhang . '</td>
                            <td>' . $countsp . '</td>
                            <td>' . $bill['total'] . '</td>
                            <td>' . $ttdh . '</td>
                            <td style="width: 50px"> ';
                    if ($bill_status == 0) { ?>
                        <form method="post">
                            <input name="id_bill" type="text" hidden value="<?php echo $bill['id']?>">
                            <button name="approve" class="btn btn-success mb-1">Duyệt</button>
                        </form>
                        <form method="post">
                            <input name="id_bill" type="text" hidden value="<?php echo $bill['id']?>">
                            <button name="cancel" class="btn btn-danger">Huỷ</button>
                        </form>
                <?php }
                    if ($bill_status == 1) {
                        echo '<label class="badge badge-success" for="">Đã duyệt</label>';
                    }
                    if ($bill_status == 2) {
                        echo '<label class="badge badge-danger" for="">Đã huỷ</label>';
                    }
                    echo ' </td>
                                         </tr>';
                }

                ?>


            </tbody>
        </table>

        <!-- <a href="'.$xoadh.'"><input type="button" value="Xóa" class="btn btn-warning"></a> -->
        <!-- <div class="form-group">
            <input type="button" value="Chọn tất cả" class="btn btn-success" name="themmoi">
            <input type="button" value="Bỏ chọn tất cả" class="btn btn-warning">
            <input type="button" value="Xóa các mục đã chọn" class="btn btn-warning">
            <a href="index.php?act=adddm"><input type="button" value="Nhập thêm" class="btn btn-success"></a>
        </div>     -->
        <!-- <td><a href="'.$suadh.'"><input type="button" value="Sửa" class="btn btn-success"></a> </td> -->
    </div>
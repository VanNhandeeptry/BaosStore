<?php
    function viewcart($del) {
        global $img_path;
        $tong = 0;
        $i = 0;
        if($del==1) {
            $xoasp_th= '<th>Remove</th>';
        }else{
            $xoasp_th= "";
        }
        echo '
            <thead class="thead-dark">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    '.$xoasp_th.' 
                </tr>
            </thead>
        ';

        foreach($_SESSION['mycart'] as $cart) {
            $hinh = $img_path.$cart[2];
            $ttien = $cart[3]*$cart[4];
            $tong += $ttien;
            if($del==1) {
                $xoasp_td= '<td class="align-middle table-primary border border-primary"><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" class="btn btn-sm btn-danger" value="Xóa"></a></td>';
            }else{
                $xoasp_td= "";
            }
            echo '
                
                <tr>
                    <td class="align-middle table-primary border border-primary"><img src="'.$hinh.'" alt="" style="width: 50px;"> '.$cart[1].'</td>
                    <td class="align-middle table-primary border border-primary">$'.$cart[3].'</td>
                    <td class="align-middle table-primary border border-primary">
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="'.$cart[4].'">
                        </div>
                    </td>
                    <td class="align-middle table-primary border border-primary">$'.$ttien.'</td>
                    '.$xoasp_td.'
                    
                </tr>
            ';
            $i += 1;        
        }
        echo '
            <tr>
                <td colspan="3" class="align-middle table-primary border border-primary">Tổng đơn hàng</td>
                <td colspan="2" class="align-middle table-primary border border-primary">'.$tong.'</td>
            </tr>
        ';
    }
    
    
    function tongdonhang() {
        $tong = 0;
        foreach($_SESSION['mycart'] as $cart) {
            
            $ttien = $cart[3]*$cart[4];
            $tong += $ttien;
         
        }
        return $tong;
        
    }

    function insert_donhang($iduser,$name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang) {
        $sql = "insert into bill (iduser,bill_name,bill_address,bill_tel,bill_email,bill_pttt,ngaydathang,total) values('$iduser','$name','$address','$tel','$email','$pttt','$ngaydathang','$tongdonhang')";
        return pdo_execute_return_lastInsertId($sql);
    }

    function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill) {
        $sql = "insert into cart (iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
        pdo_execute($sql);
    }

    function loadone_bill($id) {
        $sql = "select * from bill where id=".$id;
        $bill=pdo_query_one($sql);
        return $bill;
    }

    function loadall_cart($idbill) {
        $sql = "select * from cart where idbill=".$idbill;
        $bill=pdo_query($sql);
        return $bill;
    }

    function loadall_bill($iduser) {

        $sql = "select * from bill where 1";
        if($iduser >0) $sql.=" AND iduser=".$iduser;
        $sql.=" order by id desc";

        $listbill=pdo_query($sql);
        return $listbill;
    }
    
    function loadall_billsucess() {

        $sql = "select * from bill where bill_status=1";
        $sql.=" order by id desc";

        $listbill=pdo_query($sql);
        return $listbill;
    }

    function loadall_showbill() {
        $sql = "select * from bill";
        $listbill=pdo_query($sql);
        return $listbill;
    }

    function tong() {
        $sql = 'SELECT SUM(total) FROM `bill` WHERE bill_status =3';
        $tongdtdk=pdo_query_value($sql);
        return $tongdtdk;
    }

   

    function bill_chitiet($listbill) {
        global $img_path;
        $tong = 0;
        $i = 0;
        echo '
            <thead class="thead-dark">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
        ';

        foreach($listbill as $cart) {
            $hinh = $img_path.$cart['img'];
            $tong += $cart['thanhtien'];
            
            echo '
                <tr>
                    <td class="align-middle table-primary border border-primary"><img src="'.$hinh.'" alt="" style="width: 50px;"> '.$cart['name'].'</td>
                    <td class="align-middle table-primary border border-primary">$'.$cart['price'].'</td>
                    <td class="align-middle table-primary border border-primary">'.$cart['soluong'].'</td>
                    <td class="align-middle table-primary border border-primary">$'.$cart['thanhtien'].'</td>
                </tr>
            ';
            $i += 1;        
        }
        echo '
            <tr>
                <td colspan="3" class="align-middle table-primary border border-primary">Tổng đơn hàng</td>
                <td class="align-middle table-primary border border-primary">$'.$tong.'</td>
            </tr>
        ';
    }
    function approvebill($id_bill){
        $sql = "update bill set bill_status=1 where id=".$id_bill;
        pdo_execute($sql);
    }
    function cancelbill($id_bill){
        $sql = "update bill set bill_status=2 where id=".$id_bill;
        pdo_execute($sql);
    }
    function sucessbill($id_bill){
        $sql = "update bill set bill_status=3 where id=".$id_bill;
        pdo_execute($sql);
    }
    function failbill($id_bill){
        $sql = "update bill set bill_status=2 where id=".$id_bill;
        pdo_execute($sql);
    }
    function get_ttdh($n){
        switch ($n) {
            case '0':
                $tt='Đơn hàng mới';
                break;
            case '1':
                $tt='Đang giao hàng';
                break;
            case '2':
                $tt='Đã hủy';
                break;
            case '3':
                $tt='Đã giao hàng';
                break;
            default:
                $tt='Đơn hàng mới';
                break;
        }
        return $tt;
    }

    function get_pttt($n){
        switch ($n) {
            case '1':
                $tt='Thanh toán khi nhận hàng';
                break;
            case '2':
                $tt='Chuyển khoản';
                break;
            case '3':
                $tt='Thanh toán online';
                break;
            default:
                $tt='Thanh toán khi nhận hàng';
                break;
        }
        return $tt;
    }

    function loadall_cart_count($idbill) {
        $sql = "select * from cart where idbill=".$idbill;
        $bill=pdo_query($sql);
        return sizeof($bill);
    }
    
    function loadall_bill_sucess($idbill) {
        $sql = "select * from cart where idbill=".$idbill;
        $bill=pdo_query($sql);
        return sizeof($bill);
    }

    function delete_donhang($id) {
        $sql= "delete from cart where idbill=".$id;
        pdo_execute($sql);
    }

    
?>
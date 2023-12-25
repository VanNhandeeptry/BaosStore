<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <a class="breadcrumb-item text-dark" href="index.php">Shop</a>
                <a class="breadcrumb-item text-dark" href="./cart/viewcart.php">Shopping Cart</a>
                <span class="breadcrumb-item active">Your Bill</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Lịch sử mua hàng</span></h5>
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Số lượng mặt hàng</th>
                        <th>Tổng giá trị đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                    </tr>
                </thead>
                <?php
                    if(is_array($listbill)) {
                        foreach($listbill as $bill) {
                            extract($bill);
                            
                            $ttdh=get_ttdh($bill['bill_status']);
                            $countsp=loadall_cart_count($bill['id']);
                            $linkdh = "index.php?act=ctdh&idbill=".$bill['id'];
                            echo '
                                <tr>
                                    <td class="align-middle"><a href="'.$linkdh.'"> BST-'.$bill['id'].'</a></td>
                                    <td class="align-middle">'.$bill['ngaydathang'].'</td>
                                    <td class="align-middle">'.$countsp.'</td>
                                    <td class="align-middle">'.$bill['total'].'</td>
                                    <td class="align-middle">'.$ttdh.'</td>
                                </tr>
                            ';
                        }
                    }
                ?>
                    
            </table>
        </div>
    </div>   
</div>

<!-- Cart End --
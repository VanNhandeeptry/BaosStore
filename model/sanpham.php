<?php
    function insert_sanpham($tensp,$giasp,$hinhsp,$thongtin,$iddm) {
        $sql = "insert into product(name,price,image,description,id_cate) value ('$tensp','$giasp','$hinhsp','$thongtin','$iddm')";
        pdo_execute($sql);
    }
    function delete_sanpham($id) {
        $sql= "delete from product where id=".$id;
        pdo_execute($sql);
    }
    function loadall_sanpham($kyw,$iddm) {
        $sql="select * from product where 1";
        if($kyw!=""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and id_cate='".$iddm."'";
        }
        $sql.=" order by id desc limit 0,9";
        $listsp = pdo_query($sql);
        return $listsp;
    }

    function load_sanpham() {
        $sql="select * from product";
        $listsp = pdo_query($sql);
        return $listsp;
    }

    function loadall_sanpham_home() {
        $sql="select * from product where 1 order by id desc limit 0,8";
        $listsp = pdo_query($sql);
        return $listsp;
    }
    function loadall_sanpham_home1() {
        $sql="select * from product where 1 order by id asc limit 0,8";
        $listsp = pdo_query($sql);
        return $listsp;
    }
    function loadone_sanpham($id) {
        $sql = "select * from product where id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    
    function update_sanpham($id,$tensp,$giasp,$hinhsp,$thongtin) {
        if($hinhsp!=""){
            $sql = "update product set name='".$tensp."', price='".$giasp."', image='".$hinhsp."', description='".$thongtin."' where id=".$id;
        }else{
            $sql = "update product set name='".$tensp."', price='".$giasp."', description='".$thongtin."' where id=".$id;
        }
        pdo_execute($sql);
    }
    function load_sanpham_cungloai($id, $iddanhmuc) {
        // $sql="select * from product where id_cate ='.$iddanhmuc.' and id <>".$id;
        // $listsp = pdo_query($sql);
        $sql = "select * from product where id <>".$id." and id_cate ='.$iddanhmuc.' LIMIT 4";
        $spcungloais = pdo_query($sql);
        return $spcungloais;
    }
    function load_ten_dm($iddm) {
        $sql = "select * from categories where id=".$iddm;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
    }
    

    function loadall_sanpham_phantrang() {
        $page = isset($_GET['page']) ? $_GET['page'] : "1";
        $sl=6;
        $offset = ($page - 1) * $sl;
        $sql = "SELECT * FROM product LIMIT $sl OFFSET $offset";
        $listsp = pdo_query($sql);
        return $listsp;
    }

    function nut_phantrang() {
        $sql = "SELECT * FROM product";
        $listsp = pdo_query($sql);
        return $listsp;
    }
?>
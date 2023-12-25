<?php
function insert_danhmuc($tenloai,$hinh) {
    $sql = "insert into categories(name,img) value ('$tenloai','$hinh')";
    pdo_execute($sql);
}
function delete_danhmuc($id) {
    $sql= "delete from categories where id=".$id;
    pdo_execute($sql);
}
function loadall_danhmuc() {
    $sql="select * from categories order by id desc";
    $listdm = pdo_query($sql);
    return $listdm;
}
function loadone_danhmuc($id) {
    $sql = "select * from categories where id=".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$tenloai) {
    $sql = "update categories set name='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}
?>
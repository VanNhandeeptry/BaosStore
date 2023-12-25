<?php
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan) {
        $sql = "insert into binhluan (noidung,iduser,idproduct,ngayluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadall_binhluan($idpro) {
        $sql="select * from binhluan where 1";
        if($idpro>0) $sql.=" AND idproduct='".$idpro."'";
        $sql.=" order by id desc";
        $listbl = pdo_query($sql);
        return $listbl;
    }
    function delete_binhluan($id) {
        $sql = "delete from binhluan where id=".$id;
        pdo_execute($sql);
    }


    function sentcomment($iduser,$noidung,$idproduct,$date){
        $sql = "insert into comment(id_user,id_product,noi_dung,date_comment) values('$iduser','$idproduct','$noidung','$date')";
        pdo_execute($sql);
    }
    function showcomment($id){
        $sql = "SELECT * FROM comment
        JOIN product ON comment.id_product = product.id
        JOIN user ON comment.id_user = user.id 
        WHERE comment.id_product= '$id' ORDER BY date_comment DESC";
        $showcomment = pdo_query($sql);
        return $showcomment;
    }
    function showcomment_admin(){
        $sql = "SELECT * FROM comment
        JOIN product ON comment.id_product = product.id
        JOIN user ON comment.id_user = user.id 
        ORDER BY date_comment DESC";
        $showcomment = pdo_query($sql);
        return $showcomment;
    }
    function getprofile($id){
        $sql = "SELECT * FROM user WHERE id ='$id'";
        $showprofile = pdo_query($sql);
        return $showprofile;
    }
    function deletecomment($id){
        $sql = "DELETE FROM comment WHERE id_bl='$id'";
        pdo_execute($sql);
    }
    function deletecomment_blog($id){
        $sql = "delete from comment where id_bl='$id'";
        pdo_execute($sql);
    }
?>
<?php
    function insert_taikhoan($email,$name,$pass) {
        $sql = "insert into user(email,name,password) values('$email','$name','$pass')";
        pdo_execute($sql);
    }
    function checkuser($email,$pass) {
        $sql = "select * from user where email='".$email."' and password='".$pass."'";
        $tk=pdo_query_one($sql);
        return $tk;
    }
    function check($name,$email) {
        $sql = "select * from user where name='".$name."' and email='".$email."'";
        $tk=pdo_query_one($sql);
        return $tk;
    }
    
    function checkmail($email) {
        $sql = "select * from user where email='".$email."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function update_taikhoan($id,$name,$pass,$email,$diachi,$tel) {
        $sql = "update user set name='".$name."', password = '".$pass."', email='".$email."', address='".$diachi."', tel='".$tel."' where id=".$id;
        pdo_execute($sql);
    }

    function loadall_taikhoan() {
        $sql="select * from user order by id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }

    function delete_taikhoan($id) {
        $sql= "delete from user where id=".$id;
        pdo_execute($sql);
    }

    function loadone_taikhoan($id) {
        $sql = "select * from user where id=".$id;
        $tk=pdo_query_one($sql);
        return $tk;
    }

    //mình tạo 1 funtion ($param){
    // câu lệnh $sql = "select, update";
    // sau khi thực thi câu lệnh sql nó sẽ trả về 1 row (chứa mảng giá trị trả về) cho nên phải khai 1 biến chứa cái mảng đó ($list)
    // return ($list) gọi về biến đó;
    //}
    //mình tạo 1 funtion (){
    // câu lệnh $sql = "insert, delete"; không có lệnh return
    //}
?>
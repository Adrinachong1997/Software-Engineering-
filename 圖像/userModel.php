<?php
require_once("dbconfig.php");

function login($id, $pwd) 
{
    global $db;
    $_SESSION['id']=0;
    $_SESSION['sort']='';
    $_SESSION['admin']='';
    if ($id> " ") {
        $sql = "select * from user where id=? and password=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        $r=mysqli_fetch_assoc($result);
     	if($r) {
			$_SESSION['id'] = $r['id'];
            $_SESSION['sort'] = $r['sort'];
            return 1;
        }  
        else {
            return 0;
        } 
    } 
    return 0;
}

//檢查是否管理員
function checkAdmin($id, $pwd){
    global $db;
    $sql = "select * from user where id=? and password=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        $r=mysqli_fetch_assoc($result);
        if ($r['admin']==1){
            return 1;
        }
}
//取得目前玩家的隊名
function get_tname($uid){
    global $db;
    
        $sql = "select tname from tgame where r1=? or r2=? or r3=? or r4=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $uid, $uid, $uid, $uid);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        $r=mysqli_fetch_assoc($result);
        return $r['tname'];
         

}
function id_check($id) 
{
    global $db;
    
        $sql = "select * from user where id=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        $r=mysqli_fetch_assoc($result);
        if($r) {
            return 0;
        } else {
            return 1;
        } 

}

function loginout() 
{
    session_destroy();
    unset($_SESSION['id']);
    return;
}

function getRole() 
{
    return $_SESSION['sort'];
}

function getCurrentUser() 
{
    return $_SESSION['id'];
}

function pic_upload($name){
    if($_FILES['upload']['name']!=""){
        $target_path = "uploadfiles/"; //指定上傳資料夾
        $target_path .= $name.".png"; //上傳檔案名稱

        if(move_uploaded_file($_FILES['upload']['tmp_name'],iconv("UTF-8", "big5", $target_path ))) {
            return "檔案：上傳成功!";
            } else{
            return "檔案上傳失敗，請再試一次!";
        }
    } 
}

function pic_name($name){
    if(file_exists("uploadfiles/".$name.".png")){
        return $name;
    }else{
        return '0';
    }
}
?>


<?php
require_once("dbconfig.php");

function login($id, $pwd) 
{
    global $db;
    $_SESSION['id']=0;
	$_SESSION['sort']='';
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
        } else {
            return 0;
        } 
    } 
    return 0;
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
    session_start();
    session_destroy();
    unset($_SESSION['id']);
    return;
}
function getRole() 
{
    session_start();
    return $_SESSION['sort'];
}
function getCurrentUser() 
{
    session_start();
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
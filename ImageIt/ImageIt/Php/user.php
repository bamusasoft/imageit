<?php
session_start();
require_once('connection.php');
$errmsg_arr = array();
$errFlag = false;
$userName = $_POST['username'];
$password = $_POST['password'];

$query =  "SELECT * FROM users where UserName = '$userName' AND Password = '$password'" ;
$result = mysql_query($query);
if($result){
    if (mysql_num_rows($result) > 0)
    {
        session_regenerate_id();
        $member = mysql_fetch_assoc($result);
        $_SESSION['SESS_MEMBER_ID'] = $member['Id'];
        $_SESSION['SESS_USER']= $member['UserName'];
        session_write_close();
        header("location: ../home.php");
        exit();
    }
    
    }
else
{
    die("Query failed");
}



?>
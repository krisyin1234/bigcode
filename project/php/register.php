<?php
mysql_connect('127.0.0.1','root','root');
mysql_query('use sz1904');

$username = $_POST['username'];
$password = $_POST['password'];

$sql1 = "select * from username where uname = '$username'";
$result = mysql_query($sql1);
$row = mysql_fetch_assoc($result);
if ($row) {
    $res = [
        'code' => 200,
        'message' => '用户名已占用'
    ];
    echo json_encode($res);exit;
}


$sql = "insert into username(uname,password) values('$username','$password')";
mysql_query($sql);

$num = mysql_affected_rows();
if ($num > 0) {
    $res = [
        'code' => 200,
        'message' => '注册成功'
    ];
}else {
    $res = [
        'code' => -2,
        'message' => '网络异常，请稍后重试'
    ];
}

echo json_encode($res);
?>
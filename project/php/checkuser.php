<?php
sleep(2);
mysql_connect('127.0.0.1','root','root');
mysql_query('use sz1904');

$name = $_GET['username'];
$pass = $_GET['password'];

$sql = "select * from username where uname='$name' and password='$pass'";
$result =  mysql_query($sql);
$row = mysql_fetch_assoc($result);

if ($row) {
    $response = [
        "code" => 200,
        "message" => "成功登录",
    ];
} else {
    $response = [
        "code" => -1,
        "message" => "登录失败",
    ];
}
echo json_encode($response);

?>
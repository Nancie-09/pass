<?php
$host = '121.196.145.151';
$h_name = 'root';
$h_pwd = '123456';
$char = 'utf8';
$h_db = 'pass';
$conn = mysqli_connect($host,$h_name,$h_pwd,$h_db);//链接到数据库
if(!@$conn){
    echo '链接失败'.mysqli_connect_error();//链接失败返回信息
}
else
    echo "数据库链接成功\n";
mysqli_set_charset($conn,$char);//设置字符集
?>
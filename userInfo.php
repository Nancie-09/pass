<?php
include 'configPass.php';
header("Content-type:text/html;charset=utf-8");
function getOpenId() {
    $appid="wxb2ef199bacb83d5e";
    $secret="c217d885faa660b70e3b4368882e2d89";//小程序appid与secret配置
    if(isset($_POST["code"])&&$_POST["code"]<>""){
        $js_code=$_POST["code"];
    }
    else {
        die("ERROR");
    }//获得js_code
    $url="https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$js_code."&grant_type=authorization_code";
    $tmpstr=geturl($url);
    echo $tmpstr;//输出数据以供小程序端获得
}

function getUrl($url){//geturl函数
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function wxUserLogin(){
    //微信用户登陆 首次登陆插入用户信息
    $wx_code = $_POST['wx_id'];
    $wx_name = $_POST['wx_name'];
    $wx_avatar= $_POST['wx_avatar'];
    $child_age = $_POST['child_age']; // int
    $parents_edu = $_POST['parents_edu'];
    $child_sex = $_POST['child_sex'];

    $sql = "insert into UserInfo values('{$wx_code}', '{$wx_name}', '{$wx_avatar}', {$child_age}, '{$parents_edu}', '{$child_sex}')";

    if(mysqli_query($conn,$sql))
        echo '插入成功';
    else
        echo '插入失败';
}

function wxUserUpdate(){
    //微信用户 修改用户信息
    $wx_code = $_POST['wx_id'];
    $wx_name = $_POST['wx_name'];
    $wx_avatar= $_POST['wx_avatar'];
    $child_age = $_POST['child_age']; // int
    $parents_edu = $_POST['parents_edu'];
    $child_sex = $_POST['child_sex'];

    $sql = "UPDATE UserInfo SET wx_name = '{$wx_name}', wx_avatar = '{$wx_avatar}', child_age = {$child_age}, parents_edu = '{$parents_edu}', child_sex = '{$child_sex}' WHERE wx_id = '{$wx_code}'";
    if(mysqli_query($conn,$sql))
        echo '更新成功\n';
    else
        echo '更新失败';
}




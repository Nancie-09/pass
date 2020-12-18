<?php
include 'configPass.php';

function passLevelQuery(){
    //排行榜前二十名
    $wx_code = $_POST['wx_id'];
    $sql = "select wx_id, all_pass from pass where all_pass in (select max(all_pass) from pass group by wx_id desc) order by all_pass desc limit 20";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) != 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: ".$row["wx_id"]."\n"."all_pass: ".$row["all_pass"]."\n";
            echo "-----------------------------------------\n";
        }
    }

}

function userPassScoreQuery(){
    $wx_code = $_POST['wx_id'];
    //最初的
    $sql = "select * from pass where wx_id = '{$wx_code}' order by pass_date limit 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) != 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: ".$row["wx_id"]."\n"."all_pass: ".$row["all_pass"]."\n";
            echo "-----------------------------------------\n";
        }
    }

    //最高的
    $sql = "select wx_id, max(all_pass) from pass where wx_id = '{$wx_code}'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) != 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: ".$row["wx_id"]."\n"."all_pass: ".$row["all_pass"]."\n";
            echo "-----------------------------------------\n";
        }
    }

    //最新的
    $sql = "select * from pass where wx_id = '{$wx_code}' order by pass_date desc limit 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) != 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: ".$row["wx_id"]."\n"."all_pass: ".$row["all_pass"]."\n";
            echo "-----------------------------------------\n";
        }
    }
}

function userPassScoreUpdate(){
    //修改 update pass score
    $sql = "UPDATE pass SET name = '123' WHERE wx_id = '{$wx_code}'";
    if (mysqli_query($conn, $sql))
        echo '插入成功\n';
}


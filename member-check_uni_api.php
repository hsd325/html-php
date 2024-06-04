<?php
// 和20240201-SPA.html有關
// 功能:這是用來檢查帳號是否存在的php

//input: {"Username":"XX"}
// {"state" : true, "message" : "帳號不存在, 可以使用!"}
// {"state" : false, "message" : "帳號已存在,不可以使用!"}
// {"state" : false, "message" : "傳遞參數格式錯誤!"}
// {"state" : false, "message" : "未傳遞任何參數!"}

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Username"]) && $mydata["Username"] != "") {
        $p_Username = $mydata["Username"];

        // 本機的
        // $servername = "localhost";
        // $username = "owner01";
        // $password = "123456";
        // $dbname = "testdb";

        // 網路的
        // 指定網址才能使用此php檔案
        header("Access-Control-Allow-Origin: *");
        $servername = "localhost";
        $username = "id22011870_hsd325";
        $password = "Hsd325hsd325.";
        $dbname = "id22011870_hsd325";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }

        $sql = "SELECT Username FROM member WHERE Username = '$p_Username'";
        $result = mysqli_query($conn, $sql);
        // mysqli_num_rows($result) : 統計$result從資料庫會找到幾筆資料
        if (mysqli_num_rows($result) == 0) {
            //帳號不存在, 可以使用
            echo '{"state" : true, "message" : "帳號不存在, 可以使用!"}';
        } else {
            //帳號存在, 不可以使用
            echo '{"state" : false, "message" : "帳號已存在,不可以使用!"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

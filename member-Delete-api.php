<?php
// 和member-control_panel.html有關係
// 功能 : 刪除商品

//input: {"ID":"XX"}
// {"state" : true, "message" : "刪除成功!"}
// {"state" : false, "message" : "刪除失敗!"}
// {"state" : false, "message" : "傳遞參數格式錯誤!"}
// {"state" : false, "message" : "未傳遞任何參數!"}

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["ID"]) && $mydata["ID"] != "") {
        $p_ID = $mydata["ID"];

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

        $sql = "DELETE FROM member WHERE ID = '$p_ID'";
        if (mysqli_query($conn, $sql)) {
            //刪除成功
            echo '{"state" : true, "message" : "刪除成功!"}';
        } else {
            //刪除失敗
            echo '{"state" : false, "message" : "刪除失敗!' . $sql . '"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

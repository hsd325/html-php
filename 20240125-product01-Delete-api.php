<?php
// 刪除20240125-product01-Read.html指定的資料，連到product01資料庫

//input: {"ID":"1"}
// output:
// {"state" : true, "message" : "刪除成功!"}
// {"state" : false, "message" : "刪除失敗!"}
// {"state" : false, "message" : "傳遞參數格式錯誤!"}
// {"state" : false, "message" : "未傳遞任何參數!"}
$data = file_get_contents("php://input", "r");
if ($data != "") {
    // 上面的if: 有傳入資料才會動作
    $mydata = array();
    // 建立陣列($mydata)
    $mydata = json_decode($data, true);
    // 陣列($mydata)的內容一筆一筆輸入進去，輸入內容為$data的內容(jason格式的寫法)
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
        //  連線資料庫
        if (!$conn) {
            // 如果連線失敗
            die("連線失敗" . mysqli_connect_errno());
        }

        $sql = "DELETE FROM product01 WHERE ID = '$p_ID'";
        if (mysqli_query($conn, $sql)) {
            //刪除成功
            echo '{"state" : true, "message" : "刪除成功!"}';
        } else {
            //刪除失敗
            echo '{"state" : false, "message" : "刪除失敗!"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

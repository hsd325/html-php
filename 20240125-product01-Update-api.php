<!-- 更改20240125-product01-Read.html指定的資料，連到product01資料庫 -->
<?php
//input: {"ID":"1","Pname":"奶茶", "Price":"50"}
// output:
// {"state" : true, "message" : "更新成功!"}
// {"state" : false, "message" : "更新失敗!"}
// {"state" : false, "message" : "傳遞參數格式錯誤!"}
// {"state" : false, "message" : "未傳遞任何參數!"}

$data = file_get_contents("php://input", "r");

if ($data != "") {
    // 上面的if: 有傳入資料才會動作

    // file_get_contents : 接收外部傳入的資料
    $mydata = array();
    // 建立陣列($mydata)
    $mydata = json_decode($data, true);
    // 陣列($mydata)的內容一筆一筆輸入進去，輸入內容為$data的內容(jason格式的寫法)
    if (isset($mydata["ID"]) && isset($mydata["Pname"]) && isset($mydata["Price"]) && $mydata["ID"] != "" && $mydata["Pname"] != "" && $mydata["Price"] != "") {
        $p_ID = $mydata["ID"];
        $p_Pname = $mydata["Pname"];
        $p_Price = $mydata["Price"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "testdb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        //  連線資料庫
        if (!$conn) {
            // 如果連線失敗
            die("連線失敗" . mysqli_connect_errno());
        }
        $sql = "UPDATE product01 SET Pname = '$p_Pname', Price = '$p_Price' WHERE ID = '$p_ID'";
        // 上面接收的資料用在上面這一行
        if (mysqli_query($conn, $sql)) {
            //更新成功
            echo '{"state" : true, "message" : "更新成功!"}';
        } else {
            //更新失敗
            echo '{"state" : false, "message" : "更新失敗!"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

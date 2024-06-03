<!-- 接收20240123-product01-Create.html的資料，並去資料表product01建立資料 -->
<?php
//input: {"Pname":"奶茶", "Price":"50", "Sugar":"全糖", "Num":"10", "Delivery":"true", "Added":"珍珠","Pay":"刷卡","Total":"500"}
// $data='{"Pname":"無糖奶茶", "Price":"50", "Sugar":"全糖", "Num":"10", "Delivery":"true", "Added":"珍珠","Pay":"刷卡","Total":"500"}';
// $data : 陣列+jason格式的寫法

$data = file_get_contents("php://input", "r");

if ($data != "") {
    // 上面的if: 有傳入資料才會動作

    // file_get_contents : 接收外部傳入的資料
    $mydata = array();
    // 建立陣列($mydata)
    $mydata = json_decode($data, true);
    // 陣列($mydata)的內容一筆一筆輸入進去，輸入內容為$data的內容(jason格式的寫法)
    if (isset($mydata["Pname"]) && isset($mydata["Price"]) && isset($mydata["Sugar"]) && isset($mydata["Num"]) && isset($mydata["Delivery"]) && isset($mydata["Added"]) && isset($mydata["Pay"]) && isset($mydata["Total"]) && $mydata["Pname"] != "" && $mydata["Price"] != "" && $mydata["Sugar"] != "" && $mydata["Num"] != "" && $mydata["Delivery"] != "" && $mydata["Added"] != "" && $mydata["Pay"] != "" && $mydata["Total"] != "") {

        $p_Pname = $mydata["Pname"];
        $p_Price = $mydata["Price"];
        $p_Sugar = $mydata["Sugar"];
        $p_Num = $mydata["Num"];
        $p_Delivery = $mydata["Delivery"];
        $p_Added = $mydata["Added"];
        $p_Pay = $mydata["Pay"];
        $p_Total = $mydata["Total"];
        // 將Price的資料提取出來


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
        $sql = "INSERT INTO product01(Pname, Price, Sugar, Num, Delivery, Added, Pay, Total) VALUES('$p_Pname', '$p_Price', '$p_Sugar', '$p_Num', '$p_Delivery', '$p_Added', '$p_Pay', '$p_Total' )";
        // 上面接收的資料用在上面這一行
        if (mysqli_query($conn, $sql)) {
            // 新增成功
            echo '{"state" : true, "message" : "新增成功!"}';
            // echo "新增成功!";
        } else {
            // 新增失敗
            echo '{"state" : false, "message" : "新增失敗:' . $sql . mysqli_errno($conn) . '"}';
            // echo "新增失敗!" . $sql . mysqli_errno($conn);
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : true, "message" : "未傳遞任何參數!"}';
}

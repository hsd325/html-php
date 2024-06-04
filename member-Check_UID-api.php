<?php
// 和20240123-product01-Create.html、20240201-SPA.html有關係
// 功能:獲得cookie資料來檢查資料庫是否由符合的帳號，有的話再將此帳號的Username、Email、UID01都已jason格式傳回去

// {"UID01":"XXXXXXXXXXXXX"}
// {"state" : true, "data": "會員資料", "message" : "驗證成功, 可以登入!"}
// {"state" : false, "message" : "驗證失敗, 不許登入!"}
// {"state" : false, "message" : "傳遞參數格式錯誤!"}
// {"state" : false, "message" : "未傳遞任何參數!"}

$data = file_get_contents("php://input", "r");
// 可收取html給予的資料
if ($data != "") {
    $mydata = array();
    // 變陣列
    $mydata = json_decode($data, true);
    // json_decode，解讀jason檔變成陣列，解讀$data(jason格式)的內容

    // isset() : 檢查裡面的內容是否為空值
    if (isset($mydata["UID01"]) && $mydata["UID01"] != "") { // 如果mydata["UID01"]不為空值
        // html抓取的UID資料(從cookie抓的)為$p_UID01
        $p_UID01 = $mydata["UID01"];

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
        // 抓取 UID01 為 '$p_UID01'的那筆資料的Username、Email、UID01內容
        $sql = "SELECT Username, Email, UID01 FROM member WHERE UID01 = '$p_UID01'";
        $result = mysqli_query($conn, $sql);
        // mysqli_num_rows($result) : 統計$result從資料庫會找到幾筆資料
        if (mysqli_num_rows($result) == 1) { // 執行$sql後結果只有一個的話
            //驗證成功
            $mydata = array();
            // while ($row = mysqli_fetch_assoc($result)) 這句話會同時執行$row 的內容等= mysqli_fetch_assoc($result)這個動作
            while ($row = mysqli_fetch_assoc($result)) { // mysqli_fetch_assoc($讀取資料表結果)：讀取該資料表(資料庫的)中【1列】的資料，重複執行會讀去下一列的資料
                $mydata[] = $row;
            }
            echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "驗證成功, 可以登入!"}'; // 將此帳號的Username、Email、UID01都已jason格式傳回去
        } else {
            //驗證失敗
            echo '{"state" : false, "message" : "驗證失敗, 不許登入!' . $sql . '"}';
        }

        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

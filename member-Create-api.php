<?php
// 和20240201-SPA.html有關
// 功能: 註冊帳號

//input: {"Username":"XX", "Password":"XXX", "Email":"XXXXX"}
// {"state" : true, "message" : "註冊成功!"}
// {"state" : false, "message" : "註冊失敗!"}
// {"state" : false, "message" : "傳遞參數格式錯誤!"}
// {"state" : false, "message" : "未傳遞任何參數!"}

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Username"]) && isset($mydata["Password"]) && isset($mydata["Email"]) && $mydata["Username"] != "" && $mydata["Password"] != "" && $mydata["Email"] != "") {
        $p_Username = $mydata["Username"];
        //密碼加密PASSWORD_DEFAULT
        $p_Password = password_hash($mydata["Password"], PASSWORD_DEFAULT);
        $p_Email = $mydata["Email"];

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

        // UID01為cookie要用的值
        $sql = "INSERT INTO member(Username, Password, Email, UID01) VALUES('$p_Username', '$p_Password', '$p_Email', '')";
        if (mysqli_query($conn, $sql)) {
            //新增成功
            echo '{"state" : true, "message" : "註冊成功!"}';
        } else {
            //新增失敗
            echo '{"state" : false, "message" : "註冊失敗!"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

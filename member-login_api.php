<!-- 登入的比對確認，且會應用時間來創造出一段亂數拿來用在【UID01】裡面，UID01為cookie要使用的數 -->

<!-- password_verify($p_Password, $row["Password"]) //密碼比對正確, 撈取不包含密碼的使用者資料並產生uid -->

<?php
//input: {"Username":"XX", "Password":"XXX"}
// {"state" : true, "data": "登入後的帳號資料(密碼除外)", "message" : "登入成功!"}
// {"state" : false, "message" : "登入失敗!"}
// {"state" : false, "message" : "傳遞參數格式錯誤!"}
// {"state" : false, "message" : "未傳遞任何參數!"}

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Username"]) && isset($mydata["Password"]) && $mydata["Username"] != "" && $mydata["Password"] != "") {
        $p_Username = $mydata["Username"];
        $p_Password = $mydata["Password"];


        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "testdb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // $conn : 為與資料庫的連接的意思
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }

        $sql = "SELECT Username, Password, Email FROM member WHERE Username = '$p_Username'";
        $result = mysqli_query($conn, $sql);
        // mysqli_query($與資料庫的連接,"SELECT ... FROM 資料庫名稱")：從某資料庫中讀取資料表中【...】的資料
        if (mysqli_num_rows($result) == 1) {
            // mysqli_num_rows($讀取資料表結果)：回傳我們的資料有幾列
            //如果帳號有符合的, 密碼不確定，將會取得1筆資料
            $row = mysqli_fetch_assoc($result);
            // mysqli_fetch_assoc($讀取資料表結果)：讀取該資料表中列的資料，回傳的是一個陣列資料。
            if (password_verify($p_Password, $row["Password"])) {
                //密碼比對正確, 撈取不包含密碼的使用者資料並產生uid
                $uid = substr(hash("sha256", uniqid(time())), 0, 8);
                //【 0, 8 】 : 0代表起始位置(第0位)，抓8個的長度，有包含起始位置(第0位)
                // COOKIE的內容加密，使用的為目前時間，$myhash = hash("sha256", uniqid(time()));
                $sql = "UPDATE member SET UID01 = '$uid' WHERE Username = '$p_Username'";
                //更新uid至資料庫

                if (mysqli_query($conn, $sql)) {
                    // 如果連接成功
                    $sql = "SELECT Username, Email, UID01 FROM member WHERE Username = '$p_Username'";
                    // 上面這行的$sql是為了取代上面的$sql(有包含密碼的)，讓資料不包含密碼(因為安全問題)，而這樣在寫一次的原因
                    // 上面這行的$sql只有包含使用者的名稱和信箱和產生uid而已
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $mydata = array();
                    $mydata[] = $row;

                    echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "登入成功!"}';
                } else {
                    //uid更新錯誤
                    echo '{"state" : false, "message" : "登入失敗, uid更新錯誤"}';
                }
                // $result = mysqli_query($conn, $sql);
                // $row = mysqli_fetch_assoc($result);
                // $mydata = array();
                // $mydata[] = $row;

                // echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "登入成功!"}';
            } else {
                //密碼比對錯誤
                echo '{"state" : false, "message" : "登入失敗"}';
            }
        } else {
            //確認帳號不符合, 登入失敗
            echo '{"state" : false, "message" : "登入失敗"}';
        }
        mysqli_close($conn);
        // mysqli_close($與資料庫的連接)：斷開與資料庫的連線
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

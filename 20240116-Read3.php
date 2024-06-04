<?php
// 連線資料庫product，獲取的資料再用【.json】格式傳給20240116-Read4.html和20240116-Read5.html

// 本機的
// //使用.json格式顯示資料庫全部的資料，注意除了.json檔案外不能顯示(echo)除了.json語法的其他的東西，不然無法成為.json檔案，註解要寫在<?php裡面，不然會被當成字串，從而讓.json出現錯誤
// $servername = "localhost";
// $username = "owner01";
// // 使用者名稱
// $password = "123456";
// // 密碼
// $dbname = "testdb";
// // 要使用的資料表名稱

// 網路的
// 指定網址才能使用此php檔案
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "id22011870_hsd325";
$password = "Hsd325hsd325.";
$dbname = "id22011870_hsd325";

// 建立連線
$conn =mysqli_connect($servername, $username, $password,$dbname);

// 檢查連線
if (!$conn) {
  die("連線錯誤:" .mysqli_connect_errno());
//   die: 中止
//   die("連線錯誤:" . mysqli_connect_errno()); :終止連線，並顯示()裡面的內容。
// 【.】: 加(+)的意思
}


$sql = "SELECT ID, Product, Price, Num, Remark, Created_at FROM product";
// 抓取資料表(testdb的全部資料)
$result = mysqli_query($conn, $sql);
// 資料分開成一筆一筆的前置

$mydata=array();
// 讓$mydata變成一個陣列

// if為如果還有資料，就會一直顯示下一筆資料直到沒有資料
if(mysqli_num_rows($result)>0){
    // mysqli_num_rows($result) : 會顯示這是資料庫的第幾筆資料
    while($row=mysqli_fetch_assoc($result)){
        // $row 經過2次空值(第1次是讓$row變為空值)，while的條件就會達成，從而停下來
        $mydata[]=$row;
        // $mydata=$row; : 這樣寫為錯誤的，只會儲存一行資料；因為這樣打會變成陣列的第一行資料輸入為$row，這樣一直重複做，$mydata[]這樣打才會讓資料進入陣列的每一個儲存格
    }
    echo '{"state" : true, "data":'.json_encode($mydata) .' ,"message" : "查詢資料成功!"}';
    // 上方為.json寫法，state->是否連接到，data->內容。
    // 下方為php寫法
    // echo json_encode($mydata);
    // json_encode() : 功能為讓【()】裡面的陣列資料變成.json檔案的格式，自己本身檔案還使是php，但裡面的內容會是.json的格式
}else{
    echo '{"state" : false, "message" : "查詢資料失敗，查無資料!"}';
    // 上方為.json寫法，state->是否連接到。
    // 下方為php寫法
    // echo "查無此資料!";
}

mysqli_close($conn);
// 關掉連線，讓網頁不會lag，多個使用者連線到資料庫，用完不關掉連線會越來越多人，網頁會越來越lag
?>
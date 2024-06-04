
<?php
// 連線資料庫product，獲取的資料再用【.json】格式傳給20240116-Read.html

// 最基礎的，只會顯示第一筆

// 本機的
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
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 檢查連線
if (!$conn) {
  die("連線錯誤:" . mysqli_connect_errno());
  //   die: 中止
  //   die("連線錯誤:" . mysqli_connect_errno()); :終止連線，並顯示()裡面的內容。
  // 【.】: 加(+)的意思
}
echo "連線成功!<br>";

$sql = "SELECT ID, Product, Price, Num, Remark, Created_at FROM product";
// 抓取資料表(testdb的全部資料)
$result = mysqli_query($conn, $sql);
// 資料分開成一筆一筆的前置

$row = mysqli_fetch_assoc($result);
// 將資料分開成一筆一筆的
echo "名稱:" . $row["Product"] . "<br>價格:" . $row["Price"];
// 顯示資料表的Product和Price
mysqli_close($conn);
// 關掉連線，讓網頁不會lag，多個使用者連線到資料庫，用完不關掉連線會越來越多人，網頁會越來越lag
?>
<?php
// 抓取2筆資料的練習
$servername = "localhost";
$username = "owner01";
$password = "123456";
$dbname = "testdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("error");
}

// count(Addr) as countRegion :計算Addr同名的每一項有幾個，計算出的結果叫做countRegion
// SELECT count(Addr) as countRegion, Addr  :同時顯示countRegion和Addr
// GROUP BY Addr : 為讓【Addr】裡不同名的每一項都顯示出來，不使用這個的話，Addr只會顯示第一項(比如只會顯示台南市)，後面不同名的都不會顯示，而countRegion只會顯示這個資料表總共有幾筆資料，而不會依Addr分類來顯示
$sql = "SELECT count(Addr) as countRegion, Addr FROM chartdb GROUP BY Addr";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    //區域人口分布
    $mydataAddr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $mydataAddr[] = $row;
    }
    //學歷人口分布
    $sql = "SELECT count(Edu) as countEdu, Edu FROM chartdb GROUP BY Edu";

    $result = mysqli_query($conn, $sql);
    $mydataEdu = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $mydataEdu[] = $row;
    }

    echo '{"state":true, "dataAddr": ' . json_encode($mydataAddr) . ',"dataEdu": '.json_encode($mydataEdu).',"message": "會員居住縣市及學歷分布資料查詢成功"}';
} else {
    echo '{"state":false, "message": "查無資料"}';
}
mysqli_close($conn);

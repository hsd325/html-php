<!-- 20240125-product01-Read.html頁面的內容資料抓取和傳遞 -->
<?php
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
        $sql = "SELECT * FROM product01 ORDER BY ID DESC";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            // 如果有內容
            while($row=mysqli_fetch_assoc($result)){
                // mysqli_fetch_assoc($result) : 取得$result的一筆資料，且下個迴圈會往下繼續下一筆
                $mydata[]=$row;
            }
            // json_encode($mydata);
            echo'{"state" : true , "data":'.json_encode($mydata).' , "message" : "查詢資料成功!"}';
        }else{
            echo'{"state" : false, "message" : "查詢資料失敗，查無此資料!"}';
        }
        mysqli_close($conn);
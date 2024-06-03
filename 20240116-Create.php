<!-- 接收20240116-Create.html傳遞過來的資料，並連線資料庫product，並在資料庫建立新的資料 -->

<?php
if (isset($_POST["product"]) && isset($_POST["price"]) && isset($_POST["num"]) && isset($_POST["remark"])) {
    // 上面這行if為判斷欄位是否存在和裡面內容不可為【null】，存在且有內容為true
    if ($_POST["product"] != "" && $_POST["price"] != "" && $_POST["num"] != "" && $_POST["remark"] != "") {
        // 上面這行if為判斷欄位的內容是否為空白的，也就是【””】，不是空白為true
        $p_product = $_POST["product"];
        $p_price = $_POST["price"];
        $p_num = $_POST["num"];
        $p_remark = $_POST["remark"];
        //  上面為設定接收其他網頁傳送過來的資料，用POST來接收

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

        $sql = "INSERT INTO product(Product, Price, Num, Remark) VALUES('$p_product', '$p_price', '$p_num', '$p_remark')";
        // 上面接收的資料用在上面這一行
        if (mysqli_query($conn, $sql)) {
            // 新增成功
            echo '{"state" : true, "message" : "新增成功!"}';
            // echo "新增成功!";
        } else {
            // 新增失敗
            echo '{"state" : false, "message" : "新增失敗:'. $sql . mysqli_errno($conn).'"}';
            // echo "新增失敗!" . $sql . mysqli_errno($conn);
        }

        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "欄位不可為空白!"}';
        // echo "欄位不得為空白!";
    }
} else {
    echo '{"state" : false, "message" : "欄位不存在!"}';
    // echo "欄位不存在!";
}

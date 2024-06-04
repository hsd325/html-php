<?php
// input的file傳過來的資料上傳的方法，是用當前日期時間來決定上傳檔案的名字
// 這個沒有連接資料庫

//為抓取input的file傳過來資料的方法

//$_FILES['file']成功接受到數值時，會顯示Array
// echo $_FILES['file'];
// echo '<BR>';
// // 顯示名字
// echo $_FILES['file']['name'];
// echo '<BR>';
// // 顯示檔案類型，圖片jpg會顯示【image/jpge】
// echo $_FILES['file']['type'];
// echo '<BR>';
// // 顯示檔案大小
// echo $_FILES['file']['size'];
// echo '<BR>';
// // 上傳檔案後的暫存資料夾位置
// echo $_FILES['file']['tmp_name'];
// echo '<BR>';
// // 如果檔案上傳有錯誤，可以顯示錯誤代碼，沒有錯會顯示0
// echo $_FILES['file']['error'];
// echo '<BR>';

// $myfile = date("YmdHis").uniqid().'_'.$_FILES['file']['name'];
// // $myfile = uniqid(date("YmdHis")).'_'.$_FILES['file']['name'];
// // uniqid的2種寫法
// $filename = 'upload/'.$myfile;
// move_uploaded_file($_FILES['file']['tmp_name'], $filename);

if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
    if ($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png") {
        //重新命名檔案命傳遞至伺服器
        $myfile = date("YmdHis") . uniqid() . '_' . $_FILES['file']['name'];
        // date("YmdHis") : 電腦的時間
        // uniqid()，藉由時間來產生獨一無二的數字
        $filename = 'upload/' . $myfile;
        // 傳送圖片進指定資料夾: move_uploaded_file(要傳圖檔的起始位置,圖檔要傳到的目的地+檔名);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filename)) {
            $datainfo = array();
            $datainfo["name"] = $_FILES['file']['name'];
            $datainfo["type"] = $_FILES['file']['type'];
            $datainfo["size"] = $_FILES['file']['size'];
            $datainfo["tmp_name"] = $_FILES['file']['tmp_name'];
            $datainfo["error"] = $_FILES['file']['error'];
            $datainfo["serverfilename"] = $filename;

            echo '{"state":true, "datainfo":' . json_encode($datainfo) . ',"message":"上傳成功!"}';
        } else {
            $errorinfo = array();
            $errorinfo["error"] = $_FILES['file']['error'];

            echo '{"state":false, "error_info":' . json_encode($errorinfo) . ' ,"message":"檔案上傳錯誤!"}';
        }
    } else {
        echo '{"state":false, "message":"檔案格式錯誤, 必須為jpeg or png!"}';
    }
} else {
    echo '{"state":false, "message":"檔案不存在!"}';
}

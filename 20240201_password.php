<?php
// 數字加密的練習

// 資料加密常會用到的寫法

//時間戳記
echo "時間戳記" . "<BR>";
date_default_timezone_set('UTC+8');
// UTC為英國的時區，UTC+8為台灣的時區
// date_default_timezone_set : 為拿來決定電腦的時區
echo time();
// time() : 現在電腦紀錄時間的數字
// 上面這個為顯示電腦紀錄時間的數字，這是給電腦看的，不是給人看的
echo '<BR>';
echo date("Y-m-d: h:i:s");
// 顯示給人類看現在的時間
echo '<BR>';

//密碼加密相關01 PASSWORD_DEFAULT，不會隨機變化
echo "密碼驗證相關PASSWORD_DEFAULT" . "<BR>";
echo password_hash("123456", PASSWORD_DEFAULT); //將明碼("123456")雜湊化
echo '<BR>';
//顯示出來會長這樣【$2y$10$e9mJBnrefLvjBtXUHRymyuCip.tgYVY.SBFaxsTB4KodV8FfAQxWa】

// 密碼解密相關 password_verify
$passhas01 = '$2y$10$e9mJBnrefLvjBtXUHRymyuCip.tgYVY.SBFaxsTB4KodV8FfAQxWa';
// echo password_verify("123456", $passhas);
if (password_verify("1234567", $passhas01)) {
    // password_verify : 函数用于驗證密碼是否和雜湊值匹配，"1234567"和$passhas01(雜湊值)拿來做比對，相同會顯示true
    echo "密碼正確!<BR>";
} else {
    echo "密碼錯誤!<BR>";
}

// 密碼加密相關02 PASSWORD_BCRYPT，不會隨機變化
echo "密碼驗證相關PASSWORD_BCRYPT" . "<BR>";
echo password_hash("123456", PASSWORD_BCRYPT);
echo '<BR>';
// 顯示出來會長這樣【$2y$10$ZX8MSixAdBTrAK.jvWwcWen8pFGcxxP0jGN.7yP4YaTRgqyTaQJDK】

$passhas02 = '$2y$10$ZX8MSixAdBTrAK.jvWwcWen8pFGcxxP0jGN.7yP4YaTRgqyTaQJDK';
//echo password_verify("123456", $passhas); //true
if (password_verify("123456554561465", $passhas02)) {
    echo "密碼正確!<BR>";
} else {
    echo "密碼錯誤!<BR>";
}

//雜湊函數 hash，可產生出雜湊值，密碼加密相關的03，不會隨機變化
// 雜湊值必須隨明文改變而改變
echo "雜湊演算法列表<BR>";
print_r(hash_algos());
echo '<BR>';
echo '<BR>';
echo 'hash_md5: ' . hash('md5', time());
echo '<BR>';
echo '<BR>';
echo 'sha_256: ' . hash('sha256', '123456');
// 會出來64個字，2的6次方=64
echo '<BR>';
echo '<BR>';
echo 'sha_512: ' . hash('sha512', '123456');
// 會出來128個字，2的7次方=128
//雜湊函數 hash : 使用這個會影響到效能，因為是用等比級數增加數字的(直接*2)，產生越多數字的越會影響效能，md5影響最小
// 以往比較常用的是md5加密，但 md5 已經有太多 Rainbow Table 可以用來破解，所以現在比較常用 hash() 以 sha256 來加密字串。

//uniquid，以微秒计的当前时间來生成一个唯一的密碼加密，加密相關的04，因為是以現在時間來製作加密，所以會隨機變化
echo '<BR>';
echo '<BR>';
echo "uniquid: " . uniqid();
echo '<BR>';
echo '<BR>';
echo "uniquid: " . uniqid("123456");
echo '<BR>';
echo '<BR>';
echo "uniquid: " . uniqid(time());
echo '<BR>';
echo '<BR>';
echo "產生獨一無二得字串<BR>";
$myhash = hash("sha256", uniqid(time()));
echo $myhash;
echo '<BR>';
echo '<BR>';
echo substr($myhash, 5, 5) . substr($myhash, 0, 5) . substr($myhash, 10, 5);
// 不太適合拿來用密碼加密

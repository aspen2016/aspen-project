<?php
    set_time_limit(60);
    $DBSERVER = "localhost";
    $DBUSER = "root";
    $DBPASS = "a11120102";
    $CON = mysql_connect($DBSERVER,$DBUSER,$DBPASS);
    $DB_USER = "users";
    $TABLE_USER = "account";
    $DB_SHOP = "restaurant";
    $TABLE_SHOP = "info_shop2";
    $selectdb = mysql_select_db($DB_USER,$CON);

// Content-TypeをJSONに指定する
header('Content-Type: application/json');

// $_POST['age']、$_POST['job']をエラーを出さないように文字列として安全に展開する
foreach (['shop_id', 'user_id'] as $v) {
    $$v = (string)filter_input(INPUT_POST, $v);
}

// 整合性チェック
if ($shop_id === '' || $user_id === '') {
    $error = '必要なID情報が足りてません';
    
}

if (!isset($error)) {

//得点の初期化
$chose_shop = new PDO("mysql:dbname=$DB_SHOP",$DBUSER,$DBPASS);
$chose_shop->query("ALTER TABLE $TABLE_SHOP DROP point");
$chose_shop->query("ALTER TABLE $TABLE_SHOP add point DOUBLE DEFAULT 10");

    $SQL = "SELECT avg(budget_l) FROM $TABLE_USER";
    $rst = mysql_query($SQL,$CON);
    $col = mysql_fetch_array($rst);
    $ave_b_l = $col['avg(budget_l)'];

    $SQL = "SELECT avg(budget_d) FROM $TABLE_USER";
    $rst = mysql_query($SQL,$CON);
    $col = mysql_fetch_array($rst);
    $ave_b_d = $col['avg(budget_d)'];

    $SQL = "SELECT STD(budget_d) FROM $TABLE_USER";
    $rst = mysql_query($SQL,$CON);
    $col = mysql_fetch_array($rst);
    $std_b_d = $col['STD(budget_d)'];

    $SQL = "SELECT STD(budget_l) FROM $TABLE_USER";
    $rst = mysql_query($SQL,$CON);
    $col = mysql_fetch_array($rst);
    $std_b_l = $col['STD(budget_l)'];

    //ユーザー情報の更新
    $SQL = "SELECT * FROM $TABLE_USER ";
    $rst = mysql_query($SQL,$CON);
    while ($row = mysql_fetch_array($rst)){
        $tmp_id = $row['id'];
        $tmp_b_d = $row['budget_d'];
        $tmp_b_l = $row['budget_l'];
        $tmp_b_d_n = ($tmp_b_d - $ave_b_d)/$std_b_d;
        $tmp_b_l_n = ($tmp_b_l - $ave_b_l)/$std_b_l;
        
        $pdo = new PDO("mysql:dbname=$DB_USER",$DBUSER,$DBPASS);
        $pdo->query("UPDATE $TABLE_USER SET budget_d_norm = $tmp_b_d_n,budget_l_norm = $tmp_b_l_n WHERE id = $tmp_id");
    }
    
$data = "初期化しました";  
echo json_encode(compact('data'));

}else {
    // 失敗時は 「400 Bad Request」 で {"error":"..."} のように返す
    http_response_code(400);
    echo json_encode(compact('error'));
}
?>
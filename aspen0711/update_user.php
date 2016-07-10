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


class Shop_Info{
    private $id;
    public $name;
    private $lat;
    private $lng;
    private $pict1;
    private $pict2;
    public $hours;
    private $rest;
    private $budget_d;
    private $budget_l;
    private $category;
    function setId($id){
        $this->id = $id;
    }
    function setName($name){
        $this->name = $name;
    }
    function setLat($lat){
        $this->lat = $lat;
    }
    function setLng($lng){
        $this->lng = $lng;
    }
    function setPict1($pict1){
        $this->pict1 = $pict1;
    }
    function setPict2($pict2){
        $this->pict2 = $pict2;
    }
    function setHours($hours){
        $this->hours = $hours;
    }
    function setRest($rest){
        $this->rest = $rest;
    }
    function setBudget_d($budget_d){
        $this->budget_d = $budget_d;
    }
    function setBudget_l($budget_l){
        $this->budget_l = $budget_l;
    }
    function setCategory($category){
        $this->category = $category;
    }
    
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
    function getLat(){
        return $this->lat;
    }
    function getLng(){
        return $this->lng;
    }
    function getPict1(){
        return $this->pict1;
    }
    function getPict2(){
        return $this->pict2;
    }    
    function getHours(){
        return $this->hours;
    }
    function getRest(){
        return $this->rest;
    }
    function getBudget_d(){
        return $this->budget_d;
    }
    function getBudget_l(){
        return $this->budget_l;
    }
    function getCategory(){
        return $this->category;
    }
}

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
$tend_shop = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$tend_user = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
//ユーザー情報の取得
$SQL = "SELECT * FROM $TABLE_USER where id = $user_id";
$rst = mysql_query($SQL,$CON);
$count_use = 0;
while($row = mysql_fetch_array($rst)){
    
    $tend_user[0] = $row['category_1'];
    $tend_user[1] = $row['category_2'];
    $tend_user[2] = $row['category_3'];
    $tend_user[3] = $row['category_4'];
    $tend_user[4] = $row['category_5'];
    $tend_user[5] = $row['category_6'];
    $tend_user[6] = $row['category_7'];
    $tend_user[7] = $row['category_8'];
    $tend_user[8] = $row['category_9'];
    $tend_user[9] = $row['category_10'];
    $tend_user[10] = $row['category_11'];
    $tend_user[11] = $row['category_12'];
    $tend_user[12] = $row['category_13'];
    $tend_user[13] = $row['category_14'];
    $tend_user[14] = $row['category_15'];
    $tend_user[15] = $row['category_16'];
    $tend_user[16] = $row['category_17'];
    $tend_user[17] = $row['category_18'];
    $tend_user[18] = $row['category_19'];
    $tend_user[19] = $row['category_20'];
    $tend_user[20] = $row['category_21'];
    $tend_user[21] = $row['category_22'];
    $tend_user[22] = $row['budget_d'];
    $tend_user[23] = $row['budget_l'];
    $count_use = $row['count_use'];
}
$chose_shop = new PDO("mysql:dbname=$DB_SHOP",$DBUSER,$DBPASS);
//得点の初期化
$chose_shop->query("ALTER TABLE $TABLE_SHOP DROP point");
$chose_shop->query("ALTER TABLE $TABLE_SHOP add point DOUBLE DEFAULT 10");
$search = $chose_shop->query("SELECT * FROM $TABLE_SHOP WHERE id = $shop_id");
while($row = $search->fetch()){
    $tmp_id = $row['id'];
    $tend_shop[0] = $row['category_1'];
    $tend_shop[1] = $row['category_2'];
    $tend_shop[2] = $row['category_3'];
    $tend_shop[3] = $row['category_4'];
    $tend_shop[4] = $row['category_5'];
    $tend_shop[5] = $row['category_6'];
    $tend_shop[6] = $row['category_7'];
    $tend_shop[7] = $row['category_8'];
    $tend_shop[8] = $row['category_9'];
    $tend_shop[9] = $row['category_10'];
    $tend_shop[10] = $row['category_11'];
    $tend_shop[11] = $row['category_12'];
    $tend_shop[12] = $row['category_13'];
    $tend_shop[13] = $row['category_14'];
    $tend_shop[14] = $row['category_15'];
    $tend_shop[15] = $row['category_16'];
    $tend_shop[16] = $row['category_17'];
    $tend_shop[17] = $row['category_18'];
    $tend_shop[18] = $row['category_19'];
    $tend_shop[19] = $row['category_20'];
    $tend_shop[20] = $row['category_21'];
    $tend_shop[21] = $row['category_22'];
    $tend_shop[22] = $row['budget_d'];
    $tend_shop[23] = $row['budget_l'];
}
// ユーザーのカテゴリー情報の更新
for($i=0;$i<22;$i++){
    $tend_user[$i]+=$tend_shop[$i];
}
//ユーザーの平均予算情報の更新
$tend_user[22] = ($tend_user[22]*($count_use+1)+$tend_shop[22])/($count_use+2);
$tend_user[23] = ($tend_user[23]*($count_use+1)+$tend_shop[23])/($count_use+2);
$update = new PDO("mysql:dbname=$DB_USER","$DBUSER","$DBPASS");
$update->query("UPDATE $TABLE_USER SET budget_d = $tend_user[22] , budget_l = $tend_user[23] WHERE id = $user_id");
    
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
    $SQL = "SELECT * FROM $TABLE_USER WHERE id = $user_id";
    $rst = mysql_query($SQL,$CON);
    while ($row = mysql_fetch_array($rst)){
        $tmp_b_d = $row['budget_d'];
        $tmp_b_l = $row['budget_l'];
        $tmp_b_d_n = ($tmp_b_d - $ave_b_d)/$std_b_d;
        $tmp_b_l_n = ($tmp_b_l - $ave_b_l)/$std_b_l;
        
        $pdo = new PDO("mysql:dbname=$DB_USER",$DBUSER,$DBPASS);
        $pdo->query("UPDATE $TABLE_USER SET budget_d_norm = $tmp_b_d_n,budget_l_norm = $tmp_b_l_n , category_1 = $tend_user[0] , category_2 = $tend_user[1], category_3 = $tend_user[2], category_4 = $tend_user[3], category_5 = $tend_user[4], category_6 = $tend_user[5], category_7 = $tend_user[6], category_8 = $tend_user[7], category_9 = $tend_user[8], category_10 = $tend_user[9], category_11 = $tend_user[10], category_12 = $tend_user[11], category_13 = $tend_user[12], category_14 = $tend_user[13], category_15 = $tend_user[14], category_16 = $tend_user[15], category_17 = $tend_user[16], category_18 = $tend_user[17], category_19 = $tend_user[18], category_20 = $tend_user[19], category_21 = $tend_user[20], category_22 = $tend_user[21] , count_use = ($count_use+1) WHERE id = $user_id");
    }
    /*
    $data = "更新しました";
    echo json_encode(compact('data'));
    */
}else {
    // 失敗時は 「400 Bad Request」 で {"error":"..."} のように返す
    http_response_code(400);
    echo json_encode(compact('error'));
}
?>
<!DOCTYPE html>
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

//ログイン状態のチェック
session_start();
if (!isset($_SESSION["email"])){
    header("Location:logout.php");
    exit;
}
$email = $_SESSION["email"];
//得点計算用の関数
function calc_point($shop,$user){
    $point = 0;
    for($i=0;$i<count($shop);$i++){
        $point += pow(($shop[$i]-$user[$i]),2);
    }
    return $point;
}

//情報をまとめたクラス
class Shop_Info{
    private $id;
    private $name;
    private $lat;
    private $lng;
    private $pict1;
    private $pict2;
    private $hours;
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

//得点計算モジュール

$pattern = 0;
if(isset($_GET['pattern'])){
    $pattern = $_GET['pattern'];
}
$tend_shop = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$tend_user = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$id = 0;
$name = "";
//ユーザー情報の取得
$SQL = "SELECT * FROM $TABLE_USER where email LIKE '$email'";
$rst = mysql_query($SQL,$CON);
$count_use = 0;
while($row = mysql_fetch_array($rst)){
    $id = $row['id'];
    $name = $row['user_name'];
    $count_use = $row['count_use'];
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
    $tend_user[22] = $row['budget_d_norm'];
    $tend_user[23] = $row['budget_l_norm'];
}
$category_sum = 0;
for($i=0;$i<22;$i++){
    $category_sum += $tend_user[$i];
}    
for($i=0;$i<22;$i++){
    $tend_user[$i]=$tend_user[$i]/$category_sum;
}

// 質問のチョイスによる重み付けの変更
if($pattern == 1){//作業
    if($tend_user[18]<0.5){
        $tend_user[18] += 1;
    }else{
        $tend_user[18] *= 2;
    }
    if($tend_user[21]<0.5){
        $tend_user[21] += 1;
    }else{
        $tend_user[21] *= 2;
    }
    $tend_user[0] = 0;
    
}elseif($pattern == 2){//さくっと
    if($tend_user[8]<0.5){
        $tend_user[8] += 1;
    }else{
        $tend_user[8] *= 2;
    }
    if($tend_user[21]<0.5){
        $tend_user[21] += 1;
    }else{
        $tend_user[21] *= 2;
    }
    if($tend_user[11]<0.5){
        $tend_user[11] += 1;
    }else{
        $tend_user[11] *= 2;
    }
}elseif($pattern == 3){//ご褒美
    if($tend_user[18]<0.5){
        $tend_user[18] += 1;
    }else{
        $tend_user[18] *= 2;
    }
    if($tend_user[12]<0.5){
        $tend_user[12] += 1;
    }else{
        $tend_user[12] *= 2;
    }
    if($tend_user[10]<0.5){
        $tend_user[10] += 1;
    }else{
        $tend_user[10] *= 2;
    }
    if($tend_user[22]<0){
        $tend_user[22] *= -1.1;
    }else{
        $tend_user[22] *= 1.1;
    }
    if($tend_user[23]<0){
        $tend_user[23] *= -1.1;
    }else{
        $tend_user[23] *= 1.1;
    }
}elseif($pattern == 4){//デート
    if($tend_user[18]<0.5){
        $tend_user[18] += 1;
    }else{
        $tend_user[18] *= 2;
    }
    if($tend_user[10]<0.5){
        $tend_user[10] += 1;
    }else{
        $tend_user[10] *= 2;
    }
    if($tend_user[11]<0.5){
        $tend_user[11] += 1;
    }else{
        $tend_user[11] *= 2;
    }
    if($tend_user[16]<0.5){
        $tend_user[16] += 1;
    }else{
        $tend_user[16] *= 2;
    }
    if($tend_user[22]<0){
        $tend_user[22] *= -1.1;
    }else{
        $tend_user[22] *= 1.1;
    }
    if($tend_user[23]<0){
        $tend_user[23] *= -1.1;
    }else{
        $tend_user[23] *= 1.1;
    }
}elseif($pattern == 5){//ミーティング
    if($tend_user[18]<0.5){
        $tend_user[18] += 1;
    }else{
        $tend_user[18] *= 2;
    }
    if($tend_user[21]<0.5){
        $tend_user[21] += 1;
    }else{
        $tend_user[21] *= 2;
    }
}elseif($pattern == 6){//家族と
     if($tend_user[3]<0.5){
        $tend_user[3] += 1;
    }else{
        $tend_user[3] *= 2;
    }
    if($tend_user[4]<0.5){
        $tend_user[4] += 1;
    }else{
        $tend_user[4] *= 2;
    }
    if($tend_user[6]<0.5){
        $tend_user[6] += 1;
    }else{
        $tend_user[6] *= 2;
    }
    if($tend_user[20]<0.5){
        $tend_user[20] += 1;
    }else{
        $tend_user[20] *= 2;
    }
    if($tend_user[22]<0){
        $tend_user[22] *= -1.1;
    }else{
        $tend_user[22] *= 1.1;
    }
    if($tend_user[23]<0){
        $tend_user[23] *= -1.1;
    }else{
        $tend_user[23] *= 1.1;
    }    
}elseif($pattern == 7){//女子だけ
     if($tend_user[18]<0.5){
        $tend_user[18] += 1;
    }else{
        $tend_user[18] *= 2;
    }
    if($tend_user[10]<0.5){
        $tend_user[10] += 1;
    }else{
        $tend_user[10] *= 2;
    }
    if($tend_user[3]<0.5){
        $tend_user[3] += 1;
    }else{
        $tend_user[3] *= 2;
    }
    if($tend_user[11]<0.5){
        $tend_user[11] += 1;
    }else{
        $tend_user[11] *= 2;
    }
}elseif($pattern == 8){//男子だけ
     if($tend_user[8]<0.5){
        $tend_user[8] += 1;
    }else{
        $tend_user[8] *= 2;
    }
    if($tend_user[5]<0.5){
        $tend_user[5] += 1;
    }else{
        $tend_user[5] *= 2;
    }
    if($tend_user[13]<0.5){
        $tend_user[13] += 1;
    }else{
        $tend_user[13] *= 2;
    }
    if($tend_user[6]<0.5){
        $tend_user[6] += 1;
    }else{
        $tend_user[6] *= 2;
    }
}elseif($pattern == 9){//男女混合
     if($tend_user[3]<0.5){
        $tend_user[3] += 1;
    }else{
        $tend_user[3] *= 2;
    }
    if($tend_user[6]<0.5){
        $tend_user[6] += 1;
    }else{
        $tend_user[6] *= 2;
    }
    if($tend_user[9]<0.5){
        $tend_user[9] += 1;
    }else{
        $tend_user[9] *= 2;
    }
    if($tend_user[10]<0.5){
        $tend_user[10] += 1;
    }else{
        $tend_user[10] *= 2;
    }
}
//お店の情報の取り出し

$tmp_lat = 35.6581+rand(0,5000)/1000000;
$tmp_lng = 139.701742+rand(0,5000)/1000000;
$range = 0.0045;
$tmp_sum = 0;
$timer = 1;
$chose_shop = new PDO("mysql:dbname=$DB_SHOP",$DBUSER,$DBPASS);
$search = $chose_shop->query("SELECT * FROM $TABLE_SHOP WHERE rest_lat <= $tmp_lat+$range AND rest_lat >= $tmp_lat-$range AND rest_lng <= $tmp_lng+$range AND rest_lng >= $tmp_lng-$range AND pict1 NOT LIKE '{}' ORDER BY RAND()");
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
    $tend_shop[22] = $row['budget_d_norm'];
    $tend_shop[23] = $row['budget_l_norm'];
    //点数計算＆格納
    $tmp_point = calc_point($tend_shop,$tend_user);
    $timer++;
    if($timer>10 && $tmp_point > $tmp_sum/($timer*1.4)){
        continue;
    }
    $tmp_sum += $tmp_point;
    $chose_shop->query("update $TABLE_SHOP SET point = $tmp_point where id = $tmp_id");
}
//条件に合うお店の取得&格納
$shop1 = new Shop_Info();
$shop2 = new Shop_Info();
$shop3 = new Shop_Info();
$shop_list = array($shop1,$shop2,$shop3);
$get = $chose_shop->query("SELECT * FROM $TABLE_SHOP WHERE rest_lat <= $tmp_lat+$range AND rest_lat >= $tmp_lat-$range AND rest_lng <= $tmp_lng+$range AND rest_lng >= $tmp_lng-$range AND pict1 NOT LIKE '{}' ORDER BY point ASC");
$count = 0;
while($row = $get->fetch()){
    $shop_list[$count]->setId($row['id']);
    $shop_list[$count]->setName($row['rest_name']);
    $shop_list[$count]->setLat($row['rest_lat']);
    $shop_list[$count]->setLng($row['rest_lng']);
    $shop_list[$count]->setPict1($row['pict1']);
    $shop_list[$count]->setHours($row['openhours']);
    $shop_list[$count]->setRest($row['restday']);
    $shop_list[$count]->setBudget_d($row['budget_d']);
    $shop_list[$count]->setBudget_l($row['budget_l']);
    $count++;
    if($count >= 3){
        break;
    }
}
?>
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex,nofollow">
		<!-- ビューポートの設定 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="suggest.css">
    <script type="text/JavaScript">
        function ChangeTab(tabname){
            document.getElementById('tab1').style.display = 'none';
            document.getElementById('tab2').style.display = 'none';
            document.getElementById('tab3').style.display = 'none';
            document.getElementById('tab4').style.display = 'none';
            document.getElementById('tab5').style.display = 'none';
            document.getElementById('tab6').style.display = 'none';
            document.getElementById(tabname).style.display = 'block';
        };
        function ChangeTab1(){
            document.getElementById('tab1').style.display = 'block';
            document.getElementById('tab2').style.display = 'block';
            document.getElementById('tab3').style.display = 'none';
            document.getElementById('tab4').style.display = 'none';
            document.getElementById('tab5').style.display = 'none';
            document.getElementById('tab6').style.display = 'none';
        };
        function ChangeTab2(){
            document.getElementById('tab1').style.display = 'none';
            document.getElementById('tab2').style.display = 'none';
            document.getElementById('tab3').style.display = 'block';
            document.getElementById('tab4').style.display = 'block';
            document.getElementById('tab5').style.display = 'none';
            document.getElementById('tab6').style.display = 'none';
        };
        function ChangeTab3(){
            document.getElementById('tab1').style.display = 'none';
            document.getElementById('tab2').style.display = 'none';
            document.getElementById('tab3').style.display = 'none';
            document.getElementById('tab4').style.display = 'none';
            document.getElementById('tab5').style.display = 'block';
            document.getElementById('tab6').style.display = 'block';
        };
    </script>

<title>Suggest For You</title>

<!-- 【１】Google Maps APIを呼び出し-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDimNy5EQqYcTa8T7ChsIqUp68Weg4D6KE&sensor=false&language=ja"></script>
<script src="ajax.js"></script>
<script>

    var lat = <?php echo $shop1->getLat() ?>;
    var lng = <?php echo $shop1->getLng() ?>;
    var lat2 = <?php echo $shop2->getLat() ?>;
    var lng2 = <?php echo $shop2->getLng() ?>;
    var lat3 = <?php echo $shop3->getLat() ?>;
    var lng3= <?php echo $shop3->getLng() ?>;
    var t_lat = <?php echo "$tmp_lat" ?>;
    var t_lng = <?php echo "$tmp_lng" ?>;
</script>
<script type="text/javascript" src="http://localhost/aspen3/map_info2.js"></script>
<script type="text/javascript">
  $(function(){
       $("#shop1").click(function() {
           $("#tab1").slideToggle("fast");
           $("#tab2").slideToggle("fast");
       });
       $("#shop2").click(function() {
           $("#tab3").slideToggle("fast");
           $("#tab4").slideToggle("fast");
       });
       $("#shop3").click(function() {
           $("#tab5").slideToggle("fast");
           $("#tab6").slideToggle("fast");
       });
       $(".li1").click(function() {
           $("#cont1").css("display","block");
           $(".li1").css("opacity","1");
           $("#cont2").css("display","none");
           $(".li2").css("opacity","0.5");
           $("#cont3").css("display","none");
           $(".li3").css("opacity","0.5");
       });
       $(".li2").click(function() {
           $("#cont1").css("display","none");
           $(".li1").css("opacity","0.5");
           $("#cont2").css("display","block");
           $(".li2").css("opacity","1");
           $("#cont3").css("display","none");
           $(".li3").css("opacity","0.5");
       });
       $(".li3").click(function() {
           $("#cont1").css("display","none");
           $(".li1").css("opacity","0.5");
           $("#cont2").css("display","none");
           $(".li2").css("opacity","0.5");
           $("#cont3").css("display","block");
           $(".li3").css("opacity","1");
       });
   });
</script>
</head>
<body onload ="initialize()">

  <div id = "container">
    <div id = "header">
    </div>

    <div id = "contents">
      <div id="map_canvas"></div>
      <ul style="list-style:none">
        <a href="#tab1"><li class="li1">候補①</li></a>
        <a href="#tab2"><li class="li2">候補②</li></a>
        <a href="#tab3"><li class="li3">候補③</li></a>
      </ul>

    <div id="cont1" class="contents">
        <div class="canvas">
          <?php
          if($shop1->getPict1()=='{}'){
              echo "<h3>画像が掲載されていません</h3>";
          }else{
              echo "<img id=pict_resize src=",$shop1->getPict1(),"></img>";
          }
          ?>
        </div>
        <div class="info">
          <p class="shop_title"><?php
              echo $shop1->getName();
          ?></p>
          開店時間<br>
            <?php
                echo $shop1->getHours();
                echo "<br><br>";
            ?>
            <hstar>閉店日<br></hstar>
            <?php
                echo $shop1->getRest();
                echo "<br><br>";
            ?>
            <hstar>予算<br>
              <?php
                echo "夕食：　";
                if($shop1->getBudget_d() != 0){
                    echo $shop1->getBudget_d();
                    echo "円<br>";
                }else
                    echo "--円<br>";
                echo "昼食：　";
                if($shop1->getBudget_l() != 0){
                    echo $shop1->getBudget_l();
                    echo "円<br><br>";
                }else
                    echo "--円<br><br>";
              ?>
              <br>
            </hstar>
          </div>
        <form>
            <input type="hidden" id="shop_id" value=<?php echo $shop1->getId()?>>
            <input type="hidden" id="user_id" value=<?php echo $id?>>
            <input type="button"  id= "execute1" onclick="window.open('http://maps.google.com/maps?saddr=<?php echo "($tmp_lat,$tmp_lng)";?>&daddr=<?php echo "(",$shop1->getLat(),",",$shop1->getLng(),")"?>&dirflg=w')" value="経路を表示する">
        </form>
      </div>
    </div>

    <div id="cont2" class="contents">
      <div class="canvas">
        <?php
        if($shop2->getPict1()=='{}'){
            echo "<h3>画像が掲載されていません</h3>";
        }else{
            echo "<img id=pict_resize src=",$shop2->getPict1(),"></img>";
        }
        ?>
      </div>
      <div class="info">
        <p class="shop_title"><?php
            echo $shop2->getName();
        ?></p>
        開店時間<br>
          <?php
              echo $shop2->getHours();
              echo "<br><br>";
          ?>
          <hstar>閉店日<br></hstar>
          <?php
              echo $shop2->getRest();
              echo "<br><br>";
          ?>
          <hstar>予算<br>
            <?php
              echo "夕食：　";
              if($shop2->getBudget_d() != 0){
                  echo $shop2->getBudget_d();
                  echo "円<br>";
              }else
                  echo "--円<br>";
              echo "昼食：　";
              if($shop2->getBudget_l() != 0){
                  echo $shop2->getBudget_l();
                  echo "円<br><br>";
              }else
                  echo "--円<br><br>";
            ?>
            <br>
          </hstar>
      </div>
        <form>
            <input type="hidden" id="shop_id" value=<?php echo $shop2->getId()?>>
            <input type="hidden" id="user_id" value=<?php echo $id?>>
            <input type="button"  id= "execute2" onclick="window.open('http://maps.google.com/maps?saddr=<?php echo "($tmp_lat,$tmp_lng)";?>&daddr=<?php echo "(",$shop2->getLat(),",",$shop2->getLng(),")"?>&dirflg=w')" value="経路を表示する">
        </form>
    </div>


    <div id="cont3" class="contents">
      <div class="canvas">
        <?php
        if($shop3->getPict1()=='{}'){
            echo "<h3>画像が掲載されていません</h3>";
        }else{
            echo "<img id=pict_resize src=",$shop3->getPict1(),"></img>";
        }
        ?>
      </div>
      <div class="info">
        <p class="shop_title"><?php
            echo $shop3->getName();
        ?></p>開店時間<br>
          <?php
              echo $shop3->getHours();
              echo "<br><br>";
          ?>
          <hstar>閉店日<br></hstar>
          <?php
              echo $shop3->getRest();
              echo "<br><br>";
          ?>
          <hstar>予算<br>
            <?php
              echo "夕食：　";
              if($shop3->getBudget_d() != 0){
                  echo $shop3->getBudget_d();
                  echo "円<br>";
              }else
                  echo "--円<br>";
              echo "昼食：　";
              if($shop3->getBudget_l() != 0){
                  echo $shop3->getBudget_l();
                  echo "円<br><br>";
              }else
                  echo "--円<br><br>";
            ?>
            <br>
          </hstar>
      </div>
        <form>
            <input type="hidden" id="shop_id" value=<?php echo $shop3->getId()?>>
            <input type="hidden" id="user_id" value=<?php echo $id?>>
            <input type="button"  id="execute3" onclick="window.open('http://maps.google.com/maps?saddr=<?php echo "($tmp_lat,$tmp_lng)";?>&daddr=<?php echo "(",$shop3->getLat(),",",$shop3->getLng(),")"?>&dirflg=w')" value="経路を表示する">
        </form>
    </div>
  </div>

    </div>

    <script type="text/JavaScript">
        ChangeTab('tab0');
    </script>


    </div>

    <div id = "footer">
      <ul>
        <li><a id="initialize"class="footer_button" href="mypage.php">戻る</a><li>
        <li><a class="footer_button" href="http://localhost/aspen3/suggest.php?pattern=<?php echo "$pattern"?>">再検索</a></li>
      </ul>
    </div>
</body>
</html>

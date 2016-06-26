<!DOCTYPE html>
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
            document.getElementById(tabname).style.display = 'block';
        };
    </script>
<?php
    $flag = 0;
    $tmp_lat = 35.6595437+rand(0,5000)/1000000;
    $tmp_lng = 139.6987052+rand(0,5000)/1000000;
    $range = 0.004;
    $count = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","a11120102");
        $sarch = $chose_shop->query("SELECT * FROM rest_data where rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' ");
            $count = 0;
            while($row = $sarch->fetch()){
                $shop_id = htmlspecialchars($row['id']);
                $shop_name = htmlspecialchars($row['rest_name']);
                $shop_lat = htmlspecialchars($row['rest_latitude']);
                $shop_lng = htmlspecialchars($row['rest_longtitude']);
                $shop_pict1 = htmlspecialchars($row['pict1']);
                $shop_pict2 =
                htmlspecialchars($row['pict2']);
                $shop_hours = htmlspecialchars($row['openhours']);
                $shop_rest = htmlspecialchars($row['restday']);
                $shop_budget_d = htmlspecialchars($row['budget_d']);
                $shop_budget_l = htmlspecialchars($row['budget_l']);
            }
        
        if(isset($shop_id)){
             $flag = 1;
        }
        $count++;
        if($count>=2){
            echo "$tmp_lat<br>";
            echo "$tmp_lng<br>";
            echo "当てはまるデータがありません";
            break;
        }
        
    }

?>
<title>Suggest For You</title>

<!-- 【１】Google Maps APIを呼び出し-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key= AIzaSyBzBPuSNQbLsBpCHJGq0dkD7HZTU854PJw &sensor=false&language=ja"></script>
<script>
    var lat = <?php echo "$shop_lat"?>;
    var long = <?php echo "$shop_lng"?>;
    var t_lat = <?php echo "$tmp_lat"?>;
    var t_lng = <?php echo "$tmp_lng"?>;
</script>
<!-- 【２】どんな地図を描くかのメイン処理 -->
<script type="text/javascript" src="http://localhost/route_test2.js">
</script>
</head>
<body onload ="initialize()">
    
    <div id = "container">
    <div id = "header">
    </div>
    
    <div id = "contents">
    
    <div id = "restaurantname">
        <?php echo "店名:$shop_name"?>
    </div>
        
    <div id="map-and-info">
        <div id="map_canvas"></div>
        <div id="info">Openhours<br>
            <?php
                echo "$shop_hours";
                echo "<br>";
            ?>
            <hstar>Restday<br></hstar>
            <?php
                echo "$shop_rest";
                echo "<br>";
            ?>
            <hstar>Average_Budget<br>
            <?php
                echo "夕食の平均価格<br>";
                if($shop_budget_d != 0){
                    echo "$shop_budget_d";
                    echo "円<br>";
                }else
                    echo "は設定されていません<br>";
                echo "お昼の平均価格<br>";
                if($shop_budget_l != 0){
                    echo "$shop_budget_l";
                    echo "円<br>";
                }else
                    echo "は設定されていません<br>";
            ?>
            </hstar>
        </div>
    </div>
    </div>
    
    <div class="tabbox">
    <p class="tabs">
      <a href="#tab1" class="tab1" onclick="ChangeTab('tab1'); return false;">画像1</a>
      <a href="#tab2" class="tab2" onclick="ChangeTab('tab2'); return false;">画像2</a>
      <a href="#tab3" class="tab3" onClick="ChangeTab('tab3'); return false;">経路案内</a>
    </p>
    <div id="tab1" class="tab">
      <p>
          <img src="<?php echo "$shop_pict1"?>"></img>
        <br /></p>
    </div>
    <div id="tab2" class="tab">
      <p>
        <?php
            if($shop_pict2=='{}'){
                echo "<h3>画像が掲載されていません</h3>";
            }else{
                echo "<img src=$shop_pict2>
        </img>";
            }
                
        ?>
        </img>
      </p>
    </div>
    <div id="tab3" class="tab">
      <p>
        <h2>Guided By Google Map</h2>
        <h4>今すぐお店に向かう経路案内を行います</h4>
        <button type="button" style="width:50%;padding:10px;font-size:14px;" onclick="window.open('http://maps.google.com/maps?saddr=<?php echo "($tmp_lat,$tmp_lng)";?>&daddr=<?php echo "($shop_lat,$shop_lng)"?>&dirflg=w')">
        Go To The Restaurant</button>
      </p>
    </div>
    </div>
    
    <script type="text/JavaScript">
        ChangeTab('tab1');
    </script>
    
    
    </div>
    
    <div id = "footer">
        <div id="backbutton">
        <a class="button--back" href="index.html">BACK</a>
        </div>
        <div id="researchbutton">
            <a class="button--research" href="http://localhost/map_test.php">
            RE:SEARCH</a>
        </div>
    </div>
</body>
</html>
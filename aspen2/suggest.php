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
<?php
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

?>
<?php
$search_type = $_GET['pattern'];
$shop = new Shop_Info();
$shop2 = new Shop_Info();
$shop3 = new Shop_Info();
if($search_type == 1){
    $flag = 0;
    $tmp_lat = 35.6581+rand(0,5000)/1000000;
    $tmp_lng = 139.701742+rand(0,5000)/1000000;
    $range = 0.004;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SET NAMES utf8");
        $sarch = $chose_shop->query("SELECT * FROM info_shop where id = 1");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SET NAMES utf8");
        $sarch = $chose_shop->query("SELECT * FROM info_shop where id = 1");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SET NAMES utf8");
        $sarch = $chose_shop->query("SELECT * FROM info_shop where id = 1");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}elseif($search_type == 2){
    $flag = 0;
    $tmp_lat = 35.6581+rand(0,5000)/1000000;
    $tmp_lng = 139.701742+rand(0,5000)/1000000;
    $range = 0.0045;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SET NAMES utf8");
        $sarch = $chose_shop->query("SELECT * FROM rest_data WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}'AND category LIKE '%ラーメン・麺料理%' ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%ファミレス%' AND id != $didsearch ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%イタリアン%' AND id != $didsearch AND id != $didsearch2 ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}elseif($search_type == 3){
    $flag = 0;
    $tmp_lat = 35.6581+rand(0,5000)/1000000;
    $tmp_lng = 139.701742+rand(0,5000)/1000000;
    $range = 0.0045;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM rest_data WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}'");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%欧米%' AND id != $didsearch ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%イタリアン%' AND id != $didsearch AND id != $didsearch2 ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}elseif($search_type == 4){
    $flag = 0;
    $tmp_lat = 35.6581+rand(0,5000)/1000000;
    $tmp_lng = 139.701742+rand(0,5000)/1000000;
    $range = 0.0045;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM rest_data WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}'AND category LIKE '%カフェ%' ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%洋食%' AND id != $didsearch ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%イタリアン%' AND id != $didsearch AND id != $didsearch2 ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}elseif($search_type == 5){
    $flag = 0;
    $tmp_lat = 35.6595437+rand(0,5000)/1000000;
    $tmp_lng = 139.6987052+rand(0,5000)/1000000;
    $range = 0.0045;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM rest_data WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}'AND category LIKE '%カフェ%' ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%日本料理%' AND id != $didsearch ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%カフェ%' AND id != $didsearch AND id != $didsearch2 ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}elseif($search_type == 6){
    $flag = 0;
    $tmp_lat = 35.6581+rand(0,5000)/1000000;
    $tmp_lng = 139.701742+rand(0,5000)/1000000;
    $range = 0.0045;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
         $sarch = $chose_shop->query("SELECT * FROM rest_data WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}'AND category LIKE '%お好み焼き%' ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%和食%' AND id != $didsearch ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%日本料理%' AND id != $didsearch AND id != $didsearch2 ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}elseif($search_type == 7){
    $flag = 0;
    $tmp_lat = 35.6581+rand(0,5000)/1000000;
    $tmp_lng = 139.701742+rand(0,5000)/1000000;
    $range = 0.0045;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
         $sarch = $chose_shop->query("SELECT * FROM rest_data WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}'AND category LIKE '%カフェ%' ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%鍋%' AND id != $didsearch ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%イタリアン%' AND id != $didsearch AND id != $didsearch2 ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}elseif($search_type == 8){
    $flag = 0;
    $tmp_lat = 35.6581+rand(0,5000)/1000000;
    $tmp_lng = 139.701742+rand(0,5000)/1000000;
    $range = 0.0045;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
         $sarch = $chose_shop->query("SELECT * FROM rest_data WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}'AND category LIKE '%中華%' ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%すし%' AND id != $didsearch ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%焼き鳥%' AND id != $didsearch AND id != $didsearch2 ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}elseif($search_type == 9){
    $flag = 0;
    $tmp_lat = 35.6581+rand(0,5000)/1000000;
    $tmp_lng = 139.701742+rand(0,5000)/1000000;
    $range = 0.0045;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
         $sarch = $chose_shop->query("SELECT * FROM rest_data WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}'AND category LIKE '%イタリアン%' ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop->
            setId(htmlspecialchars($row['id']));
            $shop->            setName(htmlspecialchars($row['rest_name']));
            $shop->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop->             setPict1(htmlspecialchars($row['pict1']));
            $shop->            setPict2(htmlspecialchars($row['pict2']));
            $shop->            setHours(htmlspecialchars($row['openhours']));
            $shop->            setRest(htmlspecialchars($row['restday']));
            $shop->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop->getName() != null){
             $flag = 1;
        }
    }
    $didsearch = $shop->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%欧米%' AND id != $didsearch ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop2->
            setId(htmlspecialchars($row['id']));
            $shop2->            setName(htmlspecialchars($row['rest_name']));
            $shop2->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop2->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop2->             setPict1(htmlspecialchars($row['pict1']));
            $shop2->            setPict2(htmlspecialchars($row['pict2']));
            $shop2->            setHours(htmlspecialchars($row['openhours']));
            $shop2->            setRest(htmlspecialchars($row['restday']));
            $shop2->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop2->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop2->getName() != null){
             $flag = 1;
        }
    }
    $didsearch2 = $shop2->getId();
    $flag = 0;
    while($flag == 0){
        $chose_shop = new PDO("mysql:dbname=restaurant","root","12345");
        $sarch = $chose_shop->query("SELECT * FROM info_shop WHERE rest_latitude <= $tmp_lat+$range AND rest_latitude >= $tmp_lat-$range AND rest_longtitude <= $tmp_lng+$range AND rest_longtitude >= $tmp_lng-$range AND pict1 NOT LIKE '{}' AND category LIKE '%和食%' AND id != $didsearch AND id != $didsearch2 ORDER BY RAND()");
        while($row = $sarch->fetch()){
            $shop3->
            setId(htmlspecialchars($row['id']));
            $shop3->            setName(htmlspecialchars($row['rest_name']));
            $shop3->            setLat(htmlspecialchars($row['rest_latitude']));
            $shop3->             setLng(htmlspecialchars($row['restlongtitude']));
            $shop3->             setPict1(htmlspecialchars($row['pict1']));
            $shop3->            setPict2(htmlspecialchars($row['pict2']));
            $shop3->            setHours(htmlspecialchars($row['openhours']));
            $shop3->            setRest(htmlspecialchars($row['restday']));
            $shop3->            setBudget_d(htmlspecialchars($row['budget_d']));
            $shop3->             setBudget_l(htmlspecialchars($row['budget_l']));
            }
        if($shop3->getName() != null){
             $flag = 1;
        }
    }
}
?>
<title>Suggest For You</title>

<!-- 【１】Google Maps APIを呼び出し-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDimNy5EQqYcTa8T7ChsIqUp68Weg4D6KE&sensor=false&language=ja"></script>
<script>
    var lat = <?php echo $shop->getLat() ?>;
    var lng = <?php echo $shop->getLng() ?>;
    var lat2 = <?php echo $shop2->getLat() ?>;
    var lng2 = <?php echo $shop2->getLng() ?>;
    var lat3 = <?php echo $shop3->getLat() ?>;
    var lng3= <?php echo $shop3->getLng() ?>;
    var t_lat = <?php echo "$tmp_lat" ?>;
    var t_lng = <?php echo "$tmp_lng" ?>;
</script>
<script type="text/javascript" src="http://localhost/aspen2/map_info2.js"></script>
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
          if($shop->getPict1()=='{}'){
              echo "<h3>画像が掲載されていません</h3>";
          }else{
              echo "<img id=pict_resize src=",$shop->getPict1(),"></img>";
          }
          ?>
        </div>
        <div class="info">
          <p class="shop_title"><?php
              echo $shop->getName();
          ?></p>
          開店時間<br>
            <?php
                echo $shop->getHours();
                echo "<br><br>";
            ?>
            <hstar>閉店日<br></hstar>
            <?php
                echo $shop->getRest();
                echo "<br><br>";
            ?>
            <hstar>予算<br>
              <?php
                echo "夕食：　";
                if($shop->getBudget_d() != 0){
                    echo $shop->getBudget_d();
                    echo "円<br>";
                }else
                    echo "--円<br>";
                echo "昼食：　";
                if($shop->getBudget_l() != 0){
                    echo $shop->getBudget_l();
                    echo "円<br><br>";
                }else
                    echo "--円<br><br>";
              ?>
              <br>
            </hstar>
          </div>
          <button type="button" onclick="window.open('http://maps.google.com/maps?saddr=<?php echo "($tmp_lat,$tmp_lng)";?>&daddr=<?php echo "(",$shop->getLat(),",",$shop->getLng(),")"?>&dirflg=w')">
          経路を表示する</button>
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
      <button type="button" onclick="window.open('http://maps.google.com/maps?saddr=<?php echo "($tmp_lat,$tmp_lng)";?>&daddr=<?php echo "(",$shop2->getLat(),",",$shop2->getLng(),")"?>&dirflg=w')">
      経路を表示する</button>
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
      <button type="button" onclick="window.open('http://maps.google.com/maps?saddr=<?php echo "($tmp_lat,$tmp_lng)";?>&daddr=<?php echo "(",$shop3->getLat(),",",$shop3->getLng(),")"?>&dirflg=w')">
      経路を表示する</button>
    </div>
  </div>

    </div>

    <script type="text/JavaScript">
        ChangeTab('tab0');
    </script>


    </div>

    <div id = "footer">
      <ul>
        <li><a class="footer_button" href="index.html">戻る</a><li>
        <li><a class="footer_button" href="http://localhost/aspen0710/suggest.php?pattern=<?php echo "$search_type"?>">再検索</a></li>
      </ul>
    </div>
</body>
</html>

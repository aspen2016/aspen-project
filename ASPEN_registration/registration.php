<?php
  session_start();

  if($_REQUEST["email"]!=""){
    //データベース接続
    $conn = mysql_connect("localhost","root","");
    if($conn==false){
        die("MySQL 接続エラー");
    }
    mysql_set_charset("utf8");
    mysql_select_db("users");

    //登録ボタンが押された場合
  if(isset($_POST["submit"])==TRUE){
    //idを求める
    $sql1 ="SELECT MAX(id) FROM account";
    $result=mysql_query($sql1);
    $id=1;
    $id=mysql_result($result,0);
    $id+=1;

    //sexを0or1に
    if ($_POST['sex']=="男"){
        $sex=1;
    }
    else{
        $sex=0;
    }

    //情報をデータベースへ
    $sql2 = "INSERT INTO account (id,name,email,password,sex,age) VALUES ($id,'".$_REQUEST["name"]."','".$_REQUEST["email"]."','".$_REQUEST["password"]."',$sex,".$_REQUEST["age"].")";

    $res=mysql_query($sql2);

    if ($res==false){
        print("エラーが発生しました.");
    }
    else{
        session_regenerate_id(TRUE);
        $_SESSION["email"]=$_POST["email"];
        header("Location: thanks.php");
        exit;
    }
  }
  mysql_close();
  }

?>


<!DOCTYPE HTML>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Security-Policy" content="default-src *; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">
    <link rel="stylesheet" href="components/loader.css">
    <title>新規会員登録</title>
    <script src="components/loader.js"></script>
    <script>
        //
        // TODO: Write JavaScript code here
        //
    </script>
    <style type="text/css"> 
    <!--
    #header{
    width: 100%;
    height:85px;
    font-family: 'Open Sans';
    background-color: #FFCC66;
    }
    #backbutton{
    margin: 0 10px 0 0;
    }
    #footer{
    background-color: #FFFFF0;
    height:70px;
    width:100%;
    position: fixed;
    bottom: 0;
    }
    
    p {
    margin:0px;
	padding:10px;
	border-bottom: 2px solid #FFF;
	font-size: 12px;
	background: #FFC;
	/*background-gradient*/
	background: -moz-linear-gradient(top, #FFC, #F9F9C9);
	background: -webkit-linear-gradient(top, #FFC, #F9F9C9);
	background: linear-gradient(#FFC, #F9F9C9);
    }
    p span {
    display: inline-block;
	/*IE用スターハック*/  
    *display: inline;  
    *zoom: 1;  
	width: 110px;
	text-align: right;
	padding-right:1em;
	margin:0px;
    }
    p span sup{
    color: #ff0000;
    }

    
    --> 
    </style>

</head>


<body>
<div id = "header">
</div>
<form action="" method="post">
<br>
<legend>お客様情報入力画面</legend>

<p>
<label><span><sup>＊</sup>ユーザー名 :</span>
<input type="text" name="name" size="20" maxlength="20">
</label>
</p>

<p>
<label><span><sup>＊</sup>メールアドレス :</span>
<input type="email" name="email" size="30" maxlength="50" pattern=".+@.+\..+" title="aaa@bbbbb.com のようなメールアドレスの形式で記入してください。" placeholder="aaa@bbbbb.com" required>
</label>
</p>

<p>
<label><span><sup>＊</sup>パスワード :</span>
<input type="password" name="password" size="20" maxlength="18" pattern="^[0-9A-Za-z]+$" title="半角英数字で入力してください。" required>
</label>
</p>


<p>
<label><span><sup>＊</sup>性別：</span>
<input type="radio" name="sex" value="男" /> 男　
<input type="radio" name="sex" value="女" /> 女
</label>
</p>

<p>
<label><span><sup>＊</sup>年齢 :</span>
<input type="text" name="age" size="5" maxlength="18" required>歳
</label>
</p>

<div id="check1">
<input type="submit" name="submit" value="登録" />
</div>
</form>

<div id="footer">
    <div id="backButton">
    <a href="index.html"><img src="back.gif"  height="30"></a>
    </div>
</div>

</body>
</html>

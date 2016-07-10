<?php
  session_start();

    //データベース接続
    $conn = mysqli_connect("localhost","root","12345");
    if($conn==false){
        die("MySQL 接続エラー");
    }
    mysqli_set_charset($conn,"utf8");
    mysqli_select_db($conn,"users");

    //登録ボタンが押された場合
  if(isset($_POST["submit"])==TRUE){
    //idを求める
    $sql1 ="SELECT MAX(id) FROM account";
    $result=mysqli_query($conn,$sql1);
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
    $sql2 = "INSERT INTO account (id,user_name,email,user_password,sex,age) VALUES ($id,'".$_REQUEST["name"]."','".$_REQUEST["email"]."','".$_REQUEST["password"]."',$sex,".$_REQUEST["age"].")";

    $res=mysqli_query($conn,$sql2);

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
  mysqli_close($conn);

?>


<!DOCTYPE HTML>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Security-Policy" content="default-src *; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">
    <link rel="stylesheet" href="components/loader.css">
    <link rel="stylesheet" href="stylesheet.css">
    <title>新規アカウントを作る</title>
    <script src="components/loader.js"></script>
    <script>
        //
        // TODO: Write JavaScript code here
        //
    </script>
    <style type="text/css">
    <!--
    .header_title{
      margin-top: 9px;
      float: left;
      font-size: 20px;
    }
    .backbutton{
      padding-top: 20px;
      margin: auto;
      text-align: center;
      color: #5e5e5e;
    }


    p {
    margin:0px;
	padding:10px;
	border-bottom: 2px solid #e9e9e9;
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
	width: 120px;
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
  <div id="header">
    <div class="header_content">
      <img src="logo.jpg"><div class="header_title">ぐるちょ</div>
    </div>
  </div>
<form action="" method="post">
<br>
<legend>お客様情報入力画面</legend>

<p>
<label><span><sup>＊</sup>ユーザー名 :</span>
<input type="text" name="name" size="15" maxlength="20">
</label>
</p>

<p>
<label><span><sup>＊</sup>メールアドレス :</span>
<input type="email" name="email" size="15" maxlength="50" pattern=".+@.+\..+" title="aaa@bbbbb.com のようなメールアドレスの形式で記入してください。" placeholder="aaa@bbbbb.com" required>
</label>
</p>

<p>
<label><span><sup>＊</sup>パスワード :</span>
<input type="password" name="password" size="15" maxlength="18" pattern="^[0-9A-Za-z]+$" title="半角英数字で入力してください。" required>
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
  <div class="button-panel">
    <input type="submit" name="submit" value="登録" class="button"/>
  </div>
</div>
</form>

<a href="index.php"><div class="backbutton">ログイン画面に戻る</div></a>

</body>
</html>

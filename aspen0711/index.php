<?php
  session_start();
  //エラーメッセージ
  $erroeMessage="";
  if(isset($_POST["errorMessage"])){
    $erroeMessage=htmlspecialchars($_POST["errorMessage"],ENT_QUOTES);
  }

  //emailを残す用
  $viewEmail = "";
  if(isset($_POST["email"])){
  $viewEmail= htmlspecialchars($_POST["email"], ENT_QUOTES);
  }


  //mysqlに接続
  $conn = mysqli_connect("localhost", "root", "12345");
  if($conn==false){
    die("MySQL 接続エラー");
  }
  mysqli_set_charset($conn,"utf8");
  mysqli_select_db($conn,"users");

  //ログインボタンが押された場合
  if(isset($_POST["SignIn"])==TRUE){
      $sql = "select * from account Where email ='".$_REQUEST["email"]."'and user_password = '".$_REQUEST["password"]."'";
      $res=mysqli_query($conn,$sql);

    //認証成功の場合
    if($row=mysqli_fetch_array($res)){
      //セッションIDを新規に発行
      session_regenerate_id(TRUE);
      $_SESSION["email"]=$_POST["email"];
      header("Location: mypage.php");
      exit;
    }
    else{
      $errorMessage="メールアドレスまたはパスワードに誤りがあります。";
    }
  }
  mysqli_close($conn);

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Security-Policy" content="default-src * data:; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">

    <script>
        // PhoneGap event handler
        document.addEventListener("deviceready", onDeviceReady, false);
        function onDeviceReady() {
            console.log("PhoneGap is ready");
        }
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"></link>
    <title>ログイン</title>
    <script src="ajax.js"></script>
</head>

<body>

  <div id="header">
    <div class="header_content">
      <img src="logo1.gif" class="logo1"><img src="logo2.gif" class="logo2">
    </div>
  </div>

<div id="container">

<!-- <div id="gourcho">
    ぐるちょ
</div> -->

<div class="form-wrapper">
  <h1>ログイン</h1>
  <form action="index.php" method="POST">
    <input type="hidden" id="shop_id" value="1"></input>
    <input type="hidden" id="user_id" value="2"></input>
    <input type="hidden" id="error" value="<?php $errorMessage ?>"></input>
    <div><font size="1" color="red" value="<?php $errorMessage ?>"></font></div>
    <div class="form-item">
      <label for="email"></label>
      <input type="email" name="email" required="required" placeholder="メールアドレス" value="<?php echo $viewEmail ?>"></input>
    </div>
    <div class="form-item">
      <label for="password"></label>
      <input type="password" name="password" required="required" placeholder="パスワード"></input>
    </div>
    <div class="button-panel">
      <input type="submit" id="initialize" class="button" name="SignIn" value="ログイン"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="registration.php">新規アカウントをつくる</a></p>
  </div>
</div>

</div>

<!-- <div id="footer"></div> -->

</body>
</html>

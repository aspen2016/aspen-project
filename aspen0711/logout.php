<?php
session_start();

if(isset($_SESSION["email"])){
    $errorMessage ="ログアウトしました。";
}
else{
    $errorMessage= "セッションがタイムアウトしました。";
}

// セッション変数を全て解除する
$_SESSION = array();

// セッションを切断するにはセッションクッキーも削除する。
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 最終的に、セッションを破壊する
session_destroy();
?>



<!doctype html>
<html>
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
    <img src="logo.jpg"><p>ぐるちょ</p>
  </div>
</div>

  <div class="error"><?php echo $errorMessage; ?></div>
  <div class="foot"><a href="index.php">ログイン画面に戻る</a></div>
  </body>

</html>

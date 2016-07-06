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
  <head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
  </head>
  <body>
  <div><?php echo $errorMessage; ?></div>
  <ul>
  <li><a href="index.php">ログイン画面に戻る</a></li>
  </ul>
  </body>
</html>
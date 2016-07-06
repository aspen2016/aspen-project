<?php
session_start();

//ログイン状態のチェック
if (!isset($_SESSION["email"])){
    header("Location:logout.php");
    exit;
}
?>


<!DOCTYPE HTML>
<html>
<head>
<meta name="robots" content="noindex,nofollow">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="mypage.css">
    
</head>
<body>
    <div id="header">
    <a href="logout.php">ログアウト</a>
    </div>
    
    <div id="container">
    
    <div id="username"> <?php echo $_SESSION["email"] ?> のマイページ </div>
    
    <div>
    <div id="image">
    <a href="">
    <img id="pict_user" src="person.PNG" width="200" height="200" alt="写真が登録されていません">
    </a>
    </div>
    
    <br>
    <div class="list">
    <p><a href="Favorite.html">Favorite</a></p>
    </div>
    <div class="list">
    <p><a href="History.html">History</a></p>
    </div>
    <div class="list">
    <p><a href="Recommend.html">Recommend</a></p>
    </div>
    </div>

    <div id="searchbutton">
    <br>
    <a class="search" href="ques1.html"><font color="#808080">いますぐお店を探す</font></a>
    </div>
    <div id="newsfield">
    News Field
    </div>
    <div id="news">
    <hr>
    　新しい質問フォームがあります
    <hr>
    　6/10に行ったお店○○を評価する
    <hr>
    </div>
        
    </div>

    <div id="footer">
    </div>

</body>
</html>

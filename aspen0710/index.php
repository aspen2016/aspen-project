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
  $conn = mysql_connect("localhost", "root", "a11120102");
  if($conn==false){
    die("MySQL 接続エラー");
  }
  mysql_set_charset("utf8");
  mysql_select_db("users");

  //ログインボタンが押された場合
  if(isset($_POST["SignIn"])==TRUE){
      $sql = "select * from account Where email ='".$_REQUEST["email"]."'and user_password = '".$_REQUEST["password"]."'";
      $res=mysql_query($sql);

    //認証成功の場合
    if($row=mysql_fetch_array($res)){
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
  mysql_close();

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
    <script src="ajax.js"></script>
    <style type="text/css">
    <!-->
    /* Fonts */
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400);

/* fontawesome */
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

/* Simple Reset */
* { margin: 0; padding: 0; box-sizing: border-box; }


#header{
    width: 100%;
    height:85px;
    font-family: 'Open Sans';
    background-color: #FFCC66;
}
        
        #gourcho{
            font-size: 20px;
            font-family: "メイリオ";
            text-align: center;
            margin: 70px 0 60px 0;
        }
        
#container{
    margin: 0 auto;
}
    
#footer{
    background-color: #FFFFF0;
    height:70px;
    width:100%;
    position: fixed;
    bottom: 0;
}

/* body */
body {
  background: #e9e9e9;
  color: #5e5e5e;
  font: 400 87.5%/1.5em 'Open Sans', sans-serif;
}

/* Form Layout */
.form-wrapper {
    width: 100%;
  background: #fafafa;
    margin-top: 100px;
  margin: 3em auto;
  padding: 0 1em;
  max-width: 370px;
}

h1 {
  text-align: center;
  font-size:30px;
  color: #660000;
  padding: 1em 0;
    font-family: "Arial";
}

form {
  padding: 0 1.5em;
}

.form-item {
  margin-bottom: 0.75em;
  width: 100%;
}

.form-item input {
  background: #fafafa;
  border: none;
  border-bottom: 2px solid #e9e9e9;
  color: #666;
  font-family: 'Open Sans', sans-serif;
  font-size: 1em;
  height: 50px;
  transition: border-color 0.3s;
  width: 100%;
}

.form-item input:focus {
  border-bottom: 2px solid #c0c0c0;
  outline: none;
}

.button-panel {
  margin: 2em 0 0;
  width: 100%;
}

.button-panel .button {
  background: #FFCC66;
  border: none;
  color: #fff;
  cursor: pointer;
  height: 50px;
  font-family: 'Open Sans', sans-serif;
  font-size: 1.2em;
  letter-spacing: 0.05em;
  text-align: center;
  text-transform: uppercase;
  transition: background 0.3s ease-in-out;
  width: 100%;
}

.button:hover {
  background: #ee3e52;
}

.form-footer {
  font-size: 1em;
  padding: 2em 0;
  text-align: center;
}

.form-footer a {
  color: #8c8c8c;
  text-decoration: none;
  transition: border-color 0.3s;
}

.form-footer a:hover {
  border-bottom: 1px dotted #8c8c8c;
}
    -->
</style>
</head>

<body>

<div id="header">
    </div>
    
<div id="container">
    
<div id="gourcho">
    ぐるちょ
</div>

<div class="form-wrapper">
  <h1>Sign In</h1>
  <form action="index.php" method="POST">
    <input type="hidden" id="shop_id" value="1"></input>
    <input type="hidden" id="user_id" value="2"></input>
    <input type="hidden" id="error" value="<?php $errorMessage ?>"></input>
    <div><font size="1" color="red" value="<?php $errorMessage ?>"></font></div>
    <div class="form-item">
      <label for="email"></label>
      <input type="email" name="email" required="required" placeholder="Email Address" value="<?php echo $viewEmail ?>"></input>
    </div>
    <div class="form-item">
      <label for="password"></label>
      <input type="password" name="password" required="required" placeholder="Password"></input>
    </div>
    <div class="button-panel">
      <input type="submit" id="initialize"class="button" name="SignIn" value="Sign In"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="registration.php">Create an account</a></p>
  </div>
</div>

</div>

<div id="footer"></div>

</body>
</html>
<?php

if (isset($_POST['signup'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  try {
    $db = new PDO('mysql:host=localhost:dbname=sample', 'watanabe', 'root');
    $sql = 'insert into users(username, password) values(?, ?)';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($username, $password));
    $stmt = null;
    $db = null;
    
    header('Location: http://localhost:8080/index.php');
    exit;
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF=8">
  <title>新規登録画面</title>
</head>
<body>

<h1>新規登録画面</h1>
<form action="" method="POST">
  ユーザ名<input type="text" name="username" value=""><br>
  パスワード<input type="password" name="password" value=""><br>
  <input type="submit" name="signup" value="新規登録">
</form>

</body>
</html>

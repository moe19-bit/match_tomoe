<?php
session_start();
include('../api/functions.php');

echo "<p class=thanks>{$_SESSION['user_id']}様ご登録ありがとうございます</p>
<p class=thanks1 >アドバイザーが好きなタイプにマッチするご登録者様をご紹介します！<br/>楽しみに待っていてくださいね。</p>";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>


    <a href="index.php">戻る</a>

</body>

</html>
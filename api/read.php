<?php

// DBの設定
$dbn = 'mysql:dbname=matchingapp;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DBに接続する処理
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:' . $e->getMessage());
}

// データ表示SQL作成
$sql = 'SELECT * FROM profile_table';
// *はデータを全部取得する意味
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
// 実行を忘れずに!!



// データ表示
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode($error[2]);
    exit();
} else {
    // fetchAll()でSQL実行結果を全件取得できる
    echo json_encode($stmt->fetchAll());
    exit();
}

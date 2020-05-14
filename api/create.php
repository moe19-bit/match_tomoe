<?php
session_start();

include('functions.php');

// 必須項目のチェック
// 入力チェック(（company,name,tel,email,deadlineが必須)未入力の場合は弾く，commentのみ任意) 
if (
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['bir']) || $_POST['bir'] == '' ||
  !isset($_POST['tel']) || $_POST['tel'] == '' ||
  !isset($_POST['email']) || $_POST['email'] == '' ||
  !isset($_POST['pro']) || $_POST['pro'] == '' ||
  !isset($_POST['image']) || $_POST['image'] == '' ||
  !isset($_POST['type']) || $_POST['type'] == '' ||
  !isset($_POST['type2']) || $_POST['type2'] == '' ||
  !isset($_POST['comment']) || $_POST['comment'] == ''

  // 送られてきた$_POSTにtaskはちゃんと入ってますか？$_POST['task']==''まさかtaskは空じゃないですよね？という意味
) {
  echo json_encode(['error' => 'param error']);
  http_response_code(500); // ←js側にエラーを表示する処理 exit();
}

$pdo = connectToDb();

// 受け取ったデータ（$_POSTの中身）を変数に格納
$name = $_POST['name'];
$bir = $_POST['bir'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$pro = $_POST['pro'];
$image = $_POST['image'];
$type = $_POST['type'];
$type2 = $_POST['type2'];
$comment = $_POST['comment'];

// // DBの設定
$dbn = 'mysql:dbname=matchingapp;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';


// データ登録SQL作成
$sql = 'INSERT INTO profile_table (id, name, bir, tel, email, pro, image, type, type2, comment, created_at, updated_at)
  VALUES(NULL, :name, :bir, :tel, :email, :pro, :image, :type, :type2, :comment,sysdate(), sysdate())';

// SQL実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':bir', $bir, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':pro', $pro, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$stmt->bindValue(':type2', $type2, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

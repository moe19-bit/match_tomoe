<?php

// DB接続関数（PDO）
function connectToDb()
{
    $dbn = 'mysql:dbname=matchingapp;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}

function check_session_id()
{
    if (
        !isset($_SESSION['session_id']) ||
        $_SESSION['session_id'] != session_id()
    ) {
        header('Location: login.php'); // ログイン画面へ移動
    } else {
        session_regenerate_id(true); // セッションidの再生成
        $_SESSION['session_id'] = session_id(); // セッション変数に格納 }
    }
}


// SQL処理エラー
function showSqlErrorMsg($stmt)
{
    $error = $stmt->errorInfo();
    echo json_encode($error[2]);
    http_response_code(500);
    exit();
}

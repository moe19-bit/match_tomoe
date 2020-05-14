<?php
session_start();
include('../api/functions.php');
// セッションにuser_idがなければログインページへ移動 
check_session_id();
// あればログアウトのリンクを張ってページ表示
echo "<p>ようこそ！{$_SESSION['user_id']}様</p>";
echo '<a href="../api/logout.php">log out</a>';

// print '<form method="post" action="thanks.php">';
// print '<input type="submit" value="OK">';
// print '</from>';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Match</title>
</head>

<body>
    <h1>Match</h1>
    <fieldset>
        <legend>プロフィール</legend>
        <form>
            <div>
                <label for="name">お名前(フルネーム)</label>
                <input type="name" id="name">
            </div>
            <div>
                <label for="bir">生年月日</label>
                <input type="date" id="bir">
            </div>
            <div>
                <label for="tel">電話番号</label>
                <input type="tel" 　pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" placeholder="090-1234-5678" id="tel">
            </div>
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" placeholder="info@sample.com" id="email">
            </div>
            <div>
                <label for="pro">身長/体重</label>
                <input type="text" id="pro">
            </div>
            <div>
                <label for="image">写真</label>
                <input type="file" id="image" accept="image/*">
            </div>
            <div>
                <label for="type">好きなタイプ</label>
                <input type="text" id="type">
            </div>
            <div>
                <label for="type２">好きな芸能人(複数)</label>
                <textarea name="" id="type2" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="comment">自己紹介</label>
                <textarea name="" id="comment" cols="30" rows="10"></textarea>
            </div>
            <!-- <button type="button" id="send">登録</button> -->
            <button type="button" id="send">登録</button>
        </form>

        </form>
    </fieldset>
    <fieldset>
        <legend>登録データ</legend>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>bir</th>
                    <th>tel</th>
                    <th>email</th>
                    <th>pro</th>
                    <th>image</th>
                    <th>type</th>
                    <th>type2</th>
                    <th>comment</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                </tr>
            </thead>
            <tbody id="echo"></tbody>
        </table>
    </fieldset>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        const createUrl = '../api/create.php';
        const readUrl = '../api/read.php';

        // 配列をタグに入れていい感じの形にする関数
        const convertArraytoListTag = array => {
            return array.map(x => {
                return `<tr>
                  <td>${x.id}</td>
                  <td>${x.name}</td>
                  <td>${x.bir}</td>
                  <td>${x.tel}</td>
                  <td>${x.email}</td>
                  <td>${x.pro}</td>
                  <td>${x.image}</td>
                  <td>${x.type}</td>
                  <td>${x.type2}</td>
                  <td>${x.comment}</td>
                  <td>${x.created_at}</td>
                  <td>${x.updated_at}</td>
                </tr>`;
            }).join('');
        }

        const readData = url => {
            axios.get(url)
                .then(response => {
                    // 成功した時
                    console.log(response);
                    // 入力欄を空にする処理 
                    document.getElementById('echo').innerHTML =
                        convertArraytoListTag(response.data);

                })
                .catch(error => {
                    console.log(error);
                })
                .finally();
        }
        readData(readUrl); // 読み込み時に実行



        // 送信ボタンクリック時の処理
        document.getElementById('send').addEventListener('click', () => {
            // createの処理
            //formのキーとバリューを入れる容器を準備する
            const postData = new FormData();
            // dataに必要なパラメータを追加する
            postData.append('name', document.getElementById('name').value);
            postData.append('bir', document.getElementById('bir').value);
            postData.append('tel', document.getElementById('tel').value);
            postData.append('email', document.getElementById('email').value);
            postData.append('pro', document.getElementById('pro').value);
            postData.append('image', document.getElementById('image').value);
            postData.append('type', document.getElementById('type').value);
            postData.append('type2', document.getElementById('type2').value);
            postData.append('comment', document.getElementById('comment').value);
            console.log(...postData.entries());

            // axiosでデータを送信する処理
            axios.post(createUrl, postData)
                .then(response => {
                    // 成功した時
                    console.log(response);

                    // 入力欄を空にする処理
                    document.getElementById('name').value = '';
                    document.getElementById('bir').value = '';
                    document.getElementById('tel').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('pro').value = '';
                    document.getElementById('image').value = '';
                    document.getElementById('type').value = '';
                    document.getElementById('type2').value = '';
                    document.getElementById('comment').value = '';

                    location.href = 'thanks.php';


                })
                .catch(error => {
                    console.log(error２);
                })
                .finally(() => {
                    //成功失敗どちらでも実行
                });

        });


        // 読み込み時のデータ取得処理
        // window.onload = () => {
        //     readData(readUrl);
        // };
    </script>
</body>

</html>
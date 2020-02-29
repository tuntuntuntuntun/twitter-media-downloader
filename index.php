<?php

require 'vendor/autoload.php';
require 'api_keys.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$file_pass = 'img/';

$connect = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

if (isset($_POST['name']) && isset($_POST['count'])) {
    $param = ['screen_name' => $_POST['name'], 'count' => $_POST['count']];
    $tweets = $connect->get('statuses/user_timeline', $param);
    $tweets = json_decode(json_encode($tweets), true);
    
    foreach ($tweets as $key1 => $val1) {
        if (isset($val1['extended_entities']['media'])) {
            foreach ($val1['extended_entities']['media'] as $key2 => $val2) {
                $data = file_get_contents($val2['media_url_https']);
                $timestamp = strtotime($val1['created_at']);
                $file_name = $file_pass.date('Ymd_His', $timestamp).'_'.($key2 + 1).'.jpg';
                file_put_contents($file_name, $data);
                sleep(1);
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ツイッター画像ダウンローダー</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="/" method="POST">
            <div class="form-group">
                <label for="name"">アカウント名</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="count">検索するツイート数</label>
                <input type="text" class="form-control" id="count" name="count">
                <small>ヒットしたツイートに含まれていた画像をダウンロードします。</small>
            </div>
            <button type="submit" class="btn btn-primary">ダウンロード</button>
        </form>
    </div>
</body>
</html>
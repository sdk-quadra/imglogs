# imglogs
画像でみんなのlogをとるアプリ


# install手順
* .env.exampleファイルを複製して、.envファイルを作成してください
* .envファイルの内容を修正してください
* $ composer installしてください
* $ php artisan key:generate してください
* $ php artisan migrate してください
* $ php artisan storage:link してください
  * エラーが出た場合は、publicフォルダ直下にできたstorageフォルダを削除してもう一度 $ php artisan storage:link を実行してください
* $ php artisan serveして、 http://localhost.8000 にアクセスしてください

## 画像表示
* laravelのpaginateはクエリを2回走らせる為一部画像表示がダブる。その対応はしていない



## UML
<img width="490" alt="imglogs_UML" src="https://user-images.githubusercontent.com/39234092/112307312-25d3c600-8ce4-11eb-90ac-aba88c03adda.png">

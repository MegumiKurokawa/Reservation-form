# Rese
-レストラン検索、レストラン予約、お気に入り登録が可能なプリケーション

![top](https://github.com/MegumiKurokawa/20230906_megumisasaki_reservation_service/assets/127080181/eb81fd22-a640-4605-aa3e-5c844ec97b87)

## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい

## 機能一覧
-会員登録<br>
-ログイン・ログアウト<br>
-ユーザー飲食店お気に入り・予約一覧取得<br>
-飲食店一覧取得<br>
-飲食店お気に入り追加・削除<br>
-飲食店予約情報追加・削除<br>
-飲食店をカテゴリーごとに検索<br>

## 使用技術
-Laravel 8.x<br>
-PHP

## テーブル設計
![table_1](https://github.com/MegumiKurokawa/megumisasaki_reservation_service/assets/127080181/50184d8b-84aa-496a-b18c-ee6baf68f6de)
![table_2](https://github.com/MegumiKurokawa/megumisasaki_reservation_service/assets/127080181/c9564bd8-dd28-46b9-a36e-cc97adc63f6a)

## ER図
![ER](https://github.com/MegumiKurokawa/megumisasaki_reservation_service/assets/127080181/1a5f63ce-eb21-42c5-8212-5f868986d003)

## 環境構築
リポジトリのクローン<br>
１．Codeをクリックし、SSHのURLをコピー<br>
２．パソコンのターミナル上で git clone と入力後すでにコピーしたURLをペースト<br><br>
Dockerの設定<br>
１．ターミナル上で docker-compose up -d --build コマンドを実行<br>
２．code . コマンドでを実行<br>
３．Docker Desktopを開きreservation_serviceコンテナの確認<br><br>
Laravelパッケージのインストール<br>
１．ターミナル上で docker-compose exec php bashコマンドを実行しphpコンテナ内にログイン<br>
２．phpコンテナ内で composer install コマンドを実行<br>
.envファイルの作成<br><br>
１．phpコンテナ内で cp .env.example .env コマンドを実行<br>
２．phpコンテナ内で php artisan key:generate コマンドを実行してAPP_KEYを発行<br>
３．.envファイルのDBを変更（mysqlファイルのenviromentの部分に記載しています）<br>
データベース設定<br><br>
１．phpコンテナ内で php artisan migrate コマンドを実行<br>
２．phpコンテナ内で php artisan db:seed コマンドを実行<br>

## その他
-テストログイン用ユーザー名：hoge<br>
-テストログイン用メールアドレス：hogehoge@test.com<br>
-テストログイン用パスワード：hogehoge

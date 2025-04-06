<!--シールド一覧-->
<p>
<img src="https://img.shields.io/badge/PHP-ccc.svg?logo=php&style=flat"> 
<img src="https://img.shields.io/badge/-CSS-1572B6.svg"> 
<img src="https://img.shields.io/badge/-HTML-333.svg">
<img src="https://img.shields.io/badge/-Windows-0078D6.svg?logo=windows&style=flat">
<img src="https://img.shields.io/badge/-MySQL-336791.svg?logo=mysql&style=flat">
<img src="https://img.shields.io/badge/-Visual%20Studio%20Code-007ACC.svg?logo=visual-studio-code&style=flat">
<img src="https://img.shields.io/badge/-GitHub-181717.svg?logo=github&style=flat">
<img src="https://img.shields.io/badge/-Docker-EEE.svg?logo=docker&style=flat">
</p>

<!--画面イメージ-->
![image](https://github.com/user-attachments/assets/80c33fb3-d2c3-42d4-a51a-2fe04ecadecb)

## 1.概要
メニューを選択して献立の合計カロリーを算出します。メニューは新規追加や編集、削除が可能です。
<br><br>

## 2.機能要件
- 料理選択機能
  - DBに保存されたメニューを選択欄に表示させる。
  - 主食、主菜、副菜を選択できる。
 
- カロリー計算機能
  - 選択した主食、主菜、副菜の合計カロリーを算出する。

- 合計カロリー・コメント保存機能
  - 合計カロリーとコメントをDBに保存する。

- メニュー一覧表示機能
  - DBに保存されたメニューをカテゴリごとに一覧で表示する。

- メニュー追加・削除・編集機能
  - メニューをDBに新規登録する。
  - 選択したメニューをDBから削除する。
  - 選択したメニューの情報を編集し、DBを更新する。
<br><br>

## 3.制作期間
30日間
<br><br>

## 4.こだわったポイント
- UIKitを導入し、統一感のあるレイアウトにしたこと。
- DBの更新前に確認メッセージを表示させるようにしたこと。
- 表示されるメニューを動的表示にして、DBの内容をリアルタイムで反映させていること。
- 長い文章でレイアウトが崩れないようにしたこと。
<br><br>

## 5.仕様動作のイメージ

<br><br>

## 6.機能一覧
| 料理選択画面 |　結果表示画面 |
| ---- | ---- |
|  |  |
| 主食、主菜、副菜をそれぞれの選択欄で指定します。コメントを自由に記入します。 | 合計カロリー、選択したメニュー、コメントを表示します。 |

| メニュー管理画面 |　メニュー編集画面 |
| ---- | ---- |
|  |  |
| メニュー一覧をカテゴリごとに表示します。 | 選択したメニューを編集します。 |

<br><br>

## 7.使用技術
| Category          | Technology Stack    | 
| ----------------- | ------------------- | 
| Frontend          | HTML, CSS（UIkit） | 
| Backend           | PHP                 | 
| Database          | phpMyAdmin          | 
| Environment setup | Docker              | 
| etc.              | Git, GitHub, vscode | 

<br><br>

## 8.今後の展望
 - JavaScriptを使用し、メニュー追加・削除・編集機能を非同期処理にする。
 - 過去の献立を記録し、一覧表示させる。
 - ER図を掲載する。

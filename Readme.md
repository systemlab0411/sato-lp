## プロジェクト概要
- 【クライアント名】
- 【サイトの種類（コーポレートサイト、採用サイトなど）】
- 【制作年】
- ディレクター：【】、デザイン：【】、コーディング：【】、テキスト：【】、撮影：【】


## ディレクトリ構成
- /assets　cssやimage、js、sassなど
- /lib　サイトデータ
- /parts　ctaセクション、パンくず、ページネーションなどの部品
- ページ用phpファイル


## 開発環境について
- 開発ツール　vsCode
- sass　Dart Sass
- jsライブラリ　GSAP,Swiper,jQuery


## 実行方法
- Node.js 24系を使用します。エディターは問いません。
- テーマ直下で初回に `npm ci` を実行します。
- 作業開始時に `npm run dev` を実行すると、SCSS保存時に表示用の `assets/css/main.min.css` を自動更新します。終了は `Ctrl+C` です。
- 公開・配布前に `npm run build` を実行し、通常版 `main.css` と圧縮版 `main.min.css` を揃えます。
- Live Sass Compilerとnpmの監視は同時に起動しないでください。

## コーディング規約

共通幅・ブレークポイント、SCSS構成、BEM・画像・ブランチの命名規則、表示確認の基準は [CODING_RULES.md](CODING_RULES.md) を参照してください。

## フォームのクラス名を反映する場合

- 入力用は `contctform.html`、確認用は `contactform-comfirm.html` を参照してください。今回の整理では旧クラスのCSS互換を残していません。
- 管理画面に保存済みのContact Form 7フォームは自動更新されません。既存のフォームID・送信設定・入力項目を保持し、クラス名の変更だけを手動で反映してください。
- 主な変更は `any-text` → `contact-form__optional`、`acc-wrapper` → `contact-form__consent`、`acc` → `contact-form__checkbox`、`contact-privacy-link` → `contact-privacy__link` です。
- 反映後は、入力・確認・戻る・送信・完了を確認してください。


## WordPressプラグイン（基本的なもの）
- BackWPup バックアップ
- Breadcrumb NavXT パンくず設定
- Contact Form 7　お問い合わせ
- Contact Form 7 Multi-Step Forms お問い合わせ確認・完了画面用
- Duplicate Pages　ページ複製用
- WP Multibyte Patch 日本語化
- Yoast SEO SEO設定
- Secure Custom Fields カスタム投稿


## 外部システム連携
- 外部とのシステム連携を行った場合の仕様はここに記載すること

## github　設定方法
- vscodeのターミナルに下記を入力
  - git config --global user.name {自分の名前}
  - git config --global user.email {メールアドレス}
- 最初にコミットしたいファイルやフォルダを用意し、コミットしておく
- vscodeのターミナルに下記を入力
  - git remote add origin https://github.com/{ユーザー名}/{リポジトリ名}.git
  - git branch -M main
  - git push -u origin main
  - ※fatal: remote origin already exists.が表示された場合には、
  - 「git remote rm origin」でoriginを削除し、再度originを登録する
- どのリポジトリに繋がっているか確認したい時は下記を実行
  - git remote -v
- 参考サイト（https://qiita.com/yuto_h9m8/items/1d5867981c81a18bc1db）

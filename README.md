# tsumugi

A simple WordPress theme for everyone, build with Underscores and Bootstrap 4.

[Underscores](http://underscores.me/)と[Bootstrap 4](http://v4-alpha.getbootstrap.com/)を使ってシンプルなWordPressテーマを制作するプロジェクトです。WordPress公式ディレクトリへの掲載を目標としています。

※UnderscoresとBootstrapでブログサイトを構築した、[littlebird-theme](https://github.com/littlebirdjp/littlebird-theme)の続編プロジェクトでもあります。

## テーマのコンセプト

- あまねく世界中の人に広く使ってもらえるテーマ
- 誰にでも文章を書きやすく想いを伝えやすいテーマ

## テーマの特徴

### ユーザーフレンドリー

初心者でも使いやすいシンプルな設計。複雑な機能は搭載しない。

### モバイルファースト

モバイルデバイスでの読みやすさ、操作しやすさを重視したデザイン。

### サステイナビリティー

時代に対応した最新のフレームワークを使用し、いつでもアップデートできる仕組みを導入。

## 完成イメージ

![](screenshots/sketch.jpg?raw=true)

## Requrements（制作ツール）

- [Underscores](http://underscores.me/)
- [Bootstrap 4](http://v4-alpha.getbootstrap.com/)
- [VCCW](http://vccw.cc/)

## 制作方針

- スターターテーマとCSSフレームワークのメリットを活かし、必要最低限の工数でテーマの完成を目指す。
- 最新のBootstrap 4（アルファ版）を使いつつ、将来Bootstrapがアップデートされても対応できる設計にする。  
（`bower install`すれば、いつでも更新できるように）
- 事前にデザインカンプは作成せず、実際にブラウザでの表示を確認しながら調整を進める、インブラウザデザインの手法を取り入れる。
- テーマの制作過程にテーマレビューの手法を取り入れ、公式ディレクトリの審査に通りやすい制作フローを追求する。

## 制作過程

1. [テーマ制作環境の構築](#user-content-テーマ制作環境の構築)
	- [ローカル仮想環境の構築](#user-content-ローカル仮想環境の構築)
	- [テーマデバッグ環境の構築](#user-content-テーマデバッグ環境の構築)
	- [スターターテーマの導入](#user-content-スターターテーマの導入)
	- [CSSフレームワークの導入](#user-content-cssフレームワークの導入)
		- [Bootstrapのインストールとアップデート対応](#user-content-bootstrapのインストールとアップデート対応)
		- [Bootstrap Sassファイルの抽出](#user-content-bootstrap-sassファイルの抽出)
	- [コンパイル環境の構築](#user-content-コンパイル環境の構築)
2. [テーマの制作](#user-content-テーマの制作)
	- [ストラクチャーの構築](#user-content-ストラクチャーの構築)
		- [CSSとJSの読み込みを追加](#user-content-cssとjsの読み込みを追加)
		- [normalize.cssの重複分を削除](#user-content-normalizecssの重複分を削除)
		- [オリジナルSassの初期設定](#user-content-オリジナルsassの初期設定)
		- [.conteinerタグの追加](#user-content-conteinerタグの追加)
	- スキンの装飾
3. 公式ディレクトリへの申請準備
	- 翻訳ファイルの作成
	- パブリッシュの設定
	- 公開申請
4. 公式サイトの作成
5. デモサイトの作成

### テーマ制作環境の構築

#### ローカル仮想環境の構築

WordPressの仮想環境を簡単に構築できる[VCCW](http://vccw.cc/)で、ローカルに開発環境を準備しました。  
今回はVCCW本体を外部ディレクトリである`/vccw/`配下へ配置し、プロジェクトフォルダ内には、`Vagrantfile`と`site.yml`だけ設置する形でローカル環境を構築しました。  
※この手法について、詳しくは[simple-vccw-env](https://github.com/littlebirdjp/simple-vccw-env)と[解説記事](http://littlebird.mobi/2016/02/vccw_git/)を参考にしてください。

今回は公式ディレクトリ向けのテーマを作るために、WordPressのあらゆる投稿パターン等を検証できる[テーマユニットテストデータ](https://wpdocs.osdn.jp/%E3%83%86%E3%83%BC%E3%83%9E%E3%83%A6%E3%83%8B%E3%83%83%E3%83%88%E3%83%86%E3%82%B9%E3%83%88)を予めインポートすることにしました。（`site.yml`に以下の記述を追加）

```
theme_unit_test: ture
theme_unit_test_uri: https://raw.githubusercontent.com/jawordpressorg/theme-test-data-ja/master/wordpress-theme-test-date-ja.xml
```

さらに、公式ディレクトリ向けのテーマは、日本語の他に英語版も合わせて検証する必要があるため、ローカルのWordPressをマルチサイト化して、日英2言語のデバッグ環境を同時に構築することにしました。マルチサイト機能を有効にするには、`site.yml`に以下のオプションを追加すればOKです。

```
multisite: true
```

また、今回はテーマのチェックに利用できる[Theme Check](https://ja.wordpress.org/plugins/theme-check/)等のプラグインもインストールしたかったので、下記のオプションも`site.yml`に追加しました。

```
plugins:
  - dynamic-hostname
  - wp-total-hacks
  - tinymce-templates
  - theme-check
  - wordpress-importer
```

以上の設定をした上で`vagrant up`を実行すると、最初からマルチサイト化＆テーマユニットテストデータがインポートされた状態で、ローカル環境のWordPressを利用することができます。


#### テーマデバッグ環境の構築

マルチサイト化したローカルのWordPress内に、英語デバッグ用の子サイトを作成します。  
子サイトの作成は、管理バーのメニュー「参加サイト」→「サイトネットワーク管理者」→「サイト」の「新規追加」から行います。「サイトの言語」は`English`にしておきましょう。

![](screenshots/screenshot05.png?raw=true)

次に、英語サイトの方にもテーマユニットテストデータをインポートしたかったので、[こちら](https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml)からファイルをダウンロードし、管理画面のTools→Import→WordPressから「Upload file and import」を実行しました。

![](screenshots/screenshot06.png?raw=true)

以上で、一つのテーマファイルを編集しながら、リアルタイムで日英2サイトの表示確認が行えるデバッグ環境を作ることができました。

ローカルでの各言語での検証サイトは下記URLとなります。

日本語 http://tsumugi.local/  
英語 http://tsumugi.local/en/

#### スターターテーマの導入

[Underscores](http://underscores.me/)のサイトでテーマ名などを入力して、スターターテーマ一式を生成し、ダウンロードしました。  
テーマ（ディレクトリ）名は`tsumugi`とし、Sassでのカスタマイズが行えるように、Sass版のチェックを入れて生成を行いました。  
ダウンロードしたディレクトリ一式を`www/wordpress/wp-content/themes/tsumugi`配下に設置し、管理画面から有効化することで、オリジナルのテーマを適用することができます。

※Underscoresの導入は、`vagrant ssh`後に以下のコマンドを実行する形でも、簡単に行うことができます。

```
wp scaffold _s tsumugi --theme_name="tsumugi" --author="youthkee" --author_uri="http://littlebird.mobi/" --sassify --activate
```

![](screenshots/screenshot01.png?raw=true)

この状態では、まだ何もデザインが適用されていない、シンプルな状態となります。

![](screenshots/screenshot04.png?raw=true)

英語版にも同じテーマを適用することで、こちらもテーマユニットテストデータで見た目を確認する環境が整いました。  
WP-CLIで子サイトに同じテーマを適用するには、以下のコマンドを実行すればOKです。

```
wp theme enable tsumugi --network
wp theme activate tsumugi --url=tsumugi.local/en
```

#### CSSフレームワークの導入

##### Bootstrapのインストールとアップデート対応

bowerを使ってテーマフォルダ内に[Bootstrap 4アルファ版](http://v4-alpha.getbootstrap.com/)をインストールしました。  
また、インストールと同時に不要ファイルを削除し、CSSとJS、Sass、および依存ファイル（jQueryとtether.js）だけを残すように設定しました。  
上記の一連の処理は、`package.json`にコマンドどして登録してあるので、今後は`npm run bwupdate`を実行するだけでBootstrapのインストールまたはアップデートが可能になります。

#### Bootstrap Sassファイルの抽出

`npm run bwupdate`を実行すると、`/bower_components/bootstrap/`内のSassファイルをコピーして、`/sass/bootstrap/`配下へ配置するように設定しました。  
`/sass/`フォルダには、Underscore用のSassファイルが格納されているので、これによって作業用のSassファイルが`/sass/`配下に集約される形になります。  
Bootstrapがアップデートされた際は、再度`npm run bwupdate`を実行することで、Bootstrap用のSassファイル一式も更新されるようにしました。

#### コンパイル環境の構築

`gulpfile.js`にタスクを記述して、Sassのコンパイル設定を追加しました。  
コンパイルに必要なパッケージは、`package.json`に記述してあるので、`npm i`コマンドを実行することでインストールできます。

`gulp`または`npm start`を実行すると、`/sass/`配下で編集したSassファイルが、`/`配下の各ディレクトリへCSSとして書き出されます。  
※今回はBootstrapオリジナルのCSSは基本上書きを行わず、BootstrapのSassをコピーした`tsumugi.scss`のみを編集することにしました。  

Underscoreの元CSSのフォーマットになるべく合わせるため、コンパイラはRuby Sassを使い、csscombとgulp-frepで整形を行なっています。  
そのため、Sassを編集する際は、プロジェクトフォルダで下記コマンドを実行し、指定したバージョンのSassとCompassをインストールしてください。  
（SassとCompassのバージョンをプロジェクトで統一するため）

```
bundle install --path=vendor/bundle --binstubs=vendor/bin
```

今回のテーマで読み込まれるCSSファイルおよびその読み込み順は、以下の通りとなる予定です。

```
/wp-content/themes/tsumugi/bower_components/bootstrap/dist/css/bootstrap.min.css
/wp-content/themes/tsumugi/style.css
/wp-content/themes/tsumugi/bootstrap/tsumugi.css
```

### テーマの制作

#### ストラクチャーの構築

まずは色彩や装飾などのビジュアル要素ではなく、骨組み部分のスタイリングのみを行うフェーズ。  
レイアウトやタイポグラフィ、各要素の大きさや余白、デバイス切替時の表示・動作の調整などを行います。

##### CSSとJSの読み込みを追加

`functions.php`に以下の記述を追加して、CSSとJavaScriptの読み込みを指定しました。  
jQueryはWordPressデフォルトのjQueryを使用し、BootstrapのJSはフッタに読み込ませる形にしました。  
各CSS, JSには、それぞれ適切な依存関係とバージョンを指定しています。

```
function tsumugi_scripts() {
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css', array(), '4.0.0-alpha.2', 'all' );
	wp_enqueue_style( 'underscores-style', get_stylesheet_uri(), array('bootstrap-style'), '1.0.0', 'all' );
	wp_enqueue_style( 'tsumugi-style', get_template_directory_uri() . '/bootstrap/tsumugi.css', array('underscores-style'), '1.0.0', 'all' );

	wp_enqueue_script( 'tether-js', get_template_directory_uri() . '/bower_components/tether/dist/js/tether.min.js', array('jquery'), '1.2.0', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('tether-js'), '4.0.0-alpha.2', true );

	wp_enqueue_script( 'tsumugi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tsumugi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tsumugi_scripts' );
```

![](screenshots/screenshot02.png?raw=true)

BootstrapのCSSが適用されたことで、見た目が少し変わりましたが、まだデザインはシンプルなままです。

![](screenshots/screenshot03.png?raw=true)

ウィジェット部分も、フッターにただ項目のリストが羅列されているだけの状態です。

##### normalize.cssの重複分を削除

BootstrapとUnderscoresでは、デフォルトのCSSに同じ`normalize.css`が使われているので、後から読み込まれるUnderscoresのSassからインクルードを解除し、重複しているスタイル記述を削除しました。

##### オリジナルSassの初期設定

オリジナルSassの初期設定を行ないました。  
`bootstrap.scss`をコピーして`tsumugi.scss`を作成し、カスタマイズに必要なモジュールだけをインクルードするようにしました。  
その際、オリジナルSassに読み込む各モジュールは、`_*.scss`→`_*_tm.scss`のように接尾辞を付けてリネームすることとしました。  
もし、Bootstrapがアップデートされた場合は、基本的に`_*.scss`と`_*_tm.scss`を比較しながら、差分のみをマージしていく予定です。

##### .conteinerタグの追加

全体のコンテンツ幅を調整するため、HTMLテンプレート側にBootstrapの`.conteiner`タグを追加しました。  
ヘッダとフッタ、コンテンツの各領域を100%幅でもデザイン調整できるよう、それぞれ`.conteiner`タグで囲む形にしました。
ｓ
##### フォントサイズの調整

見出し回りのフォントサイズが、初期設定だと少し大き過ぎるので、以下のように`_variables_tm.scss`内の変数の値を修正しました。

###### 修正前

```
$font-size-h1:               2.5rem !default;
$font-size-h2:               2rem !default;
$font-size-h3:               1.75rem !default;
$font-size-h4:               1.5rem !default;
$font-size-h5:               1.25rem !default;
$font-size-h6:               1rem !default;
```

###### 修正後

```
$font-size-h1:               1.75rem !default;
$font-size-h2:               1.6rem !default;
$font-size-h3:               1.45rem !default;
$font-size-h4:               1.3rem !default;
$font-size-h5:               1.15rem !default;
$font-size-h6:               1rem !default;
```

また、ナビゲーションメニューやフッター、エントリーの日時やカテゴリー表記、ウィジェット部分などは小さいフォントサイズにしたかったので、それぞれのSassのモジュールでサイズ指定しました。  
その際、Bootstrapには`$font-size-sm`や`$font-size-xs`などの変数が定義されているので、こちらを利用しました。
これによって、実際には`0.875rem`や`0.75rem`などの相対サイズが適用されます。

UnderscoresのSassでBootstrapの変数を利用する形になるので、`style.scss`に以下の一行を追加しておきます。

```
@import "bootstrap/variables_tm";
```

#### スキンの装飾

スケルトンで構造が組み終わり、色味やアイコン、パーツなど装飾部分のスタイリングを行うフェーズ。  
構造とスキンを明確に分けて構築することで、今後スキンを追加できるような設計も考慮に入れる予定です。

### 公式ディレクトリへの申請準備

テーマの制作をいったん終えて、公式ディレクトリへの申請準備をする段階のタスク。

#### 翻訳ファイルの作成

Underscoresは英語向けに作られたスターターテーマなので、国内ユーザー向けにテーマ内の英語部分を日本語化するための翻訳ファイルを作成します。

#### パブリッシュの設定

制作段階では、テーマフォルダ内に様々な開発用のファイルが存在するため、公式ディレクトリへの申請に備えて必要なファイルだけを抽出してパッケージ化する仕組みを構築します。  
この仕組みは、今後の運用フローにて、テーマを更新する際にも使用する予定です。

#### 公開申請

必要なファイルをzipにまとめてアップロードし、公式ディレクトリへの申請を行います。  
その後、レビューの結果が来たら、修正対応を行います。

### 公式サイトの作成

テーマの説明や使い方等を掲載する公式サイトを制作します。

#### URL（予定）

http://tsumugi.littlebird.mobi/

### デモサイトの作成

ユーザーが実際のテーマの表示・動作を確認しやすくするために、デモサイトを制作します。  
デモサイトは、海外／国内の両方のユーザー向けに、日英2言語分を制作します。  
デモサイトには、各言語のテーマユニットテストデータをインポートした状態で、WordPressの本番環境を構築する予定です。  
（サイトの内容自体は、ローカルに構築した制作・デバッグ環境とほぼ同じものを想定しています）

#### URL（予定）

http://tsumugi.littlebird.mobi/demo/  
http://tsumugi.littlebird.mobi/demo/en/

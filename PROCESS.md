# 制作過程(Development Process)

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
		- [フォントサイズの調整](#user-content-フォントサイズの調整)
		- [Navbarの組み込み](#user-content-Navbarの組み込み)
		- [ウィジェットのレイアウト調整](#user-content-ウィジェットのレイアウト調整)
		- [HTML タグとフォーマットの調整](#user-content-html-タグとフォーマットの調整)
		- [コメント欄とフォーム回りの調整](#user-content-コメント欄とフォーム回りの調整)
	- [スキンの装飾](#user-content-スキンの装飾)
		- [Webフォントとアイコンフォントの読み込み](#user-content-webフォントとアイコンフォントの読み込み)
		- [テーマロゴの作成](#user-content-テーマロゴの作成)
		- [テーマロゴの組み込み](#user-content-テーマロゴの組み込み)
		- [リンクカラーとパーツカラーの設定](#user-content-リンクカラーとパーツカラーの設定)
		- [見出しスタイルの作成](#user-content-見出しスタイルの作成)
3. [公式ディレクトリへの申請準備](#user-content-公式ディレクトリへの申請準備)
	- [翻訳ファイルの作成](#user-content-翻訳ファイルの作成)
		- [Underscoresの日本語ファイルを作成](#user-content-underscoresの日本語ファイルを作成)
		- [テーマ用に日本語ファイルを編集](#user-content-テーマ用に日本語ファイルを編集)
	- [パブリッシュの設定](#user-content-パブリッシュの設定)
	- [公開申請](#user-content-公開申請)
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

##### Navbarの組み込み

ヘッダーのナビゲーション部分に、Bootstrapの[Navbar](http://v4-alpha.getbootstrap.com/components/navbar/)を組み込みたかったので、`header.php`を以下のように改修しました。  

`nav`タグに`navbar navbar-light`のclassを追加し、
メニュー部分は`<?php wp_nav_menu(); ?>`タグで自動で生成されているので、
`'menu_class' => 'menu collapse navbar-toggleable-xs'`のようにパラメーターを追加する形でclassを追加しています。

###### 修正前

```
<nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'tsumugi2' ); ?></button>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
</nav><!-- #site-navigation -->
```

###### 修正後

```
<nav id="site-navigation" class="main-navigation navbar navbar-light" role="navigation">
	<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#primary-menu">
		&#9776;
	</button>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu collapse navbar-toggleable-xs' ) ); ?>
</nav><!-- #site-navigation -->
```

![](screenshots/screenshot09.png?raw=true)

ただし、このままだとUnderscores標準のメニューは、完全にレスポンシブ対応されておらず、モバイル端末で表示した際にも、通常のドロップダウンメニューが表示されてしまいます。

そこで、Media Queriesを利用して、狭いデバイス幅の場合はスマホ風のリストメニューに変わるよう、CSSを調整しました。その際のブレークポイントは、Bootstrapのmixinsを使って以下のように分岐させています。

```
@include media-breakpoint-up(sm) {
	544px以上で適用されるスタイル
}

@include media-breakpoint-down(xs) {
	543px以下で適用されるスタイル
}
```

また、UnderscoresのCSS上でBootstrapのmixinsを使用するため、`style.scss`に以下の読み込みも追加してあります。

```
@import "bootstrap/mixins";
```

以上で、メインナビゲーションにBootstrapのNavbarを組み込み、さらにレスポンシブ対応させることができました。  
尚、スマートフォンで表示した際は、ドロップダウンではなく、サブメニューも含めて通常のリストで展開される形になります。

![](screenshots/screenshot10.png?raw=true)

左：モバイル対応前のメニュー。右：モバイル対応後のメニュー。

##### ウィジェットのレイアウト調整

ウィジェット部分ですが、1カラムだとリスト部分の余白が空いてしまい、冗長な感じになってしまうので、コンパクトにプレーンテキストとして並べる形にしたいと思います。  
そこで、`_widgets.scss`を以下のように修正し、リスト部分のスタイルをインライン要素に修正しました。

```
.widget {
	margin: 0 0 1.5em;
	font-size: $font-size-sm;
	text-align: center;

	select {
		max-width: 100%;
	/* Make sure select elements fit in widgets. */
	}
	ul {
		display: inline;
		padding-left: 0;
		li {
			display: inline;
			&::before {
				content: ' | ';
			}
			&:first-child {
				&::before {
					content: '';
				}
			}
			li {
				&:first-child {
					&::before {
						content: ' | ';
					}
				}
			}
		}
	}
}
```

##### HTML タグとフォーマットの調整

テーマユニットテストデータのサンプルを参考に、引用 (Blockquote) やテーブル、定義リストの他、codeタグ、preタグなどHTML要素タグのスタイリングを行いました。  
Bootstrapのスタイルを適用したい箇所は`tsumugi.scss`を編集し、Underscoresのスタイルを適用したい箇所は`style.scss`を編集する形で、それぞれがバッティングしないよう調整しています。  
これによって、WordPressの投稿画面でユーザーがHTMLタグを使用した際にも、それぞれ適切なスタイルが適用されることになります。

##### コメント欄とフォーム回りの調整

コメント部分の表示の調整を行いました。  
コメントの一覧部分は、初期状態では番号付きリストになっているので、`list-style: none;`にして、フォントサイズなどを調整しました。

また、合わせてコメント入力欄の調整を行い、送信ボタンにはBootstrapの標準ボタンスタイルを当てることにしました。  
これにはSassの`@extend`機能を使って、送信ボタンの要素そのものに`.btn`classのスタイルを適用する形を取っています。

```
input[type="submit"],
.more-link {
  @extend .btn, .btn-primary;
}
```

また、合わせて検索ボックスやパスワード入力欄など、フォーム回りの調整を行い、「続きを読む」リンクのスタイリングも行いました。  
「続きを読む」のスタイルは、先ほどの送信ボタンと同じく、Bootstrap標準ボタンを適用しています。

![](screenshots/screenshot07.png?raw=true)

ここまでの作業で、シンプルなワンカラム風のレスポンシブ・レイアウトに調整することができました。

![](screenshots/screenshot08.png?raw=true)

フッターのウィジェット部分も、ワンカラム向けにスタイリングしたことで、デバイスの幅に関わらず、コンパクトな見た目を実現しています。

#### スキンの装飾

スケルトンで構造が組み終わり、色味やアイコン、パーツなど装飾部分のスタイリングを行うフェーズ。  
構造とスキンを明確に分けて構築することで、今後スキンを追加できるような設計も考慮に入れる予定です。

##### Webフォントとアイコンフォントの読み込み

サイトタイトルと、ウィジェットのタイトル部分にWebフォントを適用したかったので、[Google Fonts](https://www.google.com/fonts)を読み込ませることにしました。

また、テーマの装飾にアイコンフォントを利用したかったので、合わせて[Font Awesome](https://fortawesome.github.io/Font-Awesome/)の読み込みも行いました。

`function.php`に以下の記述を追加することで、Google FontsやFont Awesomeなどの外部フォントを読み込ませることができます。

```
function tsumugi_scripts() {

…

	wp_enqueue_style( 'google-font', 'http://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope|Source+Sans+Pro:300' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );

…

}
add_action( 'wp_enqueue_scripts', 'tsumugi_scripts' );
```

CSS側では、下記のようにフォントファミリーを指定することで、Webフォントを適用させることができます。

```
.site-title {
  font-family: 'Annie Use Your Telescope', cursive;
}

.widget-title {
	font-family: 'Source Sans Pro',sans-serif;
}
```

##### テーマロゴの作成

サイトタイトルの部分に、ロゴを組み込みたかったので、テーマロゴを作成しました。

ロゴは軽量で汎用性の高いアイコンフォントとして組み込みたかったので、cognitomさんの[symbols-for-sketch](https://github.com/cognitom/symbols-for-sketch)を使い、[Sketch](https://www.sketchapp.com/)ファイルからアイコンフォントの生成を行いました。

symbols-for-sketchのファイル一式をテーマフォルダ内に設置してSketchファイルを編集し、gulpのコマンドを実行するだけで、アイコン用のフォントファイルと、組み込み用のCSSファイルを生成してくれます。

まずは、Sketchのアートボード内に、こんな感じでアイコン用の画像を作成してみました。  
（マスク部分の色味は、最終的にCSSで設定するので、何色でもOKです）

![](screenshots/screenshot11.png?raw=true)

##### テーマロゴの組み込み

`symbols-for-sketch-master/gulpfile.js`で、フォント名や出力先のパスなどを設定し、`gulp symbols`コマンドを実行すると、アイコンフォント一式が生成されます。

以下の記述をCSSファイルに組み込むと、オリジナルのアイコンフォントを表示させることができます。

```
@font-face {
  font-family: "tsumugi";
  src: url('../fonts/tsumugi.eot');
  src: url('../fonts/tsumugi.eot?#iefix') format('eot'),
    url('../fonts/tsumugi.woff2') format('woff2'),
    url('../fonts/tsumugi.woff') format('woff'),
    url('../fonts/tsumugi.ttf') format('truetype'),
    url('../fonts/tsumugi.svg#tsumugi') format('svg');
  font-weight: normal;
  font-style: normal;
}

.s:before {
  display: inline-block;
  font-family: "tsumugi";
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.s-feather:before { content: "\EA01" }
```

今回作成した『羽根』のアイコンは、HTML内に`<span class="s s-feather"></span>`と記述すればいいので、ヘッダー部分を下記のように修正しました。

```
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="s s-feather"></span><br class="hidden-md-up"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="s s-feather"></span><br class="hidden-md-up"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
```

あとは、CSS側でサイズや色などを調整すれば、ヘッダーのデザイン処理は完了です。ヘッダー部分も、レスポンシブ対応させ、スマートフォン／タブレットで表示した際は、スタイルを切り替えるようにしています。

![](screenshots/screenshot12.png?raw=true)

ロゴの直後に、以下の`<br>`タグを入れていますが、Bootstrapの汎用classでスマートフォン／タブレットの時だけ表示するようにしているので、これによってタイトル部分もモバイルデバイスで閲覧した時だけ1カラム表示になります。

```
<br class="hidden-md-up">
```

##### リンクカラーとパーツカラーの設定

テーマ内の各種リンクカラーとパーツの色味を設定しました。

今回のテーマでは、サイトロゴとサイトタイトルに使用している『渋みのあるブルー』がメインカラーとなるので、ヘッダーのナビゲーションメニューやボタン類は同系色で、また本文中のリンクカラーは補色となる赤系統の色にすることにしました。  
（どちらにも属さないウィジェット内のリンクや、投稿時間・投稿者などのリンクは、テキストと同じ黒系統の色で統一しています。）

今回、それらの配色パターンを検討する上で、日本の伝統色を集めた[日本の伝統色 和色大辞典 - Traditional colors of Japan](http://www.colordic.org/w/)というサイトを参考にさせていただきました。

各パーツ毎の色名称と色コードは、それぞれ以下の通りです。

|パーツ|色名称|色コード|
|---|:---:|---:|
|サイトロゴ|浅縹（あさはなだ）|#84b9cb|
|サイトタイトル|藍色（あいいろ）|#165e83|
|メニューリンク<br>ウィジェットタイトル<br>続きを見るボタン|紺碧（こんぺき）|#007bbb|
|テキストリンク|紅緋（べにひ）|#e83929|

##### 見出しスタイルの作成

エントリー本文内で使用される`h1`〜`h6`の見出しタグのスタイルを作成しました。

このテーマでは、エントリータイトルを`h1`にしているので、通常は`h2`からが使用される想定ですが、ユーザーの使い方によっては様々なケースが考えられるので、念のため`h1`からきちんとスタイルを定義しています。

見出しの装飾についても、サイトタイトルやリンクカラーと同じく、青系のメインカラーを差し色として取り入れました。

![](screenshots/screenshot15.png?raw=true)

##### カスタムヘッダー対応

最後に、ヘッダー部分にユーザーが好きな画像を挿入できる「カスタムヘッダー」機能の実装を行いました。

この機能は、当初搭載しなくてもいいと思っていたのですが、公式ディレクトリ申請に必要となるテーマのスクリーンショットを作成していた際に、どうしても見栄えが物足りなく感じられたため、写真を掲載した場合のサンプルとして、ヘッダーに組み込むことにしました。

Underscoresは標準でカスタムヘッダーに対応しているので、導入するのは非常に簡単です。`hrader.php`の任意の箇所に、以下のように記述するだけでOKです。

この場合、`if`タグで条件分岐しているので、ユーザーがテーマカスタマイザーからヘッダー画像を登録した場合だけ、サイト上に表示される形になります。

```
			<?php if ( get_header_image() ) : ?>
				<div class="custom-header">
					<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
				</div>
			<?php endif; // End header image check. ?>
```

また、公式ディレクトリ申請用のスクリーンショットは、1200x900pxとなっており、かなり大きめなので、広いディスプレイサイズで見た場合の見栄えがかなり重要な要素になります。さらに、[公式テーマディレクトリ](https://wordpress.org/themes/)の検索画面で見ると、286x214pxのサムネイルで表示されるので、このサイズに縮小した場合の見え方も考慮する必要があります。

以上のことを踏まえてヘッダー画像のサイズを検討し、合わせてPCで閲覧した場合はサイトタイトルも大きく表示されるように、ブレークポイント毎のサイズを微調整しました。

![](screenshots/screenshot16.png?raw=true)

以上で、スキンの装飾を含めて、テーマの制作が一通り完了しました。

ちなみに、今回作成したスクリーンショットを公式テーマディレクトリの詳細ページ、検索ページで見た場合のサムネイルの見た目は、それぞれ以下のようなイメージになります。

<img src="/littlebirdjp/tsumugi/raw/master/www/wordpress/wp-content/themes/tsumugi/screenshot.png?raw=true" alt="" style="max-width:100%;width:572px;">

<img src="/littlebirdjp/tsumugi/raw/master/www/wordpress/wp-content/themes/tsumugi/screenshot.png?raw=true" alt="" style="max-width:100%;width:286px;">

### 公式ディレクトリへの申請準備

テーマの制作をいったん終えて、公式ディレクトリへの申請準備をする段階のタスク。

#### 翻訳ファイルの作成

Underscoresは英語向けに作られたスターターテーマなので、国内ユーザー向けにテーマ内の英語部分を日本語化するための翻訳ファイルを作成しました。

テーマを翻訳するには、まず翻訳部分のテキストを抽出する必要がありますが、Underscoresにはすでに翻訳用のテンプレートファイルが含まれているので（Translation Readyの状態）、このファイルを元に翻訳を行えばOKです。

翻訳ファイルの作成は、コマンドラインツール等でもできるそうですが、今回は[Poedit](https://osdn.jp/projects/sfnet_poedit/)というソフトを使って翻訳を行いました。

Poeditで翻訳するには、「ファイル」→「POTファイルを元に新しいカタログファイルを作成します」から、すでにテーマフォルダに入っている`languages/tsumugi.pot`というファイルを開き、`ja.po`のファイル名で保存。後は、ウィンドウの『翻訳』という欄に対応する日本語を入力していくだけで実行できます。

![](screenshots/screenshot13.png?raw=true)

##### Underscoresの日本語ファイルを作成

ところで、Underscoresは国内でも多数のユーザーに使用されていると思われますが、すでに日本語の翻訳ファイルなどは存在しないのでしょうか？

そう思って探してみると、[naokomc](https://github.com/naokomc/_s/tree/language-pack-branch-patch/languages)さんや、[gatespace](https://github.com/gatespace/_s/tree/ja/languages)さんが作成された日本語ファイルがGitHubに公開されていました。

そこで、今回はこれらのファイルを参考に、まずUnderscoresの日本語ファイルを作成し、次に今回制作するテーマ用に、必要な箇所を書き換える流れで翻訳を行いました。

※2016年4月時点での最新の日本語ファイルを、こちらの[リポジトリ](https://github.com/littlebirdjp/_s/blob/add-japanese-language-file/languages)にアップしているので、よろしければお使いください。

##### テーマ用に日本語ファイルを編集

先ほど作成した翻訳ファイル`ja.po`と、自動的に生成される`ja.mo`の2つが入っていれば、WordPressは翻訳ファイルを認識し、翻訳部分が日本語で表示されます。ただし、このままだとテーマ名や作者名、URLなどがUnderscoresの初期状態のままの表記になってしまうので、これらは書き換えておいた方がいいでしょう。

そこで、`tsumugi.pot`と`ja.po`をそれぞれテキストエディタで編集し、必要な箇所の書き換えを行いました。「Last-Translator」等の欄も、Poeditで変換した場合はソフトに設定した翻訳者名とメールアドレスが挿入されますが、必要があれば適切な表記に修正しておきます。

エディタ等で直接編集した場合は、そのままでは自動的に反映されないので、`ja.po`をPoeditで開き直してから、再度保存しましょう。

![](screenshots/screenshot14.png?raw=true)

以上で、テーマの翻訳・日本語化の作業が完了しました。

#### パブリッシュの設定

制作段階では、テーマフォルダ内に様々な開発用のファイルが存在するため、公式ディレクトリへの申請に備えて必要なファイルだけを抽出してパッケージ化する仕組みを構築しました。  
この仕組みは、今後の運用フローにて、テーマを更新する際にも使用する予定です。

公開用のファイル一式をパブリッシュするため、`gulpfile.js`に以下のタスクを追加しました。  
zip形式への圧縮と、不要ファイルの削除には、`gulp-zip`と`gulp-rimraf`というパッケージを使用しています。

```
var project = 'tsumugi';
var version = '1.0.0';

var paths = {
  'src': 'sass/',
  'dist': './',
  'build': 'build/'
}

gulp.task("buildFiles", function() {
  return gulp.src([paths.dist + '**/*.+(php|css|js|json|txt|pot|po|mo|jpg|jpeg|png|gif|svg|eot|ttf|woff|woff2)'])
    .pipe(ignore('node_modules/**'))
    .pipe(ignore('vendor/**'))
    .pipe(ignore('symbols-for-sketch-master/**'))
    .pipe(ignore('package.json'))
    .pipe(ignore('gulpfile.js'))
    .pipe(gulp.dest(paths.build))
});

gulp.task("buildZip", ['buildFiles'], function() {
  return gulp.src([paths.build + '/**/'])
    .pipe(zip(project+'.zip'))
    .pipe(gulp.dest(paths.dist))
});

gulp.task("cleanup", ['buildZip'], function() {
  return gulp.src([paths.build], { read: false })
    .pipe(rimraf({ force: true }));
});

gulp.task('build', ['cleanup']);
```

`gulp build`というコマンドを実行すると、下記の一連の処理が実行されます。

- テーマフォルダ内から必要な拡張子のファイルだけ抽出し、`/build/`フォルダ配下へコピー（不要なファイル、フォルダは除く）
- `/build/`フォルダ内のファイル一式を、`tsumugi.zip`という名前でzipファイルに圧縮
- `/build/`フォルダ内に残った不要ファイルを削除

以上で、いつでも公開用のテーマファイル一式を作成することができるようになりました。  
実際には、リリースしたバージョン毎に、`tsumugi.zip`を`tsumugi.1.0.0.zip`のようにリネームして、公開・アップデートする形になります。

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

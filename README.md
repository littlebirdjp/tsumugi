# tsumugi

A simple WordPress theme for everyone, build with Underscores and Bootstrap 4.

## Requrements

- [VCCW](http://vccw.cc/)
- [Underscores](http://underscores.me/)
- [Bootstrap 4](http://v4-alpha.getbootstrap.com/)

## 制作過程

### テーマ制作環境の構築

#### VCCWによるローカル環境の構築

今回はvccw本体を外部ディレクトリである`/vccw/`配下へ配置。  
プロジェクトフォルダ内には、`Vagrantfile`と`site.yml`だけ設置する形でローカル環境を構築した。

#### テーマユニットテストデータのインポート

[テーマユニットテストデータ](https://wpdocs.osdn.jp/%E3%83%86%E3%83%BC%E3%83%9E%E3%83%A6%E3%83%8B%E3%83%83%E3%83%88%E3%83%86%E3%82%B9%E3%83%88)をインポート。  
その状態で、WordPress内のデータを`import.sql`にエクスポートした。

#### Underscoresのインストール

[Underscores](http://underscores.me/)のファイル一式をダウンロードし、`www/wordpress/wp-content/themes/tsumugi`配下に設置。

#### Bootstrapのインストール

bowerを使ってテーマフォルダ内にBootstrap 4アルファ版をインストール。  
また、インストールと同時に不要ファイルを削除し、CSSとJS、Sass、jQueryのファイルだけを残すように設定。  
上記の一連の処理は、`package.json`に記述してあるので、`npm run bsupdate`を実行するだけでBootstrapのインストール（アップデート）が可能になるようにした。

#### BootstrapのSassファイルを抽出

`npm run bsupdate`を実行すると、`/bower_components/bootstrap/`内のSassファイルをコピーして、`/sass/bootstrap/`配下へ配置するように設定。  
これによって、作業用のSassファイルを`/sass/`配下に集約することとした。  
Bootstrapがアップデートされた際は、再度`npm run bsupdate`を実行することで、マスターのファイルだけが更新されるようになる。

#### Sassのコンパイル設定を追加

`gulpfile.js`にタスクを記述して、Sassのコンパイル設定を追加。  
`/sass/`配下で編集したファイルが、`/`配下の各ディレクトリへCSSとして書き出される。  
ただし、BootstrapとUnderscoresのオリジナルのCSSは、基本上書きを行わず、BootstrapのSassをコピーした`tsumugi.scss`のみ編集することとする。  
※Underscoreの元CSSのフォーマットになるべく合わせるため、コンパイラはRuby Sassを使い、csscombとgulp-frepで整形を行なっている。

今回のテーマで読み込まれるCSSファイルおよびその読み込み順は、以下の通りとなる予定。

```
/wp-content/themes/tsumugi/bower_components/bootstrap/dist/css/bootstrap.min.css
/wp-content/themes/tsumugi/style.css
/wp-content/themes/tsumugi/bootstrap/tsumugi.css
```

### テーマの編集

#### CSSとJSの読み込みを追加

`functions.php`に以下の記述を追加して、CSSとJavaScriptの読み込みを指定した。  
jQueryはWordPressデフォルトのjQueryを使用し、BootstrapのJSはフッタに読み込ませている。  
各CSS, JSには、それぞれ適切な依存関係とバージョンを指定した。

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

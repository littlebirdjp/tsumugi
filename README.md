# tsumugi

A simple WordPress theme for everyone, build with Underscores and Bootstrap 4.

## Requrements

- [VCCW](http://vccw.cc/)
- [Underscores](http://underscores.me/)
- [Bootstrap 4](http://v4-alpha.getbootstrap.com/)

## 制作過程

### VCCWによるローカル環境の構築

今回はvccw本体を外部ディレクトリである`/vccw/`配下へ配置。  
プロジェクトフォルダ内には、`Vagrantfile`と`site.yml`だけ設置する形でローカル環境を構築した。

### テーマユニットテストデータのインポート

[テーマユニットテストデータ](https://wpdocs.osdn.jp/%E3%83%86%E3%83%BC%E3%83%9E%E3%83%A6%E3%83%8B%E3%83%83%E3%83%88%E3%83%86%E3%82%B9%E3%83%88)をインポート。  
その状態で、WordPress内のデータを`import.sql`にエクスポートした。

### Underscoresのインストール

[Underscores](http://underscores.me/)のファイル一式をダウンロードし、`www/wordpress/wp-content/themes/tsumugi`配下に設置。

### Bootstrapのインストール

下記コマンドでテーマフォルダ内にBootstrap 4アルファ版をインストール。  
`package.json`に依存関係を記述した。

```
$ npm install bootstrap@4.0.0-alpha.2 --save
```

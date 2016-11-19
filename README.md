# tsumugi

[![Build Status](https://travis-ci.org/littlebirdjp/tsumugi.svg?branch=master)](https://travis-ci.org/littlebirdjp/tsumugi)

![](screenshot.png?raw=true)

tsumugi is a simple WordPress theme based on Underscores and Bootstrap. It consists of a single column layout which is suitable for mobile devices and tablets along with PCs. For it's readability and simplicity, this theme is user-friendly for everyone. (The name of "tsumugi" is inspired by the song of "Hatsune", a Japanese singer.)

- [Demo Site](http://tsumugi.halfmoon.jp/)
- [デモサイト(日本語)](http://tsumugi.halfmoon.jp/ja/)
- [制作過程はこちら(Development Process)](https://github.com/littlebirdjp/tsumugi/wiki/%E5%88%B6%E4%BD%9C%E9%81%8E%E7%A8%8B)

## Usage

Extract a [zip file](https://github.com/littlebirdjp/tsumugi/releases) and put an uncompressed folder in the theme directory.  
Then, activate it from the admin panel.

## Customization

### Requrements

- node.js
- gulp
- bower

### Edit theme files

#### 1. Install node modules

Move to the theme directory and run `npm install`.

### 2. Install Ruby Sass and Compass

Run the below command to install specific version of Ruby Sass and Campass with bundler.

```
bundle install --path=vendor/bundle --binstubs=vendor/bin
```

#### 3. Run gulp watch

Run `gulp` or `npm start` when compiling Sass to CSS.

#### 4. Build zip file

Run `gulp build` to publish necessary files to a zip file.

### Update Dependencies

If you want to update Bootstrap and other bower components, run `npm run bwupdate` in the theme directory. It will be updated just necessary files in `/bower_components/`.  
(If you want to get whole dependencies, it's OK to run just `bower install`.)

After above command, Sass master files of Bootstrap in `bootstrap/scss/` will be updated too.  
(Original Sass files for this theme are remain in same directories as `*_tm.scss`)

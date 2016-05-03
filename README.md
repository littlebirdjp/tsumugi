# tsumugi

![](screenshot.png?raw=true)

tsumugi is a simple WordPress theme based on Underscores and Bootstrap. It consists of a single column layout which is suitable for mobile devices and tablets along with PCs. For it's readability and simplicity, this theme is user-friendly for everyone. (The name of "tsumugi" is inspired by the song of "Hatsune", a Japanese singer.)

- [Demo Site](http://tsumugi.halfmoon.jp/)
- [デモサイト(日本語)](http://tsumugi.halfmoon.jp/ja/)
- [制作過程はこちら(Development Process)](PROCESS.md)

## Usage

Extract a [zip file](/release/) and put an uncompressed folder in the theme directory.  
Then, activate it from the admin panel.

## Customization

### Requrements

- [Underscores](http://underscores.me/)
- [Bootstrap 4](http://v4-alpha.getbootstrap.com/)
- gulp
- bower

### Edit theme files

#### 1. Install node modules

Move to the theme directory and run `npm install`.

#### 2. Run gulp watch

Run `gulp` or `npm start` when compiling Sass to CSS.

#### 3. Build zip file

Run `gulp build` to publish necessary files to a zip file.

### Update Dependencies

If you want to update Bootstrap and other bower components, run `npm bwupdate` in the theme directory. It will be updated just necessary files in `/bower_components/`.  
(If you want to get whole dependencies, it's OK to run just `bower install`.)

After above command, Sass master files of Bootstrap in `bootstrap/scss/` will be updated too.  
(Original Sass files for this theme are remain in same directories as `*_tm.scss`)

# tsumugi

![](/www/wordpress/wp-content/themes/tsumugi/screenshot.png?raw=true)

tsumugi is a simple WordPress theme based on Underscores and Bootstrap. It consists of a single column layout which is suitable for mobile devices and tablets along with PCs. For it's readability and simplicity, this theme is user-friendly for everyone. (The name of "tsumugi" is inspired by the song of "Hatsune", a Japanese singer.)

- [Demo Site](http://tsumugi.halfmoon.jp/)
- [デモサイト()日本語)](http://tsumugi.halfmoon.jp/ja/)
- [制作過程はこちら(Development Process)](PROCESS.md)

## Usage

Extract a [zip file](/www/wordpress/wp-content/themes/tsumugi/release/) and put an uncompressed folder in the theme directory.  
Then, activate it from the admin panel.

## Customization

### Requrements

- [Underscores](http://underscores.me/)
- [Bootstrap 4](http://v4-alpha.getbootstrap.com/)
- [VCCW](http://vccw.cc/)
- gulp
- bower

### Set up the WordPress environment

This theme is build with the local WordPress environment using [VCCW](http://vccw.cc/).  
If you want to set up this environment, refer the blow steps.

#### 1. Clone VCCW to your root directory.

```
sudo git clone https://github.com/vccw-team/vccw.git /vccw
```

#### 2. Clone this repository to your projects folder.

```
git clone https://github.com/littlebirdjp/tsumugi.git ~/prj/tsumugi
cd ~/prj/tsumugi
vagrant up
```

You can replace `/prj/` to any other name.

#### 3. Visit WordPress on the Vagrant in your browser.

Visit [http://tsumugi.local/](http://tsumugi.local/) or [http://192.168.33.13/](http://192.168.33.13/)

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

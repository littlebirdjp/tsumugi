#!/bin/bash

cp bower_components/bootstrap/scss/*.scss sass/bootstrap/
cp bower_components/bootstrap/scss/mixins/*.scss sass/bootstrap/mixins/
rm -rf bower_components/bootstrap/scss
rm -rf bower_components/jquery

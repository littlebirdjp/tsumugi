#!/bin/bash

VERSION='2.0.1'

function build_tsumugi() {
  mkdir tsumugi
  cp -rpf bootstrap tsumugi/
  cp -rpf font-awesome tsumugi/
  cp -rpf img tsumugi/
  cp -rpf inc tsumugi/
  cp -rpf js tsumugi/
  cp -rpf template-parts tsumugi/
  mkdir tsumugi/bower_components
  mkdir tsumugi/bower_components/bootstrap
  mkdir tsumugi/bower_components/popper.js
  cp -rpf bower_components/bootstrap/dist tsumugi/bower_components/bootstrap/
  cp -rpf bower_components/popper.js/dist tsumugi/bower_components/popper.js/
  cp *.php tsumugi/
  cp *.txt tsumugi/
  cp *.css tsumugi/
  cp screenshot.png tsumugi/
  cd release
  zip tsumugi.$VERSION.zip -r ../tsumugi -x "*.DS_Store"
  rm -rf ../tsumugi
  return
}
if [[ -f tsumugi.$VERSION.zip ]]
then
  rm -rf tsumugi.$VERSION.zip
fi
build_tsumugi

#!/bin/bash

VERSION='1.0.0'

function build_tsumugi() {
  mkdir tsumugi
  cp -rpf bootstrap tsumugi/
  cp -rpf bower_components tsumugi/
  cp -rpf fonts tsumugi/
  cp -rpf inc tsumugi/
  cp -rpf js tsumugi/
  cp -rpf languages tsumugi/
  cp -rpf template-parts tsumugi/
  cp *.php tsumugi/
  cp *.txt tsumugi/
  cp *.css tsumugi/
  cp bower.json tsumugi/
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

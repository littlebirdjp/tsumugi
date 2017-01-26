var browserLanguage = function() {
  var ua = window.navigator.userAgent.toLowerCase();
  try {
    // chrome
    if( ua.indexOf( 'chrome' ) != -1 ){
      return ( navigator.languages[0] || navigator.browserLanguage || navigator.language || navigator.userLanguage).substr(0,2);
    }
    // それ以外
    else{
      return ( navigator.browserLanguage || navigator.language || navigator.userLanguage).substr(0,2);
    }
  }
  catch( e ) {
    return undefined;
  }
}

function urlChange() {
	if( browserLanguage() == 'ja' ){
	  location.href = './ja';
	}
}

// URLのパラメータを取得
var urlParam = location.search.substring(1);

// URLにパラメータが存在する場合
if(urlParam) {
  // 「&」が含まれている場合は「&」で分割
  var param = urlParam.split('&');

  // パラメータを格納する用の配列を用意
  var paramArray = [];

  // 用意した配列にパラメータを格納
  for (i = 0; i < param.length; i++) {
    var paramItem = param[i].split('=');
    paramArray[paramItem[0]] = paramItem[1];
  }

  // パラメータlangがenかどうかを判断する
  if (paramArray.lang == 'en') {

  } else {
    urlChange();
  }

} else {
	urlChange();
}

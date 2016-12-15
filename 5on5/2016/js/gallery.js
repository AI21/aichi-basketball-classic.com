$(function(){

	var masonryW;

	var sw = window.innerWidth;
	var sh = window.innerHeight;

	if (sw > 480) {
		masonryW = 220;
	} else {
		masonryW = 155;
	}

	//Masonry のイニシャライズ
	$('#masonry').masonry({
	    itemSelector: '.imgtada',
	    columnWidth: masonryW,
	    isAnimated: true, //スムースアニメーション設定
	    isFitWidth: true, //親要素の幅サイズがピッタリ
	    // isRTL: false,     //整理される要素が左右逆になる（読み言語などに）
	    gutterWidth: 0,   //整理される要素間の溝の幅を指定
	    // containerStyle: { position: 'relative' }, //親要素にスタイルを追加できる
	    // isResizable: true //ウィンドウサイズが変更された時に並び替え
	});

	//画像の遅延読み込み設定
	Tada.setup({
		delay: 100,
		callback: function( i_element ) {
				$( i_element ).addClass( "loaded" );
		}
	});
	$(".imgtada").tada();

});

<?php
/*--------------------------------------------------------------
  ZeroMail  ver1.4.7(2011.03.11)

  @Author       : Temderfeel(http://tenderfeel.xsrv.jp/)
  @Contact      ：tenderfeel@gmail.com
  @Document     : http://zeromail.webtecnote.com/
  @Project Home : http://code.google.com/p/zeromail/
----------------------------------------------------------------

  詳しい設置方法はサイトをご覧ください。
  簡単な説明と変更履歴はCHANGELOG.txtにあります。

--------------------------------------------------------------*/

/*//////////* 基本設定（右側のみ変更すること） *//////////////*/

//確認・完了・エラーページの出力文字コード（"UTF-8,EUC-JP,SJIS"など）
define('TEXTCODE','UTF-8');

//メールの文字コード(ja = 日本向け uni = 英語・マルチバイト文字対応）
define('MAILCODE', 'ja');

//フォームデータを受け取るメールアドレス
define('MAILFROM','aichi.basketball.classic@gmail.com');
//フォームデータを受け取るメールアドレス
define('MAILTO','aichi.basketball.classic@gmail.com');

//差出人名
define('FROMNAME',"愛知バスケットボールクラシック事務局");

//受け取る時の件名
define('MAILSUBJECT','[愛知最強5on5トーナメント] 選手登録');

//自動返信の件名
define('REPSUBJECT','[愛知最強5on5トーナメント] 選手登録 内容控え');

//自動返信
//trueにした場合はフォームでのチェックの有無関係なく返信する
//下記設定に関係なくメールアドレスが必須入力になる
define('REPLY', TRUE);

//メアドを必須項目にするかどうか（必須にする場合はtrue）
define('EMAILCHECK', false);

//返信メールに添えるメッセージ（ヘッダ）
$replycomment=<<<EOM
【このメールはシステムからの自動返信です】

愛知最強5on5トーナメントへの選手登録をしていただき、ありがとうございました。

ご登録いただいた選手の情報について、内容確認のため事務局より問い合わせする場合がございます。

■選手の追加・情報修正について
選手の追加またはご登録いただいた選手情報を訂正する場合は、大会事務局の公式メールアドレスに内容を明記の上、お問い合わせください。


────────────────────────────────────
EOM;

//返信メールに添える署名（フッタ）
$replyfoot= <<<EOM


────────────────────────────────────
愛知最強決定戦 Aichi BasketBall Classic
http://www.aichi-basketball-classic.com/
aichi.basketball.classic@gmail.com
────────────────────────────────────
EOM;

//BCCで受け取りが必要な場合はアドレスを設定
define('BCC','');

/*----------------------------------------------------
  テンプレート
----------------------------------------------------*/
//確認画面（zeromail.phpからのパス）
define('CHECKPAGE','check.php');

//送信完了で表示するページ（zeromail.phpからのパス）
define('SUCCESSPAGE','completion.html');

//エラーで表示するページ（zeromail.phpからのパス）
define('ERRORPAGE','error.php');

//Ajax送信完了後のメッセージ
$endMassage = "<div class=\"success exit\"><p class=\"message\">送信しました</p></div>";

//確認画面のフォームデータ出力形式（空はpタグ）
//Table →テーブル行（th=項目名 td=値）
//List → 定義リスト（dt=項目名 dd=値）
define('VIEWSTYLE', 'Table');

//inputのnameとその名称設定
//'name'=>'名称'で１セット。一番最後には,をつけない。
//ここで書いた並び順が、確認画面と送信メール本文に反映される。
$inputs = array(
	'category' => '参加カテゴリー',
	'teamname' => 'チーム',
	'reply' => '確認メール',
	'email' => 'メール',
	'member1' => '選手1',
	'member2' => '選手2',
	'member3' => '選手3',
	'member4' => '選手4',
	'member5' => '選手5',
	'member6' => '選手6',
	'member7' => '選手7',
	'member8' => '選手8',
	'member9' => '選手9',
	'member10' => '選手10',
	'member11' => '選手11',
	'member12' => '選手12',
	'member13' => '選手13',
	'member14' => '選手14',
	'member15' => '選手15',
	'member16' => '選手16',
	'member17' => '選手17',
	'member18' => '選手18',
	'message' => 'メッセージ',
);

$inputsNums = array(
	'umber1' => array('MIN' => 0, 'MAX' => 99),
	'umber2' => array('MIN' => 0, 'MAX' => 99),
	'umber3' => array('MIN' => 0, 'MAX' => 99),
	'umber4' => array('MIN' => 0, 'MAX' => 99),
	'umber5' => array('MIN' => 0, 'MAX' => 99),
	'umber6' => array('MIN' => 0, 'MAX' => 99),
	'umber7' => array('MIN' => 0, 'MAX' => 99),
	'umber8' => array('MIN' => 0, 'MAX' => 99),
	'umber9' => array('MIN' => 0, 'MAX' => 99),
	'umber10' => array('MIN' => 0, 'MAX' => 99),
	'umber11' => array('MIN' => 0, 'MAX' => 99),
	'umber12' => array('MIN' => 0, 'MAX' => 99),
	'umber13' => array('MIN' => 0, 'MAX' => 99),
	'umber14' => array('MIN' => 0, 'MAX' => 99),
	'umber15' => array('MIN' => 0, 'MAX' => 99),
	'umber16' => array('MIN' => 0, 'MAX' => 99),
	'umber17' => array('MIN' => 0, 'MAX' => 99),
	'number18' => array('MIN' => 0, 'MAX' => 99),
	'tall1' => array('MIN' => 140, 'MAX' => 230),
	'tall2' => array('MIN' => 140, 'MAX' => 230),
	'tall3' => array('MIN' => 140, 'MAX' => 230),
	'tall4' => array('MIN' => 140, 'MAX' => 230),
	'tall5' => array('MIN' => 140, 'MAX' => 230),
	'tall6' => array('MIN' => 140, 'MAX' => 230),
	'tall7' => array('MIN' => 140, 'MAX' => 230),
	'tall8' => array('MIN' => 140, 'MAX' => 230),
	'tall9' => array('MIN' => 140, 'MAX' => 230),
	'tall10' => array('MIN' => 140, 'MAX' => 230),
	'tall11' => array('MIN' => 140, 'MAX' => 230),
	'tall12' => array('MIN' => 140, 'MAX' => 230),
	'tall13' => array('MIN' => 140, 'MAX' => 230),
	'tall14' => array('MIN' => 140, 'MAX' => 230),
	'tall15' => array('MIN' => 140, 'MAX' => 230),
	'tall16' => array('MIN' => 140, 'MAX' => 230),
	'tall17' => array('MIN' => 140, 'MAX' => 230),
	'tall18' => array('MIN' => 140, 'MAX' => 230),
);

//入力が空の項目を確認画面以降で除外するか（false:しない true:する）
define('ZM_EMPTY_VALUE_SKIP', true);

/*-----------------------------------------------------
  ファイル添付機能
------------------------------------------------------*/

//ファイル添付機能を使うかどうか（trueにしなければ送信しない）
define('FILETEMP', false);

//ファイルを添付せずに保存するかどうか（trueで保存）
define('FILEPOOL', false);

//ファイルの最大サイズ(kb)
define("MAXSIZE", 1000);

//添付ファイルの一時保存ディレクトリ（zeromail.phpと同階層のフォルダを用意すること）
define("UPLOADPASS", "upfile/");

//画像確認時のWindowターゲット
//_string → target="_string"
//string → rel="string"
define("IMG_CHECK_TARGET", "_blank");

/*--------------------------------------------------------------
　スパム対策設定
--------------------------------------------------------------*/

//nameを必須項目にするかどうか（必須にする場合はtrue）
define('NAMECHECK', false);

//半角英数の名前を許可するかどうか（許可する場合はtrue）
define('ALPHANAME', true);

//リファラーチェックするかどうか
//trueにした場合は下記で設定したページ以外からの送信をブロックする。
//下のフルパス設定もすること。
define('REFCHECK', false);

//入力フォームのパス
$formURL="";

//本文のリンク記述許可数（以下）
$alink = 1;

//メッセージ欄の禁止語句
//あんまり登録しすぎると処理が重くなるので注意
$blocktxt =array('死','death','porno','sex','pill','広告','fuck','<script','<object');

//送信ブロックするIPアドレス
$blockIP = array();

/*///////////////////* END CONFIG *////////////////////*/


/*-----------------------------------------------------
  画面出力用関数
------------------------------------------------------*/

//エラー画面
//$err＝エラーメッセージ出力

function ErrerDisp($err){
	session_unset();
	$_SESSION['Err']=-1;
	$GLOBALS['err']=$err;
	include(ERRORPAGE);
	exit;
}

//確認画面のメッセージ
function Message(){

	if($_SESSION['Err']>1){
		$str = '<span class="error">前のページに戻り、入力エラーを修正してください。</span>';
	}else if($_SESSION['Err']===-1){
		$str = '<span class="error">'.$GLOBALS['err'].'</span>';
	}else{
		$str ='<span class="confirm">入力内容に間違いが無ければ、送信ボタンを押してください。</span>';
	}

	echo convert_encode($str);
}


//確認画面送信ボタン（hiddenとsession_unsetは消さないこと。）
function Button(){

if($_SESSION['Err']>1||$_SESSION['Err']===-1){
	$str = "<noscript><p class=\"return\">ブラウザのボタンで戻ってください。</p></noscript>\n<script type=\"text/javascript\">\n//<![CDATA[\ndocument.write('<button id=\"myreset\" type=\"button\" onclick=\"history.back()\">入力画面に戻る</button>');\n//]]>\n</script>";
	$str .= zm_copyright(false);
	session_unset();
}else{
	$str = '<input name="mode" type="hidden" id="mode" value="Send" /><button id="submit" type="submit">この内容で送信</button>';
	$str .= "<script type=\"text/javascript\">\n//<![CDATA[\ndocument.write('<button id=\"myreset\" type=\"button\" onclick=\"history.back()\">入力画面に戻る</button>');\n//]]>\n</script>";
	$str .= zm_copyright(false);
}

	echo convert_encode($str);
}


/*---------------------* 削除禁止 *-------------------------*/

//エンコード変換
function convert_encode($str){return mb_convert_encoding($str,TEXTCODE,"UTF-8");}

//rep[name]の指定による置換
function zeromail_regtag_replace($formitem, $key){

	$strRet = $formitem[$key];

	if(isset($formitem["reps"]) && array_key_exists($key,$formitem["reps"])!==false) {

		if ( $formitem[$key] != '' ) {
//			print $key." = KEY<br>";
			$strRet = $formitem[$key];
		} else {
			preg_match_all ( "/\{(?:([^\{\}\:]+)\:{1})*([\w\d\-]+)(?:\:{1}([^\{\}\:]+))*\}/", $formitem["reps"][$key], $match );
			$str = $formitem["reps"][$key];
			foreach ( $match[0] as $i => $tag ) {
				if ( !empty( $formitem[$match[2][$i]] ) )
					$str = str_replace ( $tag, $match[1][$i] . $formitem[$match[2][$i]] . $match[3][$i], $str );
				else
					$str = str_replace ( $tag, "", $str );
			}
			$strRet = $str;
		}

	}

	if ( strpos( $strRet, '必須入力' ) !== FALSE ) {
		if ( strpos( $strRet, 'ALL' ) !== FALSE ) {
			$strRet = convert_encode ( '<strong class="error">この項目は全て必須入力です。</strong>' );
		} else {
			$strRet = convert_encode ( '<strong class="error">この項目は必須入力です。</strong>' );
		}
	} else {
		if ( strpos ( $strRet, 'class="error"' ) !== FALSE ) {
			$strRet = $formitem[$key];
		}
	}

	return $strRet;

}

//空入力スキップ確認
function is_empty_skip($val)
{
	return (defined('ZM_EMPTY_VALUE_SKIP') && ZM_EMPTY_VALUE_SKIP === true && mb_strlen($val) <= 0);
}


define("SCRIPT","ZeroMail");
define("VERSION","1.4.7");

function zm_copyright($print=true)
{
	$code = '<p class="wtn_copyright"><a href="http://'.strtolower(SCRIPT).'.webtecnote.com/" title="'.SCRIPT.' Home" rel="bookmark">- '.SCRIPT.' -</a></p>';

	if($print === false)
		return $code;
	else
		print $code;

}
/*----------------------------------------------------------*/
?>

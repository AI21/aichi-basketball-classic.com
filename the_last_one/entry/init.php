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
define('MAILFROM','aichi3on3.info@gmail.com');
//フォームデータを受け取るメールアドレス
define('MAILTO','aichi3on3.info@gmail.com');

//差出人名
define('FROMNAME',"THE LAST ONE 実行委員会");

//受け取る時の件名
define('MAILSUBJECT','[THE LAST ONE] 参加エントリー');

//自動返信の件名
define('REPSUBJECT','[THE LAST ONE（ザ ラスト ワン）] 参加エントリー 内容控え');

//自動返信
//trueにした場合はフォームでのチェックの有無関係なく返信する
//下記設定に関係なくメールアドレスが必須入力になる
define('REPLY', TRUE);

//メアドを必須項目にするかどうか（必須にする場合はtrue）
define('EMAILCHECK', TRUE);

//返信メールに添えるメッセージ（ヘッダ）
$replycomment=<<<EOM
【このメールはシステムからの自動返信です】

THE LAST ONE（ザ ラスト ワン）への参加エントリーありがとうございました。

参加への詳しい内容については「THE LAST ONE 実行委員会」より
追って連絡させていただきますので、しばらくお待ちください。
※2〜3日経過してもメールがない場合は「THE LAST ONE 実行委員会」の
公式メールアドレスにご一報ください。

────────────────────────────────────
EOM;

//返信メールに添える署名（フッタ）
$replyfoot= <<<EOM
────────────────────────────────────
愛知最強決定戦 Aichi BasketBall Classic
http://www.aichi-basketball-classic.com/
aichi3on3.info@gmail.com
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
	'daytime' => '開催日時',
	'name' => '氏名',
	'kana' => '読みカナ',
	'sex' => '性別',
	'age' => '年齢',
	'tel' => '携帯TEL',
	'email' => 'メールアドレス',
	'message' => '備考・メッセージ',
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
define('NAMECHECK', true);

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
	if(isset($formitem["reps"]) && array_key_exists($key,$formitem["reps"])!==false) {

		preg_match_all("/\{(?:([^\{\}\:]+)\:{1})*([\w\d\-]+)(?:\:{1}([^\{\}\:]+))*\}/", $formitem["reps"][$key], $match);

		$str = $formitem["reps"][$key];

		foreach($match[0] as $i => $tag){
			if(!empty($formitem[$match[2][$i]]))
				$str = str_replace($tag, $match[1][$i].$formitem[$match[2][$i]].$match[3][$i], $str);
			else
				$str = str_replace($tag, "", $str);
		}

		return $str;

	}else{

		return $formitem[$key];
	}
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

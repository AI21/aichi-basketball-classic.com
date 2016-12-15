<?php
/*----------------------------------------------------
  ZeroMail Core confirm.php

  @since ZeroMail 0.1
  @copyright Copyright (c) Tenderfeel
  @link http://zeromail.webtecnote.com/

  [2010/12/09] (fix) init.php loading
  [2010/09/22] check form id
  			   check readable init.php
  [2010/09/16] remove require (_once)
  [2010/07/15] remove \n for line 57
  [2010/07/09] (r78) remove zeromail_regtag_replace function
                     add classname to default source
					 change to default label tag
  [2010/06/21] (r68) add zeromail_regtag_replace()
  [2009/06/02] (r15) add convert_encode()
----------------------------------------------------*/
session_start();
error_reporting(0);
if(isset($_SESSION['id']) && preg_match("/^[a-zA-Z0-9_\-]+$/i", $_SESSION['id'])){
	$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'init'.$_SESSION['id'].'.php';
}else{
	$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'init.php';
}

if(is_readable($fn)) require($fn);
else die($fn.'設定ファイルが読み込めません');

if(SID) ErrerDisp('Cookieを有効にして下さい');
if(!$_SESSION) ErrerDisp('送信データがありません。');


//print nl2br(print_r($_SESSION,1));
//print nl2br(print_r($inputs,1));
function ConfDisp(){

	global $inputs;

	$blnMailFlg = TRUE;

	switch(VIEWSTYLE){
	case 'Table':
		foreach( $inputs as $key => $value){
//		print $key." = ".$value."<hr>";
//            print nl2br(print_r($key,1));
//			if (  ) {
//
//			}
			$_SESSION[$key] = zeromail_regtag_replace($_SESSION, $key);
			$strVal = str_replace("No.", "", $_SESSION[$key]);
			$strVal = str_replace("cm", "", $strVal);
			$strVal = str_replace("(", "", $strVal);
			$strVal = str_replace(")", "", $strVal);
			$strVal = str_replace(" | ", "", $strVal);

			$strConfText = $_SESSION[$key];
			if ( $key == 'reply' ) {
				if ( $strConfText == 'false' ) {
					$strConfText = '不要';
					$blnMailFlg = FALSE;
				} else {
					$strConfText = '必要';
//					print $strConfText;
				}
			}

			// メール不要
			if ( $key == 'email' && $blnMailFlg == FALSE ) {
				unset($_SESSION[$key]);
				continue;
			}

			if ( !is_empty_skip($strVal) ) {
				echo convert_encode('<tr><th scope="row">'.$value.'</th><td>');
				echo $strConfText;
				echo convert_encode('</td></tr>');
			}
		}
	break;

	case'List':
		foreach( $inputs as $key => $value){
			$_SESSION[$key] = zeromail_regtag_replace($_SESSION, $key);
			echo convert_encode('<dt>'.$value.'</dt><dd>');
			echo $_SESSION[$key];
			echo convert_encode('</dd>');
		}
	break;

	default:
		foreach( $inputs as $key => $value){
			$_SESSION[$key] = zeromail_regtag_replace($_SESSION, $key);
			echo convert_encode('<p><em class="label">'.$value.'</em><span class="value">');
			echo $_SESSION[$key];
			echo convert_encode('</span></p>');
		}
	}
}?>
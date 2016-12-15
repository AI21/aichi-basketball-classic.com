<?php require_once('confirm.php');//confim.phpへのパス。無いと動かない。?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width=480">
<title>[内容確認] 1on1・3Pコンテスト プレイヤープロフィール申請フォーム | Aichi BasketBall Classic</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="愛知最強決定戦[ Aichi BasketBall Classic ]の1on1・3Pコンテスト大会へのプレイヤープロフィール申請フォームです。">
<meta name="keywords" content="1on1,1on1 バスケ,3P,3P バスケ,3Pコンテスト,basketball,3on3 バスケ,3on3 バスケットボール,3on3,バスケ,basketball">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="0">
<link rel="stylesheet" href="./common/css/fillter.css">
<link rel="stylesheet" href="./common/css/zeromail.css">
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="../../common/js/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body id="home">
	<div id="wrapper">
		<header id="pageHead" role="banner">
			<h2>愛知最強決定戦 [ Aichi BasketBall Classic ] 1on1・3Pコンテスト予選大会へのプレイヤープロフィール申請フォームです。</h2>
			<h1>Aichi BasketBall Classic</h1>
		</header>
		<!-- メインコンテンツ-->
		<div id="contents" class="clearfix">
			<main role="main">
				<section id="challengeArea">
					<h2>1on1＆3Pコンテスト 愛知最強決定戦</h2>
					<h3>プレイヤープロフィール申請フォーム [ 内容確認 ]</h3>
					<div class="entryArea coonfrim">
						<form action="zeromail.php" method="post" class="zeromail">
							<p class="message"><?php Message();//メッセージ?></p>
							<fieldset>
								<legend>Contact details</legend>
								<table summary="送信内容確認" id="confirm">
								<?php ConfDisp();//確認表示。行しか出ないのでtableタグ内に書く?>
								</table>
								<div class="button">
								<?php Button();//ボタン表示。form内に置くこと。 ?>
								</div>
							</fieldset>
						</form>
					</div>
				</section>
			</main>
		</div>
		<aside id="decision">
			<h2>Aichi BasketBall Classic</h2>
			<h3>【 愛知最強1on1＆3Pコンテスト決定戦 】</h3>
			<h4>Aichi Basketball Classic「1on1＆3Pコンテスト」とは</h4>
			<ul class="inner">
				<li>TBBの主催大会</li>
				<li>BUZZER BEATERの主催大会</li>
				<li>LIGA TOKAI 3on3 MIXTURE大会</li>
			</ul>
			<p class="inner">
				上記の愛知で開催された3on3大会の主催者が共同で開催する大会で、各大会の推薦選手と4/10に出場したチームからの招待選手ならびに、
				一般応募枠の上位入賞者で競う、愛知最強の1on1と3Pのチャンピオンを決定する大会です！
			</p>
			<h4>愛知最強1on1＆3Pコンテスト決定戦 大会概要</h4>
			<dl class="inner">
				<dt>日程</dt><dd>2016年7月3日(日)</dd>
				<dt>場所</dt><dd>愛知文教大学<small>小牧市大草5969-3</small></dd>
				<dt>時間</dt><dd>開場 12:30</dd>
				<dt>&nbsp;</dt><dd class="lv2">開始 13:00</dd>
				<dt>&nbsp;</dt><dd class="lv2">終了 18:00</dd>
			</dl>
		</aside>
		<footer id="pageFoot" role="contentinfo">
			<div id="copylight">
				<span>Copyright (C) 2016 Aichi BasketBall Classic All Rights Resurved.</span>
			</div>
		</footer>
	</div>

	<script src="../../common/js/jquery-1.11.2.min.js"></script>
	<script src="../../common/js/main.js"></script>

</body>
</html>

<?php require_once('confirm.php');//confim.phpへのパス。無いと動かない。?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width=480">
<title>[エラー] 5on5トーナメント エントリーフォーム | Aichi BasketBall Classic</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="愛知最強決定戦[ Aichi BasketBall Classic ]の5on5トーナメント大会へのエントリーフォームです。">
<meta name="keywords" content="5on5,バスケ,トーナメント,basketball,バスケットボール">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="0">
<link rel="stylesheet" href="./common/css/fillter.css">
<link rel="stylesheet" href="./common/css/zeromail.css">
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="./common/js/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body id="page">
	<div id="wrapper">
		<header id="pageHead" role="banner">
			<h2>愛知最強決定戦 [ Aichi BasketBall Classic ] 5on5トーナメントへのエントリーフォームです。</h2>
			<h1>Aichi BasketBall Classic</h1>
		</header>
		<!-- メインコンテンツ-->
		<div id="contents" class="clearfix">
			<main role="main">
				<section id="challengeArea">
					<h2>愛知最強5on5トーナメント決定戦</h2>
					<h3>エントリーフォーム [ 内容確認 ]</h3>
					<div class="entryArea coonfrim">
					<div id="error" class="zeromail">
						<p class="message"><?php Message(); ?></p>
						<div class="button"><?php Button();//ボタン表示 ?></div>
					</div>
				</div>
			</section>
		</main>
	</div>
	<aside id="decision">
		<h2>Aichi BasketBall Classic</h2>
		<h3>【 愛知最強5on5トーナメント決定戦 】</h3>
		<h4>Aichi Basketball Classic「5on5トーナメント決定戦」とは</h4>
		<ul class="inner">
			<li>TBBの主催大会</li>
			<li>BUZZER BEATERの主催大会</li>
			<li>LIGA TOKAI 3on3 MIXTURE大会</li>
		</ul>
		<p class="inner">
			上記の愛知で開催された3on3大会の主催者が共同で開催する大会で、2016年10月9日〜30日の約1か月で行われる愛知最強の5on5のチャンピオンチームを決定する大会です！
		</p>
		<h4>愛知最強5on5トーナメント決定戦 大会概要</h4>
		<dl class="inner">
			<dt>日程</dt><dd>2016年10月09日(日)：一回戦<br>　 2016年10月16日(日)：二回戦<br>　 2016年10月23日(日)：三回戦＆四回戦<br>　 2016年10月30日(日)：準決勝＆決勝</dd>
			<dt>場所</dt><dd>北名古屋市・小牧市・名古屋市を予定</dd>
			<dt>募集</dt><dd>先着64チーム</dd>
			<dt>形式</dt><dd>トーナメント戦</dd>
		</dl>
		<img src="../common/image/cm.jpg" alt="愛知最強決定戦 [ Aichi BasketBall Classic ] 5on5トーナメント">
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

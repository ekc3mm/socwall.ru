<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?=$data[header]?></title>
	
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="header">

		<h2>Socwall <?=$data[header]?></h2>
		<div class="menu">
		<?php if(isset($_SESSION[id])): ?>
			<a href="/wall/<?=$_SESSION[id]?>">Моя стена</a>
			<a href="/login/exit">Выход</a>
		<?php else: ?>
			<a href="/login"> Логин</a>
		<?php endif; ?>
		</div>
	</div>
	<div class="content">
		<?php
		include 'app/views/'.$content_view;
		if($content_view2 !=''){
			include 'app/views/'.$content_view2;
		} ?>
	</div>
	<script  src="/include/jquery-3.2.1.js"></script>
	<script  src="/js/script.js"></script>
</body>
</html>
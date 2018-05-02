<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel = "stylesheet" href = "../template/css/bootstrap.min.css">
		<link rel = "stylesheet" href = "../template/css/bootstrap-theme.min.css">
		<link rel = "stylesheet" href = "../template/css/style.css">
		<link rel="stylesheet" type="text/css" href="../template/css/bootstrap-datetimepicker.min.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		
		<script src = "../template/js/jquery-3.3.1.min.js"></script>
		<script src = "../template/js/moment.js"></script>
		<script src = "../template/js/bootstrap.min.js"></script>
		<script src="../template/js/bootstrap-datetimepicker.min.js"></script>
		<title>Пример веб-страницы</title>
	</head>
	<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">TODO</a>
			</div>
			<?php if(isset($_SESSION['user'])): ?>
			<a href = "user/logout" class = "logout-button">Logout</a>
			<a class="navbar-done" href="/fulfiled"><i class="far fa-check-circle"></i></a>
			<?php endif; ?>
		</div>
	</div>	
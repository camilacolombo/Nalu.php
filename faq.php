<!DOCTYPE html>
<html>
	<head>
		<link href="http://meyerweb.com/eric/tools/css/reset/reset.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/faq.css">
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<title>Frequent Asked Questions || NALU</title>
	</head>
	<body>

		<div class="container">

			<?php require_once("header.php") ?>

			<div class="main">

				<h2>Preguntas Frecuentes</h2>
				<h3>Acá se encuetran algunas de las preguntas de nuestros usuarios sobre nosotros y como ser parte.</h3>

				<br>
				<br>

				<p class="preguntas">
					<h1>Qué es Nalu?</h1>
					<p>Nalu es una red social destinada para los amantes del Mar.</p>
				<br>
					<h1>Qué oportunidades provee Nalu?</h1>
					<p>Nalu tiene la particularidad de concatenar varias funciones o herramientas que necesitamos para estar preparados para el dia importante.</p>
				<br>
					<h1>Qué dia es importante?</h1>
					<p>El dia imporante para nosotros es el dia que hay Olas(Nalu) y son de calidad</p>
				<br>
					<h1>Qué requisitos necesitamos para ser parte de Nalu?</h1>
					<p>Para ser parte de Nalu el unico requisito es registrarse y tener ganas de compartir</p>
				<br>
					<h1>Cuantos integrantes hay en el equipo de Nalu?</h1>
					<p>Nalu cuenta con 3 pilares constitutivos. Nicolás, Bautista y Franco.</p>
				<br>

			<!--Aca es un espacio para que los usuarios dejen sus dudas -->

			<div class="comment">

				<form action="" method="post">
					Comment:
					<br>
					<textarea name='comment' id='comment'></textarea><br />
		  			<input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["id"]; ?>' />
		  			<input type='submit' value='Submit' />

				</form>

			</div>

		</div>

	    <?php require_once ("footer.php"); ?>

	</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/faq.css">
		<meta charset="UTF-8">
		<link href="http://meyerweb.com/eric/tools/css/reset/reset.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://www.dafontfree.net/freefonts-futura-std-f61836.htm" rel="stylesheet">
		<link href="https://fonts.google.com/specimen/Roboto+Condensed" rel="stylesheet">
		<link href="https://www.fonts.com/font/typodermic/libel-suit?QueryFontType=Web&src=GoogleWebFonts" rel="stylesheet">
		<title>Frequent Asked Questions || NALU</title>
	</head>
	<body>

		<div class="container">

			<?php require_once("header.php") ?>

			<div class="main">

				<h1>Preguntas Frecuentes</h1>
				<h3>Acá se encuetran algunas de las preguntas de nuestros usuarios sobre nosotros y sobre como ser parte.</h3>

				<br>
				<br>

					<h2>¿Qué es Nalu?</h2>
					<p>Nalu es una red social destinada para los amantes del Mar.</p>
				<br>
					<h2>¿Qué oportunidades provee Nalu?</h2>
					<p>Nalu tiene la particularidad de concatenar varias funciones o herramientas que necesitamos para estar preparados para el dia importante.</p>
				<br>
					<h2>¿Qué dia es importante?</h2>
					<p>El dia imporante para nosotros es el dia que hay Olas(Nalu) y son de calidad.</p>
				<br>
					<h2>¿Qué requisitos necesitamos para ser parte de Nalu?</h2>
					<p>Para ser parte de Nalu el unico requisito es registrarse y tener ganas de compartir.</p>
				<br>
					<h2>¿Cuantos integrantes hay en el equipo de Nalu?</h2>
					<p>Nalu cuenta con 4 pilares constitutivos. Nicolás, Bautista, Camila y Franco.</p>
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
